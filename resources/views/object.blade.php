@extends('pagetamplate')

@section('title')
{{ $name }}
@endsection

@section('content')
        <img src="{{$photo_name}}" alt="">
    <p>
        {{ $description }}
    </p>
    <p>Тип: {{ $type }}</p>
@endsection