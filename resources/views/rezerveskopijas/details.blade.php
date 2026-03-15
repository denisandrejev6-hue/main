{{-- resources/views/rezerveskopijas/details.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Rezerves kopijas detaļas</h1>

    <p><strong>ID:</strong> {{ $data->ID }}</p>
    <p><strong>Fails:</strong> {{ $data->fails }}</p>
    <p><strong>Izveides datums:</strong> {{ $data->izveides_datums }}</p>

    <div style="display:flex; gap:12px; margin-top:24px;">
        <a href="{{ route('rezerveskopijas.edit', $data->ID) }}" class="btn">Rediģēt</a>
        <form action="{{ route('rezerveskopijas.destroy', $data->ID) }}" method="POST" onsubmit="return confirm('Vai tiešām dzēst?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn secondary">Dzēst</button>
        </form>
        <a href="{{ route('rezerveskopijas.index') }}" class="btn secondary">Atpakaļ</a>
    </div>
@endsection
