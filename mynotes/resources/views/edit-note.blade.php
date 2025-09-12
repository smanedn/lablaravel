@extends('layout.main')

@section('header-title')
    Modifica la Nota
@endsection

@section('header-content')
    Stai modificanfo una nota.
@endsection


@section('main-content')
    <form action="{{route('notes.update', $note->id)}}" class="col-sm-12" method="post">
        @csrf
        @method('PUT')

        @forelse($types as $type)
            <div>
                <input type="radio" name="type_id" id="{{$type->type}}"
                       value="{{$type->id}}" {{($type->id == $note->type_id) ?'checked' : ''  }}>
                <label for="{{$type->type}}">{{$type->type}}</label>
            </div>
        @empty
            <div>
                Non sono presenti tipologie
            </div>
        @endforelse
        <div class="mt-4">
            <label for="note" class="d-block">Scrivi la tua Nota.
                @error('note')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>
            <textarea name="note" id="note" class="w-100" maxlength="500">{{ $note->note }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary me-4">Modifica la Nota</button>
        <a href="{{route('home')}}">Annulla</a>
        </div>
    </form>
@endsection
