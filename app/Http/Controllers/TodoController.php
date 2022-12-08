<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('todo.index', compact('todos'));
    }
    public function create()
{
    return view('todo.create');
}
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->save();

        return redirect('todos')->with(
            'status',
            $todo->title . 'を登録しました!'
        );
    }
    public function show($id)
{
    $todo = Todo::find($id);

    return view('todo.show', compact('todo'));
}
public function edit($id)
{
    $todo = Todo::find($id);

    return view('todo.edit', compact('todo'));
}
public function update(Request $request, $id)
{
    $todo = Todo::find($id);

    $todo->title = $request->input('title');
    $todo->save();

    return redirect('todos')->with(
        'status',
        $todo->title . 'を更新しました!'
    );
}
public function destroy($id)
{
    $todo = Todo::find($id);
    $todo->delete();

    return redirect('todos')->with(
        'status',
        $todo->title . 'を削除しました!'
    );
}
}
