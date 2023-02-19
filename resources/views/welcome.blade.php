@extends('layouts.main')

@section('title', 'NicEvents')

@section('content')

	
	<div id="search-container" class="col-md-12">
		<img class="my-4" src="/img/niceventslogo-removebg.png" alt="search-logo">
		<form action="/" method="GET">
			<div id="input-container">
				<ion-icon name="search-outline" class="search-icon"></ion-icon>
				<input type="text" id="search" name="search" placeholder="Buscar por eventos" class="form-control" >
			</div>
		</form>
	</div>
	<div id="events-container" class="col-md-12">
		@if ($search)
			<h2>Resultados da sua busca por: <span id="span-search">{{$search}}</span></h2>
			@if($similar === true && count($events) != 0)
				<p>Não foi possível encontrar nenhum evento correspondente a sua pesquisa. Veja alguns semelhantes:</p>
			@endif
		@else
			<h2>Próximos Eventos</h2>		
			<p class="subtitle">Veja os eventos dos próximos dias</p>
		@endif
		<div id="cards-container" class="d-flex row ">
			@foreach($events as $event)
			<div id="event-card" class="card col-md-3">
				<img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
				<div class="card-body">
					<p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
					<h5 class="card-title">{{$event->title}}</h5>
					<p class="card-participants">{{ count($event->users)}} participantes</p>
					<a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
				</div>
			</div>
			@endforeach
		</div>
		@if(count($events) == 0 && $search && $similar === false)
			<p>Não foi possível encontrar nenhum evento!</p>
			<a href="/">Ver todos os eventos</a>
		@elseif(count($events) == 0)
			<p>Não há eventos disponíveis</p>
			<img id="noevents-image" class="float-right" src="/img/no_events.svg" alt="no_events">
		@endif
	</div>
@endsection