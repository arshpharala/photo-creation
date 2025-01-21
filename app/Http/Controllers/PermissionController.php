<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionCreateRequest;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['permissions'] = Permission::query()
        ->select(
            'permissions.*',
            'modules.name as module_name'
        )
        ->leftJoin('modules', 'modules.id', 'permissions.module_id')
        ->get();

        return view('cms.permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['modules'] = Module::pluck('name', 'id')->toArray();
        $response['view'] = view('cms.permissions.create', $data)->render();

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionCreateRequest $request)
    {
        $user               = new Permission();
        $user->module_id    = $request->module_id;
        $user->name         = $request->name;
        $user->save();

        return back()->with('success','Permission Created');
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
        $data['modules'] = Module::pluck('name', 'id')->toArray();
        $data['permission'] = Permission::find($id);

        $response['view'] = view('cms.permissions.edit', $data)->render();

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role               = Permission::findOrFail($id);
        $role->module_id    = $request->module_id;
        $role->name         = $request->name;
        $role->update();

        return back()->with('success','Role Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
