<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }


    public function index(Request $request,Topic $topic)
    {
        $topics = $topic->order($request)->paginate(20);

        return view('home',compact('topics'));
    }
}
