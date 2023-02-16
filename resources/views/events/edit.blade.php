@extends('layouts.main')

@section('title', 'Editando evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Editando: {{ $event->title }}</h1>
  <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div id="banner-group" class="form-group">
      <label for="image">Banner do Evento:</label>
      <table>
        <thead>
          <tr>
            <th scope="col">Nova Imagem</th>
            <th></th>
            <th scope="col">Imagem Atual</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td id="image"><input id="image" type="file" class="form-control-file" name="image"></td>
            <td class="arrows">
              <ion-icon name="arrow-forward-outline"></ion-icon>
              <ion-icon name="arrow-back-outline"></ion-icon>
            </td>
            <td id="image">
              <div class="image-preview-container">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview image-fluid">
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="form-group">
      <label for="title">Evento:</label>
      <input id="title" type="text" class="form-control" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
    </div>
    <div class="form-group">
      <label for="date">Data do Evento:</label>
      <input type="date" id="date" class="form-control" name="date" value="{{ $event->date->format('Y-m-d') }}">
    </div>
    <div class="form-group">
      <label for="city">Cidade:</label>
      <input id="city" type="text" class="form-control" name="city" placeholder="Local do evento" value="{{ $event->city }}">
    </div>
    <div class="form-group">
      <label for="description">Descrição:</label>
      <textarea id="description" name="description" class="form-control" placeholder="Fale mais sobre o seu evento">{{ $event->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="private">O evento é privado ?</label>
      <select id="private" name="private" class="form-control">
        <option value="0">Não</option>
        <option value="1" {{ $event->private == 1 ? "selected = 'selected'": "" }}>Sim</option>
      </select>
    </div>
    <div class="form-group">
      <label for="category">Qual o tipo de evento ?</label>
      <select id="category" name="category" class="form-control">
        <option value="{{ $event->category }}" selected>{{ $event->category }}</option>
        <option value="Evento Social">Evento Social</option>
        <option value="Evento de Tecnologia">Evento de Tecnologia</option>
        <option value="Evento Corporativo">Evento Corporativo</option>
        <option value="Evento Religioso">Evento Religioso</option>
        <option value="Evento Educacional">Evento Educacional</option>
        <option value="Evento de Entretenimento e Lazer">Evento de Entretenimento e Lazer</option>
        <option value="Evento Esportivo">Evento Esportivo</option>
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
    <input type="submit" class="btn btn-success" value="Salvar Alterações">
  </form>
</div>

@endsection