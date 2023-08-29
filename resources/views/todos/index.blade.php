<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <section class="w-full max-w-screen-xl mx-auto px-4">
        <form hx-post="/todos" hx-target="#todo-list" hx-swap="beforeend">
            @csrf
            <input type="text" name="title" placeholder="New todo...">
            <button type="submit">Add</button>
        </form>
        <ul class="todo-list" id="todo-list">
            @foreach($todos as $todo)
                @include('todos.todo', ['todo' => $todo])
            @endforeach
        </ul>
    </section>
</x-app-layout>
