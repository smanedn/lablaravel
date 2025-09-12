<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('type', 'asc')->get();
        $notes = Note::latest()->get();
        return view('list-notes', compact('types', 'notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
