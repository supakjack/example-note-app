<h1>Notes</h1>
@if ($notes->isEmpty())
    <p>No notes found.</p>
@else
    <ul>
        @foreach ($notes as $note)
            <li>
                {{ $note->title }}
                <form action="{{ route('notes.destroy', $note->id) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <a href="{{ route('notes.edit', $note->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endif

<a href="{{ route('notes.create') }}">Create New Note</a>