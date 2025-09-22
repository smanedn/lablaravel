@extends('layout.main')

@section('header-title')
    Nuovo vinile
@endsection

@section('header-content')
    Stai aggiungendo un nuovo vinile alla tua lista.
@endsection

@section('main-content')

    <form action="{{ route('vinyls.store') }}" method="POST" class="col-sm-12">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="release_year" class="form-label">Anno di uscita</label>
            <input type="number" name="release_year" id="release_year" class="form-control" value="{{ old('release_year') }}">
            @error('release_year')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="artist_id" class="form-label">Artista</label>
            <select name="artist_id" id="artist_id" class="form-select">
                <option value="">-- Seleziona artista --</option>
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" {{ old('artist_id') == $artist->id ? 'selected' : '' }}>
                        {{ $artist->first_name }} {{ $artist->last_name }}
                    </option>
                @endforeach
            </select>
            @error('artist_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Qui trasformiamo i generi in checkbox --}}
        <div class="mb-3">
            <label class="form-label">Generi musicali</label>
            <div class="row">
                @foreach($genres as $genre)
                    <div class="col-6 col-md-4">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="genres[]"
                                id="genre_{{ $genre->id }}"
                                value="{{ $genre->id }}"
                                {{ collect(old('genres'))->contains($genre->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="genre_{{ $genre->id }}">
                                {{ $genre->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
            @error('genres')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Copertina (URL o nome file)</label>
            <input type="text" name="cover_image" id="cover_image" class="form-control" value="{{ old('cover_image') }}">
            @error('cover_image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary me-4">Salva vinile</button>
        <a href="{{ route('vinyls.index') }}" class="btn btn-outline-secondary">Annulla</a>
    </form>
@endsection
