<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function welcome()
    {
        $todos = Todo::paginate(3)->withQueryString();
        return view('welcome', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'add' => 'required',
        ]);
        Todo::insert([
            'add' => $request->add,
            'created_at' => now(),
        ]);
        return back()->with('done', 'One more todo inserted!');
    }

    public function destroy($id)
    {
        $todo_data = Todo::find($id);
        $todo_data->delete();
        return back()->with('delete', 'todo data successfully deleted!');
    }
    public function edit($id)
    {
        $todo_data = Todo::find($id);
        return view('edit',compact('todo_data'));
    }
    public function update(Request $request, $id)
    {
       $todo_data =Todo::find($id);
       $request->validate([
        '*'=>'required',
       ]);
       $todo_data->update([
        'add'=>$request->edit,
        'updated_at'=>now(), 
       ]);
       return back()->withSuccess('Your data updated!');

    }
    
}
