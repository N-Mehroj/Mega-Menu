<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::whereNull('parent_id')->get();
        $allMenus = Menu::all();
        return view('menu.menuTreeview',compact('menus','allMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|string',
           'parent_id' => 'nullable|integer',
        ]);
        $menu = Menu::create([
            'title' => $request->get('title'),
            'parent_id' => $request->get('parent_id')
        ]);
        if($menu){
            return back()->with('success', 'Menu added successfully.');
        }
        else{
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function show()
    {
        $menus = Menu::all();
        return view('menu.dynamicMenu',compact('menus'));
        $menus = Menu::where('parent_id', '=', 0)->get();
        return view('menu.dynamicMenu',compact('menus'));
    }
}
