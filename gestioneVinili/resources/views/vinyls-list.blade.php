@extends('layout.main')

@section('head-title')
    Vinyl Records
@endsection

@section('header-title')
    Vinyl Records <a href="{{ route('vinyls.create') }}" class="fab-new-note"><i class="bi bi-plus-lg"></i></a>
@endsection

@section('header-content')
    <a href="{{ route('vinyls.index') }}" class="me-4 {{ url()->current() == route('vinyls.index') && !request('genre') ? 'active' : '' }}">
        All Vinyls
    </a>
    @forelse($genres as $genre)
        <a href="{{ route('vinyls.index', ['genre' => $genre->id]) }}"
           class="me-4 {{ request('genre') == $genre->id ? 'active' : '' }}">
            {{ $genre->name }}
        </a>
    @empty
        No genres found
    @endforelse
@endsection

@section('main-content')
    @forelse($vinyls as $vinyl)
        <article class="row border-bottom border-dark-subtle py-3 align-items-center">
            <div class="col-auto">
                @if($vinyl->cover_image)
                    <img src="{{ $vinyl->cover_image }}" alt="Copertina di {{ $vinyl->title }}" style="width:100px; height:100px; object-fit:cover;" class="rounded shadow-sm">
                @else
                    <div style="width:100px; height:100px;" class="bg-light d-flex align-items-center justify-content-center text-muted border rounded">
                        No img
                    </div>
                @endif
            </div>

            <div class="col">
                <h5>{{ $vinyl->title }} ({{ $vinyl->release_year ?? 'Year N/A' }})</h5>
                <p>Artist: {{ optional($vinyl->artist)->first_name }} {{ optional($vinyl->artist)->last_name }}</p>
                <p>Genres:
                    @forelse($vinyl->genres as $genre)
                        {{ $loop->first ? '' : ', ' }}{{ $genre->name }}
                    @empty
                        None
                    @endforelse
                </p>
            </div>

            <div class="col-auto text-end">
                <form action="{{ route('vinyls.destroy', $vinyl) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo vinile?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>
            </div>
        </article>
    @empty
        <article class="row border-bottom border-dark-subtle py-3">
            <div class="col-12">
                No vinyl records available.
            </div>
        </article>
    @endforelse
@endsection
