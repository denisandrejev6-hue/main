{{-- resources/views/telpas/details.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Telpas detaļas</h1>

    <p><strong>ID:</strong> {{ $data->ID }}</p>
    <p><strong>Nosaukums:</strong> {{ $data->nosaukums }}</p>
    <p><strong>Ietilpība:</strong> {{ $data->ietilpiba }}</p>

    <div style="display:flex; gap:12px; margin-top:24px;">
        <a href="{{ route('telpas.edit', $data->ID) }}" class="btn">Rediģēt</a>
        <form action="{{ route('telpas.destroy', $data->ID) }}" method="POST" onsubmit="return confirm('Vai tiešām dzēst?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn secondary">Dzēst</button>
        </form>
        <a href="{{ route('telpas.index') }}" class="btn secondary">Atpakaļ</a>
    </div>
@endsection
