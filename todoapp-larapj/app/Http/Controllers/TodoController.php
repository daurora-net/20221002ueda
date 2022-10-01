<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class todoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', ['todos' => $todos]);
    }
    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $form = $request->all();
        Todo::find($request->id)->delete($form);
        return redirect('/');
    }
}