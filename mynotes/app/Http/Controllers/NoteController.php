<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $types = Type::orderBy('type', 'asc')->get();
        return view('add-note', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request) : RedirectResponse
    {
        Note::create($request->validated());
        return redirect()->route('home')->with('success', 'Nota aggiunta con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note) : View
    {
        return view('show-note', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note) : View
    {
        $types = Type::orderBy('type', 'asc')->get();
        return view('edit-note', compact('note', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note) : RedirectResponse
    {
        $note->update($request->validated());
        return redirect()->route('home')->with('success', 'Nota modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::destroy($id);
        return redirect()->route('home')->with('success', 'Nota eliminata con successo');
    }
}
