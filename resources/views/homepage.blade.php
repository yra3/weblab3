@extends('pagetamplate')

@section('title', 'Homepage')

@section('toasts')
@include('toasts')
@endsection

@section('modals')
@foreach ($flowers as $flower)
	
@endforeach
<!-- Modal{{$flower->id}} -->
<div class="modal fade" id="exampleModal{{$flower->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$flower->id}}" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel1">{{$flower->name}}</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Нажми окей">
					<button class="btn btn-primary" type="button" disabled>{{$flower->helps}}</button>
				</span>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Окей</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="container">
	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
		@forelse ($flowers as $flower)
		<div class="col">
			<div class="card">
			<div class="object-tipe-text">
				<div class="tipe">
				{{$flower->type}}
				</div>
				<img class="card-img-top img-fluid"  src="storage\laravel\flower{{$flower->id}}.jpg">
			</div>
			<div>
				<h3>
				<a href="/{{ $flower->id }}">
					{{$flower->name}}
				</a>
					
				</h3>
				<p>
					{{$flower->description}}
				</p>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
					Подробнее
				</button>
			</div>
			</div>
		</div>
		@empty
			<h3>
				Нет ни одного цветка.
			</h3>
		@endforelse
		

	</div>
</div>
@endsection

@section('scripts')
@include('homepagescripts')
@endsection