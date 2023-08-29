<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <section class="w-full max-w-screen-xl mx-auto px-4" id="todo">
        <form hx-post="/todos" hx-target="#todo-list" hx-swap="beforeend" hx-indicator="#loading">
            <input class="w-9/12"
                   name="title" placeholder="New todo..." required maxlength="255">
            <button class="flex-no-shrink p-2 border-2 rounded text-white">Add</button>
            <div class="text-center">
                <img id="loading" class="htmx-indicator" src="https://htmx.org/img/bars.svg" width="25px"/>
            </div>
        </form>
        <ul class="todo-list" id="todo-list">
            @foreach($todos as $todo)
                @include('todos.todo', ['todo' => $todo])
            @endforeach
        </ul>

        @fragment("todo-count")
            <p id="todo-count" class="text-white" hx-swap-oob="true">{{ $counter }} items left</p>
        @endfragment
    </section>
</x-app-layout>
