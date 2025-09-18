@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h1>Estações Meteorológicas</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('weather-stations.create') }}" class="btn btn-primary">
                Nova Estação
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stations as $station)
                <tr>
                    <td>{{ $station->id }}</td>
                    <td>{{ $station->name }}</td>
                    <td>{{ $station->latitude }}</td>
                    <td>{{ $station->longitude }}</td>
                    <td>
                        <a href="{{ route('weather-stations.show', $station->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('weather-stations.edit', $station->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('weather-stations.destroy', $station->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
