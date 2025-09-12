@extends('layout.main')

@section('head-title')
    Le mie note
@endsection

@section('header-title')
    Le mie Note<a href="{{route('notes.create')}}" class="fab-new-note"><i class="bi bi-plus-lg"></i></a>
@endsection

@section('header-content')
    <a href="{{route('home')}}" class="me-4 {{url()->current() == route('home') ? 'active' : ''}}"> Tutte </a>

    @forelse($types as $type)
        <a href="{{route('type.show', $type->id)}}"
           class="{{(!$loop->last) ?'me-4 ' : ''}}
           {{url()->current() == route('type.show', $type->id) ? 'active' : ''}}">
            {{ $type-> type }}
        </a>


    @empty
        Non sono presenti tipologie
    @endforelse

@endsection

@section('main-content')

    @forelse($notes as $note)
        @include('partial.note-block')
    @empty
        <article class="row border-bottom border-dark-subtle py-3">
            <div class="col-12">
            Non sono presenti note.
            </div>
        </article>
    @endforelse

@endsection
