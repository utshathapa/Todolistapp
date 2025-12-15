<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Cute To-Do List 💖</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>

<div class="container">
    <h1>💗 To-Do List</h1>
    <p class="quote">✨ "One task at a time, one step closer to your goal." 💪</p>

    <!-- Add Todo Form -->
    <form action="{{ url('/todos') }}" method="POST" enctype="multipart/form-data" class="input-section">
        @csrf
        <input type="text" name="title" placeholder="What's your plan🔥❤️" required />
        <label class="file-label">
            📁 Choose File
            <input type="file" name="image" accept="image/*" />
        </label>
        <button type="submit" class="add-btn">Add 💖</button>
    </form>

    <!-- Todo List -->
    <ul id="task-list">
        @forelse($todos as $todo)
        <li>
            <div class="task-left">
                <span class="task-text {{ $todo->status == 'completed' ? 'completed' : '' }}">
                    {{ $todo->title }}
                </span>
                @if($todo->image)
                    <img src="{{ asset('storage/' . $todo->image) }}" alt="todo image" class="todo-image" />
                @endif
            </div>

            <div class="task-right">
                <!-- Edit Button -->
                <a href="{{ url('/todos/'.$todo->id.'/edit') }}" class="edit-btn" title="Edit">✏️</a>

                <!-- Delete Button -->
                <form action="{{ url('/todos/'.$todo->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn" type="submit" title="Delete">🗑️</button>
                </form>
            </div>
        </li>
        @empty
        <li class="empty-list">No tasks yet! Add your first cute task 💖</li>
        @endforelse
    </ul>
</div>

</body>
</html>