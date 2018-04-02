<?php

namespace Ikodota\Yeoman\Controllers\Admin\System;

use Ikodota\Yeoman\Models\Permission;
use Ikodota\Yeoman\Models\Role;
use Illuminate\Http\Request;
use Ikodota\Yeoman\Requests\Admin\RoleForm;
use Ikodota\Yeoman\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;

class RoleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::foruser($this->loggedUser())->denies('admin.role.read')) {
            abort(403);
        }

        $roles = Role::paginate(10);
        return view('yeoman::backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $referer_url = URL::previous();
        //如果不具备具体的操作权限
        if (Gate::foruser($this->loggedUser())->denies('admin.role.read')) {
            abort(403);
        }
        return view('yeoman::backend.role.create',compact('referer_url'));
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
        $referer_url=$data['_referer'];
        unset($data['_token']);
        unset($data['_method']);
        unset($data['_referer']);
        try {
            if (Role::create($data)) {
                return redirect()->to($referer_url)->withSuccess('新增角色成功');
            }
        }
        catch (\Exception $e)
        {
            return redirect()->to($referer_url)->withErrors(array('error' => $e->getMessage()))->withInput();
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


        return view('yeoman::backend.role.permissions', compact('role','permissions','role_permissions_names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referer_url = URL::previous();
        if (Gate::foruser($this->loggedUser())->denies('admin.role.read')) {
            abort(403);
        }
        $role = Role::find($id);
        return view('yeoman::backend.role.edit', compact('role','referer_url'));
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
        $referer_url=$data['_referer'];
        unset($data['_token']);
        unset($data['_method']);
        unset($data['_referer']);
        try {
            $role=Role::find($id);
           /* $role->name=$data['name'];
            $role->display_name=$data['display_name'];
            $result=$role->save();*/
            $result=$role->update($data);
            //if (Role::where('id', $id)->update($data)) {
            if ($result) {
                return redirect()->to($referer_url)->withSuccess(trans('system.success.edit_role'));
            }
        }
        catch (\Exception $e)
        {
            return redirect()->to($referer_url)->withErrors(array('error' => $e->getMessage()))->withInput();
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
