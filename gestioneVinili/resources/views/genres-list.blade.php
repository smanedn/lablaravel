@extends('layout.main')

@section('head-title')
    Music Genres
@endsection

@section('header-title')
    Music Genres <a href="{{ route('genres.create') }}" class="fab-new-note"><i class="bi bi-plus-lg"></i></a>
@endsection

@section('header-content')
    <a href="{{ route('genres.index') }}" class="me-4 {{ url()->current() == route('genres.index') ? 'active' : '' }}">All Genres</a>

    @forelse($genres as $genre)
        <a href="{{ route('genres.show', $genre->id) }}"
           class="{{ !$loop->last ? 'me-4' : '' }} {{ url()->current() == route('genres.show', $genre->id) ? 'active' : '' }}">
            {{ $genre->name }}
        </a>
    @empty
        No genres available
    @endforelse
@endsection

@section('main-content')
    
@endsection
