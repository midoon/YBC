<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($idCafe){
        $menus = Menu::where('cafe_id',$idCafe)->get();
        return view('admin.menu', compact('menus'), ["cafe_id" => $idCafe]);
    }

    public function create(Request $request){
        Menu::create($request->all());
        return redirect("/create-menu/$request->cafe_id");
    }

    public function update(Request $request, $id){

    }

    public function delete($id, $cafe_id){
        $menu = Menu::find($id);
        $menu->delete();
        return redirect("/create-menu/$cafe_id");
    }
}
