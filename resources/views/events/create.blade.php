@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Crie o seu evento</h1>
  <form action="/events" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Banner do Evento:</label>
      <input id="image" type="file" class="form-control-file" name="image">
    </div>
    <div class="form-group">
      <label for="title">Evento:</label>
      <input id="title" type="text" class="form-control" name="title" placeholder="Nome do evento">
    </div>
    <div class="form-group">
      <label for="date">Data do Evento:</label>
      <input type="date" id="date" class="form-control" name="date">
    </div>
    <div class="form-group">
      <label for="city">Cidade:</label>
      <input id="city" type="text" class="form-control" name="city" placeholder="Local do evento">
    </div>
    <div class="form-group">
      <label for="description">Descrição:</label>
      <textarea id="description" name="description" class="form-control" placeholder="Fale mais sobre o seu evento"></textarea>
    </div>
    <div class="form-group">
      <label for="private">O evento é privado ?</label>
      <select id="private" name="private" class="form-control">
        <option value="0">Não</option>
        <option value="1">Sim</option>
      </select>
    </div>
    <div class="form-group" id="checklist-container">
      <label for="">No seu evento irá ter ?</label>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Palco"> Palco
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Open Drink"> Open Drink
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Open Food"> Open Food
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Brindes"> Brindes
      </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Cadastrar Evento">
  </form>
</div>

@endsection