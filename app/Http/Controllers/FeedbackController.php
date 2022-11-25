<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index($cafe_id){
        $feedbacks = DB::table('feedbacks')->select("feedbacks.*","users.name as name")->join('users', 'users.id', '=', 'feedbacks.user_id')->where('feedbacks.cafe_id', '=', $cafe_id)->get();
        return view('show-coment', compact('feedbacks'));
    }

    public function create(Request $request){
        Feedback::create($request->all());
        return redirect("/show/$request->cafe_id");
        
    }
}
