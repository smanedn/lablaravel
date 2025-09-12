@extends('layout.main')

@section('header-title')
    La tua Nota
@endsection

@section('header-content')
    {{ $note->updated_at->format('d/m/Y ') }} <small class="hour-note">{{$note->updated_at->format('H:i:s')}}</small>
@endsection


@section('main-content')
    <div class="row py-3">
        <div class="col-sm-12">
            <p>{{$note->note}}</p>
        </div>
        <div class="col-sm-12 border-top pt-4 d-flex justify-content-between">
            <a href="{{route('home')}}"><i class="bi bi-arrow-left"></i> Torna alla lista delle tue note</a>
            <span class="d-flex align-items-center justify-content-end">
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Sei sicuro? Stai eliminando una nota!')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
                    <a href="{{route('notes.edit', $note->id)}}"><i class="bi bi-pencil ms-3"></i></a>
            </span>
        </div>
    </div>
@endsection
