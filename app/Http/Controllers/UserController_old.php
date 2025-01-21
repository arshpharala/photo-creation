<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\cms\RoleRequest;
use App\Http\Requests\cms\UserRequest;
use App\Http\Requests\cms\PermissionRequest;
use App\Http\Requests\cms\ChangePasswordRequest;
use App\Http\Requests\cms\ProfileRequest;
use App\Events\CreateUser;
use DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Module;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		// $this->middleware('access:role,insert')->only('insertRole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function userList(Request $request)
    {
      
        $filter = $request->all();
        $query                   =   User::query();
        if(!empty($filter))
        {

            $query = empty($filter['name'])? $query : $query->where('name',$filter['name']);
            $query = empty($filter['email'])? $query : $query->where('email',$filter['email']);
            $query = empty($filter['active'])? $query : $query->where('active',1);
            $query = empty($filter['roleName'])? $query : $query->whereHas('roles', function($q)use($filter){
                $q->where('name',$filter['roleName']);
            });
        }
        $users = $query->get();
        $list['name']   = User::all()->pluck('name','name')->toArray();
        $list['email']  = User::all()->pluck('email','email')->toArray();
        $list['role']   = Role::All()->pluck('name','name')->toArray();
        $data['list']   = $list;
        $data['users']  = $users;
        
        return view('cms.manageUser.users',$data);
    }

    public function createUser(Request $request)
    {
        $this->authorize('create', new User());
        return view('cms.manageUser.insertUser');
    }

    public function insertUser(UserRequest $request)
    {
        $this->authorize('create', new User());
        $data = $request->all();
        $rawPassword = $data['password'];
        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);
        $user['rawPassword'] = $rawPassword;
        Event(new CreateUser($user));
        
        return redirect()->route('userList')->with('success', 'User Created!');
    }

    public function editUser(User $user)
    {
        $this->authorize('update', $user);
        $data['user']   = $user;
        $data['roles']  = Role::all();
       
        return view('cms.manageUser.updateUser',$data);
    }

    public function updateUser(User $user,UserRequest $request)
    {
        
        $this->authorize('update', $user);
        $inputs         = $request->all();
        $user->name     = $inputs['name'];
        $user->email    = $inputs['email'];
        $user->active   = empty($inputs['active'])? 0 : 1;
        $user->save();
        if(isset($inputs['resetPwd']))
        {
            $user->resetPassword();
        }
        return redirect()->route('userList')->with('success', 'User Updated Successfully!');
    }

    public function roleList()
    {
        $this->authorize('view', new Role());
        
        $roles= Role::all();
        $data['roles'] = $roles;
        
        return view('cms.manageUser.roles',$data);
        
}
    public function createRole()
    {
        $this->authorize('create', new Role());
        return view('cms.manageUser.insertRole');
    }

    public function insertRole(RoleRequest $request)
    {
        $this->authorize('create', new Role());
        $inputs         = $request->all();
        $roleName       = $request->input('name');
        $description    = $request->input('desc');
        $done = Role::create(['name'=> $roleName,'description'=>$description]);
        return redirect()->route('roleList')->with('success', 'Role Updated Successfully!');

    }

    public function editRole(Role $role)
    {
        $this->authorize('update', $role);
        $data['role']          = $role;
        $data['permissions']   = Permission::all()->load('module')->groupBy('module_name');
        return view('cms.manageUser.updateRole',$data);
    }

    public function updateRole(RoleRequest $request ,Role $role)
    {
        $this->authorize('update',$role);
        $inputs             = $request->all();
        $role->name         = $inputs['name'];
        $role->description  = $inputs['description'];
        $role->save();
        return redirect()->route('roleList')->with('success', 'Role Updated Successfully!');
    }

    public function assignRoles(Request $request)
    {

        $userid = $request->input('user');
        // $authUser = Auth::user();
        $user   = User::find($userid);
        $roles  = $request->input('role'); // array of role ids
        if(empty($roles))
        {
            $roles = array();
        }
        $user->roles()->sync($roles);
        
        return back()->with('success', 'Operation Done!');
    }

    public function assignPermission(Request $request)
    {
        $roleID      = $request->input('role');
        $role        = Role::find($roleID);
        $permissions = $request->input('permission');// return array of permission id
        $role->permissions()->sync($permissions);
        return back()->with('success', 'Operation Done!');
    }

    public function createPermission()
    {
        $this->authorize('create', new Permission());
        return view('cms.manageUser.insertPermission');
    }

    public function insertPermission(PermissionRequest $request)
    {
        $this->authorize('create', new Permission());
        $moduleName     = $request->input('moduleName');
        $access         = $request->input('access');
        $description    = $request->input('description');
        $module         = Module::where('name',$moduleName)->first();
        if(empty($module->id))
        {
            $module         = new Module();
            $module->name   = $moduleName;
            $module->save();
        }
        $permission              = new Permission();
        $permission->module_id   = $module->id;
        $permission->access      = $access;
        $permission->description = $description;
        try{
            $permission->save();
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            if(Str::endsWith($ex->errorInfo[2],"for key 'permission Set'"))
            {
                $validator = Validator::make([],[]);
                $validator->errors()->add("access",'Permission Type already exist');
                throw new \Illuminate\Validation\ValidationException($validator);
            }
            else
            {
                //return $ex;
            }
        }
        
        return redirect()->route('permissionList')->with('success', 'New Permission Created Successfully.!');
    }

    public function permissionList(Request $request)
    {
        $this->authorize('view', new Permission());
        $data['selectedModule'] =   null;
        $data['selectedAccess'] =   null;
        $module_id              =   $request->get('module');
        $access                 =   $request->get('access');
        $query                  =   Permission::query();
        if(!empty($module_id)){
            $data['selectedModule'] = $module_id;
            $query->where('module_id',$module_id);
        }
        if(!empty($access)){
            $data['selectedAccess'] = $access;
            $query->where('access',$access);
        }
        $data['module']      =   Module::all()->pluck('name','id')->toArray();
        $data['access']      =   Permission::all()->pluck('access','access')->toArray();
        $result              =   $query->paginate(10);
        $data['permissions'] =   $result;
    
        return view('cms.manageUser.permissions',$data);
    }
    public function editPermission(Permission $permission)
    {
        $this->authorize('update', $permission);
        $data['permission']    = $permission;
        return view('cms.manageUser.updatePermission',$data);
    }

    public function updatePermission(PermissionRequest $request ,Permission $permission)
    {
        $this->authorize('update', $permission);
        $inputs     = $request->all();
        $moduleName = $request->input('moduleName');
        $module     = Module::where('name',$moduleName)->first();
        if(empty($module->id))
        {
            $module       = new Module();
            $module->name = $moduleName;
            $module->save();
        }
        $permission->module_id   = $module->id;
        $permission->access      = $inputs['access'];
        $permission->description = $inputs['description'];
        $permission->save();
        return redirect()->route('permissionList')->with('success', 'Permission Updated Successfully!');
    }

    public function deleteUser(Request $request,User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
    }

    public function deleteRole(Request $request,Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();
    }

    public function deletePermission(Request $request,Permission $permission)
    {
        $this->authorize('delete', $permission);
        $permission->delete();
    }

    public function loadModules(Request $request)
    {
        $term   = $request->input('term');
        $result = Module::select('name')->where("name","LIKE","%{$term}%")->get();
        return response()->json($result);
    }
    public function changepass()
    {
     return view('cms.manageUser.changePassword');

    }

    public function editProfile()
    {
        $data['user']   = \Auth::User();
        
        return view('cms.manageUser.updateProfile',$data);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user   = \Auth::User();
        
        if(\Hash::check($request->password, $user->password))
        {
            $user->name  = $request->name;
            $user->email = $request->email;
            $user->save();
            return back()->with('success','Profile Updated');
        }     
        return back()->with('failure','Entered password is incorrect');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $current_password = \Auth::User()->password; 
        $currentPassword  =  $request->input('currentPassword');
    
      if(\Hash::check($currentPassword, $current_password))
      {         
           $user_id         = \Auth::User()->id;                       
            $user           = User::find($user_id);
            $user->password = \Hash::make($request->input('newPassword'));
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Changed!');
        }
        else
        {           
            return back()->with('failure','Please enter correct current password');
        } 
    }
    public function rolesTrashList()
    {
        $data['trashedRoles']   =   Role::onlyTrashed()->get();

        return view('cms.trashed.roleTrashedList',$data);
    }
    public function restoreRole($id)
    {
        Role::onlyTrashed()->find($id)->restore();

        return back()->with('success','Successfully Restored');
    }
    public function forceDeleteRole($id)
    {
        Role::onlyTrashed()->find($id)->forceDelete();

        return back()->with('success','Permanently Deleted!');
    }
}
