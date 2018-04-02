<?php

namespace Ikodota\Yeoman\Controllers\Admin\System;

use Ikodota\Yeoman\Models\Menu;
use Ikodota\Yeoman\Models\MenuTree;
use Illuminate\Http\Request;
use Ikodota\Yeoman\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$menus = Menu::paginate(25);
        $menus = MenuTree::createLevelTree(Menu::all());
        return view('yeoman::backend.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $referer_url = URL::previous();
        $tree = MenuTree::createLevelTree(Menu::all());

        return view('yeoman::backend.menu.create', compact('tree','referer_url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $referer_url=$data['_referer'];
        unset($data['_token']);
        unset($data['_method']);
        unset($data['_referer']);

        try {
            if (Menu::create($data)) {
                return redirect()->to($referer_url)->with('success','新增菜单成功');
            }
        } catch (\Exception $e) {
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
        $referer_url = URL::previous();
        if (Gate::foruser($this->loggedUser())->denies('admin.menu.read')) {
            abort(403);
        }
        $menu = Menu::find($id);
        $tree = MenuTree::createLevelTree(Menu::all());

        return view('yeoman::backend.menu.edit', compact('menu', 'tree','referer_url'));
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
        $data = $request->all();
        $referer_url=$data['_referer'];
        unset($data['_method']);
        unset($data['_token']);
        unset($data['_referer']);

        try {
            if (Menu::where('id', $id)->update($data)) {
                return redirect()->to($referer_url)->withSuccess("编辑菜单成功");
            }
        } catch (\Exception $e) {
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
        $childMenus = Menu::where('parent_id', '=', $id)->get()->toArray();
        if ( ! empty($childMenus)) {
            return redirect()->back()->withErrors("请先删除其下级分类");
        } try {
            if (Menu::destroy($id)) {
                return redirect()->back()->withSuccess('删除菜单成功');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()));
        }

    }
}
