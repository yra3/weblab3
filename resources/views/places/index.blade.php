@extends('pagetamplate')

@section('title', 'Любимые места')

@section('toasts')
@include('toasts')
@endsection

@section('modals')
@foreach ($places as $place)

<!-- Modal{{$place->id}} -->
<div class="modal fade" id="exampleModal{{$place->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$place->id}}" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel1">{{$place->name}}</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Нажми окей">
					<button class="btn btn-primary" type="button" disabled>{{$place->helps}}</button>
				</span>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Окей</button>
			</div>
		</div>
	</div>
</div>

@endforeach
@endsection

@section('content')

@if($user_id == null)
    <h5 style="margin-left: 120px">
        <a href="/register">Зарегистрироватся</a>
        <a href="/login">Войти</a>
    </h5>
@else
<h3 style="margin-left: 120px">
	<a href="/places/create">Add new place!</a>
</h3>
@endif

<div class="container">
	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
		@forelse ($places as $place)
		<div class="col">
			<div class="card">
			<div class="object-tipe-text">
				<div class="tipe">
				{{$place->type}}
				</div>
				<img class="card-img-top img-fluid"  src="http://127.0.0.1:8000/storage/{{ $place->photo_name }}">
			</div>
			<div>
				<h3>
				<a href="/places/{{ $place->id }}">
					{{$place->name}}
				</a>

				</h3>
				<p>
					{{$place->short_info}}
				</p>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
					Подробнее
				</button>
			</div>
			</div>
		</div>
		@empty
			<h3>
				Нет ни одного места.
			</h3>
		@endforelse


	</div>
</div>
@endsection

@section('scripts')
@include('homepagescripts')
@endsection
