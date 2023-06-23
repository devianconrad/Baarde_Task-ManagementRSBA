<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\todo_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class HomeController extends Controller
{
    public function index()
    {

        $userName = Auth::user()->name;
        $todo_arr = todo_list::where('user', $userName)->get();
        
        return view('home')->with('todo_arr', $todo_arr);


    }       
}