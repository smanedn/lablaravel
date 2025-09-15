@extends('layout.main')

@section('head-title')
    Vinyl Records
@endsection

@section('header-title')
    Vinyl Records <a href="{{ route('vinyls.create') }}" class="fab-new-note"><i class="bi bi-plus-lg"></i></a>
@endsection

@section('header-content')
    <a href="{{ route('vinyls.index') }}" class="me-4 {{ url()->current() == route('vinyls.index') ? 'active' : '' }}">All Vinyls</a>
    @forelse($vinyls as $vinyl)
        <a href="{{ route('vinyls.show', $vinyl->id) }}"
           class="{{ !$loop->last ? 'me-4' : '' }} {{ url()->current() == route('vinyls.show', $vinyl->id) ? 'active' : '' }}">
            {{ $vinyl->title }}
        </a>
    @empty
        No vinyl records found
    @endforelse
@endsection

@section('main-content')
    @forelse($vinyls as $vinyl)
        <article class="row border-bottom border-dark-subtle py-3">
            <div class="col-12">
                <h5>{{ $vinyl->title }} ({{ $vinyl->release_year ?? 'Year N/A' }})</h5>
                <p>Artist: {{ $vinyl->artist->first_name ?? '' }} {{ $vinyl->artist->last_name ?? '' }}</p>
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
