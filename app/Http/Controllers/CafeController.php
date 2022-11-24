<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function index(){
        $cafe = Cafe::all();
        return view("admin.dashboard", compact(["cafe"]));
    }

    public function show($id){
        $cafe = Cafe::find($id);
        return view("showCafe", compact(["cafe"]));
    }

    public function create(Request $request){
        Cafe::created($request->except(["_token","submit"]));
    }

    public function update(Request $request, $id){
        $cafe = Cafe::find($id);
        $cafe->update($request->except(["_token","submit"]));
    }

    public function delete($id){
        $cafe = Cafe::find($id);
        $cafe->delete();
    }
}
