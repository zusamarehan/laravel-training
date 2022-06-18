<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class TodoController extends Controller
{
    public function form()
    {
        return view('index');
    }

    public function index()
    {
        $todos = Todo::query()->get();

        return view('todos', [
            'todos' => $todos,
        ]);
    }

    public function store()
    {
        $data = request()->all();

        validator($data, [
            'task' => ['required'],
            'date' => ['required']
        ])->validate();

        Todo::insert([
            'task' => $data['task'],
            'date' => $data['date'],
            'is_completed' => 0
        ]);

        session()->flash('store', 'Stored Successfully');

        return view('index');
    }

    public function updateStatus($id)
    {
        $todo = Todo::query()
            ->where('id', $id)
            ->first();

        $todo->is_completed = $todo->is_completed == 1 ? 0 : 1;
        $todo->update();

        session()->flash('updateCompleteStatus', 'Updated Successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $todo = Todo::query()
            ->findOrFail($id);

        $todo->delete();

        session()->flash('destroy', 'Delete Successfully');

        return redirect()->back();
    }
}
