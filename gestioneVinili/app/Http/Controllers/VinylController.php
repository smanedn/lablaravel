<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVinylRequest;
use App\Http\Requests\UpdateVinylRequest;
use App\Models\Vinyl;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VinylController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vinyls = Vinyl::with('artist', 'genres')->orderBy('title')->get();
        return view('vinyls-list', compact('vinyls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $artists = Artist::orderBy('last_name')->get();
        $genres = Genre::orderBy('name')->get();
        return view('vinyls.create', compact('artists', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVinylRequest $request): RedirectResponse
    {
        $vinyl = Vinyl::create($request->validated());
        if ($request->has('genres')) {
            $vinyl->genres()->sync($request->input('genres'));
        }
        return redirect()->route('vinyls.index')->with('success', 'Vinyl added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vinyl $vinyl): View
    {
        $vinyl->load('artist', 'genres');
        return view('vinyls.show', compact('vinyl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vinyl $vinyl): View
    {
        $artists = Artist::orderBy('last_name')->get();
        $genres = Genre::orderBy('name')->get();
        $vinyl->load('genres');
        return view('vinyls.edit', compact('vinyl', 'artists', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVinylRequest $request, Vinyl $vinyl): RedirectResponse
    {
        $vinyl->update($request->validated());
        if ($request->has('genres')) {
            $vinyl->genres()->sync($request->input('genres'));
        }
        return redirect()->route('vinyls.index')->with('success', 'Vinyl updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vinyl $vinyl): RedirectResponse
    {
        $vinyl->delete();
        return redirect()->route('vinyls.index')->with('success', 'Vinyl deleted successfully.');
    }
}
