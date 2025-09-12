<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
    public function create(): View
    {
        $types = Type::orderBy('type', 'asc')->get();
        return view('add-note', compact('types'));
    }

    /**
     * Store a newly created resource in storagse.
     */
    public function store(StoreNoteRequest $request): RedirectResponse
    {
        Note::create($request->validated());
        return redirect()->route('home')->with('success', 'Nota aggiunta correttamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(NOte $note): View
    {
        $types = Type::orderBy('type', 'asc')->get();
        return view('show-note', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
