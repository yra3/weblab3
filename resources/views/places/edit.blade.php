@extends('pagetamplate')

@section('title')
{{ $place->name }}
@endsection

@section('toasts')
    @include('toasts')
@endsection

@section('scripts')
    @include('homepagescripts')
@endsection

@section('content')

<a href="/places/{{ $place->id }}">Назад</a>
<form action="/places/{{ $place->id }}" method="post">
    @method('PATCH')
    <div>
        <label for="name">name</label>
        <input type="text" name="name" autocomplete="off" value="{{$place->name}}" required maxlength="100">
        @error('name')
            {{$message}}
        @enderror
    </div>
    <div>
        <label for="short_info">short info</label>
        <input type="text" name="short_info" autocomplete="off" value="{{$place->short_info}}" required maxlength="400">
        @error('short_info')
            {{$message}}
        @enderror
    </div>
    <div>
        <label for="type">type</label>
        <input type="text" name="type" autocomplete="off" value="{{$place->type}}" maxlength="50">
        @error('type')
            {{$message}}
        @enderror
    </div>
    <div>
        <label for="full_info">full info</label>
        <input type="text" name="full_info" autocomplete="off" value="{{$place->full_info}}">
        @error('record')
            {{$message}}
        @enderror
    </div>
    @csrf
    <button>Save place</button>
</form>
<br/><br/>
<p>Добавить фото</p>
<form action="/places/{{$place->id}}/uploadphoto" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <div>
        <button type="submit"> Загрузить фото</button>
    </div>
</form>

@endsection