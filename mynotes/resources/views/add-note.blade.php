@extends('layout.main')

@section('header-title')
    Nuova Nota
@endsection

@section('header-content')
    Stai aggiungendo una nuova nota alla tua lista.
@endsection


@section('main-content')
    <form action="{{route('notes.store')}}" class="col-sm-12" method="post">
        @csrf
        @error('type_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        @forelse($types as $type)
            <div>
                <input type="radio" name="type_id" id="{{$type->type}}"
                       value="{{$type->id}}" {{(old('type_id') == $type->id) ? 'checked' : ''  }}>
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
            <textarea name="note" id="note" class="w-100" maxlength="500">{{ old('note') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary me-4">Memorizza la Nota</button>
        <a href="{{route('home')}}">Annulla</a>
        </div>
    </form>
@endsection
