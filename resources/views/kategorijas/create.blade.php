{{-- resources/views/telpas/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Pievienot jaunu telpu</h1>

    @if ($errors->any())
        <div class="flash flash-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('telpas.store') }}" method="POST" style="max-width:500px;">
        @csrf

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Nosaukums:</label>
            <input type="text" name="nosaukums" value="{{ old('nosaukums') }}" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Ietilpība:</label>
            <input type="number" name="ietilpiba" value="{{ old('ietilpiba') }}" min="1" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn">Saglabāt</button>
            <a href="{{ route('telpas.index') }}" class="btn secondary">Atcelt</a>
        </div>
    </form>
@endsection
