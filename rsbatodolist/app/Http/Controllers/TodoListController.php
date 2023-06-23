<?php

namespace App\Http\Controllers;

use App\Models\todo_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $userName = Auth::user()->name;
        $todo_arr = todo_list::where('user', $userName)->get();
        
        return view('home')->with('todo_arr', $todo_arr);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_new_list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = $request->input('name');
    $todoItem = $request->input('todo_item');

    // Check if the user has any duplicate todo items
    $existingTodo = todo_list::where('user', $user)
                            ->where('todo_item', $todoItem)
                            ->first();

    if ($existingTodo) {
        // Duplicate todo item found
        return back()->with('error', 'Duplicate todo item found. Please enter a unique todo item.');
    }

    // No duplicate todo item found, store the new todo item
    $todo = new todo_list();
    $todo->user = $user;
    $todo->todo_item = $todoItem;
    $todo->status = $request->input('status');
    $todo->save();

    return redirect('home');
}


    /**
     * Display the specified resource.
     */
    public function show(todo_list $todo_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(todo_list $todo_list, $id)
    {
        $todo = todo_list::find($id);
        return view('edit_list')->with('todo_arr',$todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $todoItem = $request->input('todo_item');
    
       
        $existingTodo = todo_list::where('todo_item', $todoItem)
                                ->where('id', '!=', $id)
                                ->first();
    
        if ($existingTodo) {
            
            return back()->with('error', 'Duplicate to-do item found. Please enter a unique to-do item.');
        }
    
       
        $todo = todo_list::find($id);
        $todo->todo_item = $todoItem;
        $todo->status = $request->input('status');
        $todo->save();
    
        return redirect('home');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todo_list $todo_list, $id)
    {
        $row = todo_list::destroy($id);
        return redirect('home');

    }
}
