<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CafeController extends Controller
{
    public function index(){
        $cafes = Cafe::all();
        return view("admin.dashboard", compact(["cafes"]));
    }

    public function show($id){
        $cafe = Cafe::find($id);
        $menus = Menu::where('cafe_id', '=', $id)->get();
        return view("admin.show", compact(["cafe","menus"]));
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'image|file|max:5024',
            'user_id' => 'required',
        ]);

        // dd($request);

        $validatedData['photo'] = $request->file('photo')->store('image-cafe');
        Cafe::create($validatedData);
        return redirect('/admin');
    }

    public function update(Request $request, $id){
        
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'image|file|max:5024',
            'user_id' => 'required',
        ]);
        
        if($request->file('photo')){
            $validatedData['photo'] = $request->file('photo')->store('image-cafe');
            Storage::delete($request->oldImage);
        } else {
            $validatedData['photo'] = $request->oldImage;
        }
        
        // dd($request->oldImage);
        Cafe::where('id', $id)->update($validatedData);
        
        return redirect('/admin');
    }

    public function delete($id){
        $cafe = Cafe::find($id);
        $cafe->delete();
        return redirect('/admin');
    }
}
