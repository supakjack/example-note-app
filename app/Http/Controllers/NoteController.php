<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create()
    {
        return view('note.create');
    }

    public function store(Request $request)
    {
        $note = new Note();
        $note->fill($request->all());
        $user = User::first();
        $note->user_id = $user->id;
        $note->save();

        return redirect()->route('notes.index');
    }

    public function show($id)
    {
        $note = Note::findOrFail($id);
        return view('note.show', compact('note'));
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('note.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());
        return redirect()->route('notes.index');
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return redirect()->route('notes.index');
    }
}
