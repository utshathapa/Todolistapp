<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Todo 💖</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>

<div class="container">
    <h1>✏️ Edit Todo</h1>

    <form action="{{ url('/todos/'.$todo->id) }}" method="POST" enctype="multipart/form-data" class="input-section">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $todo->title }}" required />

        <label class="file-label">
            📁 Choose New Image
            <input type="file" name="image" accept="image/*" />
        </label>

        @if($todo->image)
            <p>Current Image:</p>
            <img src="{{ asset('storage/'.$todo->image) }}" alt="todo image" class="todo-image" />
        @endif

        <select name="status" class="status-select">
            <option value="pending" {{ $todo->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ $todo->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <button type="submit" class="add-btn">Update 💖</button>
        <a href="{{ url('/') }}" class="cancel-btn">Cancel</a>
    </form>
</div>

</body>
</html>