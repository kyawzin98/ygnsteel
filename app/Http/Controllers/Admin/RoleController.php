<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles']=Role::all();
        $data['sub_head']=false;
        return view('role.role_lists')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('role.add_role');
        $role=Role::get();
        return \DataTables::of($role)->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles|max:50'
        ]);
//        $data=$request->except(['_token']);
//        Role::create($data);
//        return redirect(route('Role.index'));
        Role::create($request->all());
        return response(['success'=>'Role Name .'.$request->name.' has been added.'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role']=Role::find($id) ?? abort('404');
        $data['sub_head']=false;
        return view('role.edit_role')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:roles|max:50'
        ]);

        $role=Role::find($id);
        $data=$request->except(['_token']);
        $role->update($data);
        return redirect(route('Role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
//        return redirect()->back();
        return response(['success'=>'Role has been removed.'],200);
    }

}
