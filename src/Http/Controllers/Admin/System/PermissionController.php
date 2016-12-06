<?php

namespace App\Http\Controllers\Admin\System;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PermissionForm;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.permission.retrieve')) {
            abort(403);
        }
        $permissions = Permission::paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.permission.create')) {
            abort(403);
        }
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        try {
            if (Permission::create($data)) {
                return redirect()->route('system.permission.index')->with('success','新增权限成功');
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
        //选择的权限
        $permission = Permission::find($id);
        $roles = Role::where('name','<>','super_admin')->get();
        //获取角色拥有的权限
        $permission_roles = Permission::find($id)->roles()->orderBy('name')->get();
        $permission_roles_names = [];
        foreach ($permission_roles as $role){
            $permission_roles_names[]= $role->name;
        }

        return view('admin.permission.roles', compact('permission','roles','permission_roles_names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.permission.retrieve')) {
            abort(403);
        }
        $permission = Permission::find($id);

        $roles = Role::where('name','<>','super_admin')->get();
        //获取角色拥有的权限
        $permission_roles = Permission::find($id)->roles()->orderBy('name')->get();
        $permission_roles_names = [];
        foreach ($permission_roles as $role){
            $role_permission_names[]= $role->name;
        }
        return view('admin.permission.edit',  compact('permission','roles','permission_roles_names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionForm $request, $id)
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.permission.update')) {
            abort(403);
        }
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        try {
            if (Permission::where('id', $id)->update($data)) {
                return redirect()->route('system.permission.index')->with('success','编辑权限成功');
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
        if (Gate::foruser($this->loggedUser())->denies('admin.permission.delete')) {
            abort(403);
        }
        try {
            if (Permission::destroy($id)) {
                return redirect()->back()->with('success','删除权限成功');
            }
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()));
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function attach(Request $request,$id)
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.permission.attach')) {
            abort(403);
        }
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        try {
            $Permission=Permission::find($id);
            if(!empty($data['roles'])){
                $Permission->Roles()->sync($data['roles']);
            }
            return redirect()->back()->with('success',trans('system.success.attach_permission_to_roles'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }
}
