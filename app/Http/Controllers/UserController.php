<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::get();

        return view('cms.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response['view'] = view('cms.users.create')->render();

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return back()->with('success','User Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::find($id);

        $response['view'] = view('cms.users.edit', $data)->render();

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user           = User::findOrFail($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->update();

        return back()->with('success','User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function changepass()
    {
     return view('cms.changePassword');

    }
    public function changePassword(ChangePasswordRequest $request)
    {
        $current_password = Auth::User()->password; 
        $currentPassword  =  $request->input('currentPassword');
    
      if(Hash::check($currentPassword, $current_password))
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
    public function editProfile()
    {
        $data['user']   = \Auth::User();
        
        return view('cms.updateProfile',$data);
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
}

