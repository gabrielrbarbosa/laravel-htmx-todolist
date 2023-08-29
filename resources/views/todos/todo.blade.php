@fragment("todo")
    <li id="todo-{{ $todo->id }}" @class(['completed' => $todo->completed])>
        <input
            type="checkbox"
            class="toggle"
            hx-patch="/todos/{{ $todo->id }}"
            @checked($todo->completed)
            hx-target="#todo-{{ $todo->id }}"
            hx-swap="outerHTML"
            hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
        />
        {{ $todo->title }}
        <button hx-delete="/todos/{{ $todo->id }}" hx-target="#todo-{{ $todo->id }}" hx-swap="outerHTML"
                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'>
            Delete
        </button>
    </li>
@endfragment
