{{-- resources/views/lietotaji/details.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Lietotāja detaļas</h1>

    <p><strong>ID:</strong> {{ $data->ID }}</p>
    <p><strong>Vārds:</strong> {{ $data->vards }}</p>
    <p><strong>E-pasts:</strong> {{ $data->epasts }}</p>
    <p><strong>Loma:</strong> {{ $data->loma }}</p>

    <div style="display:flex; gap:12px; margin-top:24px;">
        <a href="{{ route('lietotaji.edit', $data->ID) }}" class="btn">Rediģēt</a>
        <form action="{{ route('lietotaji.destroy', $data->ID) }}" method="POST" onsubmit="return confirm('Vai tiešām dzēst?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn secondary">Dzēst</button>
        </form>
        <a href="{{ route('lietotaji.index') }}" class="btn secondary">Atpakaļ</a>
    </div>
@endsection
