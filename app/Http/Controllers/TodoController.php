<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Mauricius\LaravelHtmx\Facades\HtmxResponse;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index', ['todos' => Todo::all()]);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255']);
        $todo = Todo::create(['title' => $request->title, 'completed' => false]);
        return HtmxResponse::addRenderedFragment( view('todos.todo', compact('todo'))->render());
    }

    public function update($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        return HtmxResponse::addRenderedFragment(view('todos.todo', compact('todo'))->render());
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return response(' ', 200);
    }
}
