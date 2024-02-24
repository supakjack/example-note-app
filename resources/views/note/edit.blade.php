<!-- resources/views/note/edit.blade.php -->
<h1>Edit Note</h1>
<form action="{{ route('notes.update', $note->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" value="{{ $note->title }}"><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content">{{ $note->content }}</textarea><br>
    <button type="submit">Update</button>
</form>

<a href="{{ route('notes.index') }}">Back to Notes</a>