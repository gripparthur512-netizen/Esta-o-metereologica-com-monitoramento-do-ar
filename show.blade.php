@extends('layouts.app')

@section('content')
    <h1>Detalhes da Estação Meteorológica</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $weatherStation->name }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $weatherStation->id }}</p>
            <p class="card-text"><strong>Latitude:</strong> {{ $weatherStation->latitude }}</p>
            <p class="card-text"><strong>Longitude:</strong> {{ $weatherStation->longitude }}</p>
            <p class="card-text"><strong>Criada em:</strong> {{ $weatherStation->created_at->format('d/m/Y H:i') }}</p>
            <p class="card-text"><strong>Atualizada em:</strong> {{ $weatherStation->updated_at->format('d/m/Y H:i') }}</p>
            
            <div class="mt-3">
                <a href="{{ route('weather-stations.edit', $weatherStation->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('weather-stations.destroy', $weatherStation->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
                <a href="{{ route('weather-stations.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
