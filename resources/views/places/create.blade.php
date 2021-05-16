@extends('pagetamplate')

@section('toasts')
    @include('toasts')
@endsection

@section('scripts')
    @include('homepagescripts')
@endsection

@section('content')

<h3>Add your own Place</h3>
<form action="/places" method="post">
    <div>
        <label for="name">name</label>
        <input type="text" name="name" autocomplete="off" value="{{old('name')}}" required required maxlength="100">
        @error('name')
            {{$message}}
        @enderror
    </div>
    <div>
        <label for="short_info">short info</label>
        <input type="text" name="short_info" autocomplete="off" value="{{old('short_info')}}" required required maxlength="400">
        @error('short_info')
            {{$message}}
        @enderror
    </div>
    <div>
        <label for="type">type</label>
        <input type="text" name="type" autocomplete="off" value="{{old('type')}}" maxlength="50">
        @error('type')
            {{$message}}
        @enderror
    </div>
    <div>
        <label for="full_info">full info</label>
        <input type="text" name="full_info" autocomplete="off" value="{{old('full_info')}}">
        @error('record')
            {{$message}}
        @enderror
    </div>
    @csrf
    <button>Add new place</button>
</form>
<div>
    <form action="/places/create" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit"> Загрузить фото</button>
    </form>
</div>
@endsection
