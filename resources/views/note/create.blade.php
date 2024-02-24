<!-- resources/views/note/create.blade.php -->
<h1>Create Note</h1>
<form action="{{ route('notes.store') }}" method="post">
    @csrf
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content"></textarea><br>
    <button type="submit">Create</button>
</form>

<a href="{{ route('notes.index') }}">Back to Notes</a>