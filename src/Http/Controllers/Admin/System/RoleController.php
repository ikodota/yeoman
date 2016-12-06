<?php

namespace App\Http\Controllers\Admin\System;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RoleForm;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::foruser($this->loggedUser())->denies('admin.role.retrieve')) {
            abort(403);
        }

        $roles = Role::paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //如果不具备具体的操作权限
        if (Gate::foruser($this->loggedUser())->denies('admin.role.retrieve')) {
            abort(403);
        }
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.role.create')) {
            abort(403);
        }
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        try {
            if (Role::create($data)) {
                return redirect('admin/system/role')->withSuccess('新增角色成功');
            }
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*if (Gate::foruser($this->loggedUser)->denies('admin.role.index')) {
            abort(403);
        }*/
        //当前角色
        $role = Role::find($id);
        $permissions = Permission::all();
        //获取角色拥有的权限
        $role_permissions = Role::find($id)->permissions()->orderBy('name')->get();
        $role_permissions_names = [];
        foreach ($role_permissions as $permission){
            $role_permissions_names[]= $permission->name;
        }


        return view('admin.role.permissions', compact('role','permissions','role_permissions_names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.role.retrieve')) {
            abort(403);
        }
        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleForm $request, $id)
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.role.update')) {
            abort(403);
        }

        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        try {
            $role=Role::find($id);
           /* $role->name=$data['name'];
            $role->display_name=$data['display_name'];
            $result=$role->save();*/
            $result=$role->update($data);
            //if (Role::where('id', $id)->update($data)) {
            if ($result) {
                return redirect()->route('system.role.index')->withSuccess(trans('system.success.edit_role'));
            }
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.role.delete')) {
            abort(403);
        }
        try {
            if (Role::destroy($id)) {
                return redirect()->back()->withSuccess('删除角色成功');
            }
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()));
        }
    }

    /**
     * 同步角色权限
     * @param Request $request
     * @param $id
     */
    public function give(Request $request,$id)
    {

        if (Gate::foruser($this->loggedUser())->denies('admin.role.give')) {
            abort(403);
        }
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        try {
            $Role=Role::find($id);
            if(!empty($data['permissions'])){
                $Role->Permissions()->sync($data['permissions']);
            }
            return redirect()->back()->withSuccess(trans('system.success.give_role_permissions'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }


}
