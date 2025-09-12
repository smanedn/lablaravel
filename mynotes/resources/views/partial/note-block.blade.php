<article class="row border-bottom border-dark-subtle py-3">
    <div class="col-9">
        <a href="{{ route('notes.show', $note->id) }}">
            <p class="mb-0">
                <strong>{{ Str::substr($note->note, 0, 20)}} {{strlen($note->note) > 20 ? '...' : ''}}</strong>
            </p>
            <small>{{ $note->updated_at->format('d/m/Y H:i:s') }}</small>
        </a>
    </div>
    <div class="col-3 d-flex align-items-center justify-content-end">
        <form action="{{route('notes.destroy', $note->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro? Stai eliminando una nota.')"><i class="bi bi-trash"></i></button>
        </form>
        <a href="{{route('notes.edit', $note->id)}}"><i class="bi bi-pencil ms-3"></i></a>
    </div>
</article>
