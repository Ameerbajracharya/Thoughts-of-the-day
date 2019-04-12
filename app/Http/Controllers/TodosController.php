<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo =new Todo;
        $todo->todo = $request->todo; 
        $todo->save();
        Session::flash('success', 'Your Thought was Submited. ');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $id)
    {
        $todo=Todo::find($id);
        $todo->todo = $request->todo;
        $todo->save();
        Session::flash('success', 'Your Thought was Updated.');
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo=Todo::find($id);
        return view('update')->with('todo',$todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $todo=Todo::find($id);
        $todo->delete();
        Session::flash('success', 'Your Thought was Deleted.');
        return redirect()->back();
    }
    public function completed($id)
    {
        $todo=Todo::find($id);
        $todo->completed=1;
        $todo->save();
        Session::flash('success', 'Your Thought was Marked.');
        return redirect()->back();
    }
}
