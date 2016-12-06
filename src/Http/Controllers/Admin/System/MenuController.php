<?php

namespace App\Http\Controllers\Admin\System;

use App\Models\Menu;
use App\Models\MenuTree;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

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
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tree = MenuTree::createLevelTree(Menu::all());

        return view('admin.menu.create', compact('tree'));
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
        unset($data['_token']);
        unset($data['_method']);

        try {
            if (Menu::create($data)) {
                return redirect()->back()->withSuccess("新增菜单成功");
            }
        } catch (\Exception $e) {
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
        $menu = Menu::find($id);
        $tree = MenuTree::createLevelTree(Menu::all());

        return view('admin.menu.edit', compact('menu', 'tree'));
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
        unset($data['_method']);
        unset($data['_token']);

        try {
            if (Menu::where('id', $id)->update($data)) {
                return redirect()->back()->withSuccess('编辑菜单成功');
            }
        } catch (\Exception $e) {
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
