@fragment("todo")
    <li id="todo-{{ $todo->id }}" class="mt-3">
        <input
            type="checkbox"
            class="toggle"
            hx-patch="/todos/{{ $todo->id }}"
            @checked($todo->completed)
            hx-target="#todo-{{ $todo->id }}"
            hx-swap="outerHTML"
            hx-indicator="#loading"
        />
        <span class="{{ $todo->completed ? 'text-green-500 line-through' : 'text-white' }}">{{ $todo->title }}</span>
        <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-white"
                hx-delete="/todos/{{ $todo->id }}"
                hx-target="#todo-{{ $todo->id }}"
                hx-swap="outerHTML"
                hx-indicator="#loading">
            Delete
        </button>
    </li>
@endfragment
