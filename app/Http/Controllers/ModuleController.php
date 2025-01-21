<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleCreateRequest;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['modules'] = Module::get();

        return view('cms.modules.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response['view'] = view('modules.create')->render();

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModuleCreateRequest $request)
    {
        $role           = new Module();
        $role->name     = $request->name;
        $role->save();

        return back()->with('success','Module Created');
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
        $data['module'] = Module::find($id);

        $response['view'] = view('cms.modules.edit', $data)->render();

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role           = Module::findOrFail($id);
        $role->name     = $request->name;
        $role->update();

        return back()->with('success','Module Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
