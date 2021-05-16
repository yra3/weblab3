@extends('pagetamplate')

@section('title')
{{ $place->name }}
    {{$place->user_id}}
@endsection

@section('toasts')
    @include('toasts')
@endsection

@section('scripts')
    @include('homepagescripts')
@endsection

@section('content')
<img class="card-img-top img-fluid"  src="http://127.0.0.1:8000/storage/{{ $place->photo_name }}">
    <p>
        {{ $place->short_info }}
    </p>
    <p>
        {{ $place->full_info }}
    </p>
    <p>Тип: {{ $place->type }}</p>
    @if($place->user_id == $user_id and $user_id != null)
    <h3><a href="/places/{{ $place->id }}/edit">Изменить</a></h3>

    <form action="/places/{{ $place->id }}" method="post">
        @method('DELETE')
        @csrf
        <button>
            Удалить
        </button>
    </form>
    @endif

@endsection
