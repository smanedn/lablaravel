<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $genres = Genre::orderBy('name')->get();
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request): RedirectResponse
    {
        Genre::create($request->validated());
        return redirect()->route('genres.index')->with('success', 'Genre added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre): View
    {
        $genre->load('vinyls');
        return view('genres.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre): View
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre): RedirectResponse
    {
        $genre->update($request->validated());
        return redirect()->route('genres.index')->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre): RedirectResponse
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully.');
    }
}
