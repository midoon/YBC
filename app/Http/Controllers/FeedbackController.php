<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(){
        
    }

    public function create(Request $request){
        Feedback::create($request->all());
        return redirect("/show/$request->cafe_id");
        
    }
}
