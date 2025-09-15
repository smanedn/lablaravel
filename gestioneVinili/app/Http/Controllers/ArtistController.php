<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use App\Models\Artist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $artists = Artist::orderBy('last_name')->get();
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtistRequest $request): RedirectResponse
    {
        Artist::create($request->validated());
        return redirect()->route('artists.index')->with('success', 'Artist added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist): View
    {
        $artist->load('vinyls');
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist): View
    {
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtistRequest $request, Artist $artist): RedirectResponse
    {
        $artist->update($request->validated());
        return redirect()->route('artists.index')->with('success', 'Artist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist): RedirectResponse
    {
        $artist->delete();
        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');
    }
}
