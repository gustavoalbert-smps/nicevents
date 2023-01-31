@extends('layouts.main')

@section('title', 'NicEvents')

@section('content')

	{{-- <img src="/img/banner.webp" alt="banner"> --}}
	<div id="search-container" class="col-md-12">
		<h1>Busque um evento</h1>
		<form action="">
			<div id="input-container">
				<ion-icon name="search-outline" class="search-icon"></ion-icon>
				<input type="text" id="search" name="search" placeholder="Buscar" class="form-control" >
			</div>
		</form>
	</div>
	<div id="events-container" class="col-md-12">
		<h2>Próximos Eventos</h2>
		<p class="subtitle">Veja os eventos dos próximos dias</p>
		<div id="cards-container" class="d-flex justify-content-between row ">
			@foreach($events as $event)
			<div class="card col-md-3">
				<img src="/img/event_placeholder.jpg" alt="{{ $event->title }}">
				<div class="card-body">
					<p class="card-date">25/01/2023</p>
					<h5 class="card-title">{{$event->title}}</h5>
					<p class="card-participants">X participantes</p>
					<a href="#" class="btn btn-primary">Saber mais</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endsection