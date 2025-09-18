@extends('layouts.app')

@section('content')
    <h1>Nova Estação Meteorológica</h1>

    <form action="{{ route('weather-stations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome da Estação</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="number" step="any" class="form-control" id="latitude" name="latitude" required>
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="number" step="any" class="form-control" id="longitude" name="longitude" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('weather-stations.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
