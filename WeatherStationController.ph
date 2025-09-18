<?php

namespace App\Http\Controllers;

use App\Models\WeatherStation;
use Illuminate\Http\Request;

class WeatherStationController extends Controller
{
    public function index()
    {
        $stations = WeatherStation::all();
        return view('weather-stations.index', compact('stations'));
    }

    public function create()
    {
        return view('weather-stations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180'
        ]);

        WeatherStation::create($request->all());

        return redirect()->route('weather-stations.index')
            ->with('success', 'Estação meteorológica criada com sucesso!');
    }

    public function show(WeatherStation $weatherStation)
    {
        return view('weather-stations.show', compact('weatherStation'));
    }

    public function edit(WeatherStation $weatherStation)
    {
        return view('weather-stations.edit', compact('weatherStation'));
    }

    public function update(Request $request, WeatherStation $weatherStation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180'
        ]);

        $weatherStation->update($request->all());

        return redirect()->route('weather-stations.index')
            ->with('success', 'Estação meteorológica atualizada com sucesso!');
    }

    public function destroy(WeatherStation $weatherStation)
    {
        $weatherStation->delete();

        return redirect()->route('weather-stations.index')
            ->with('success', 'Estação meteorológica excluída com sucesso!');
    }
}
