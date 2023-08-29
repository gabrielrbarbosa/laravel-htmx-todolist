<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index', [
            'todos' => Todo::all(),
            'counter' => Todo::where('completed', false)->count()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255']);
        $todo = Todo::create(['title' => $request->title, 'completed' => false]);
        $counter = Todo::where('completed', false)->count();

        return HtmxResponse::addFragment('todos.todo', 'todo', compact('todo'))
            ->addFragment('todos.index', 'todo-count', compact('counter'));
    }

    public function update($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        $counter = Todo::where('completed', false)->count();

        return HtmxResponse::addFragment('todos.todo', 'todo', compact('todo'))
            ->addFragment('todos.index', 'todo-count', compact('counter'));
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        $counter = Todo::where('completed', false)->count();

        return HtmxResponse::addFragment('todos.index', 'todo-count', compact('counter'));
    }
}
