{{-- resources/views/rezerveskopijas/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Rediģēt rezerves kopiju</h1>

    @if ($errors->any())
        <div class="flash flash-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rezerveskopijas.update', $data->ID) }}" method="POST" style="max-width:500px;">
        @csrf
        @method('PUT')

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Fails:</label>
            <input type="text" name="fails" value="{{ old('fails', $data->fails) }}" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Izveides datums:</label>
            <input type="date" name="izveides_datums" value="{{ old('izveides_datums', $data->izveides_datums) }}" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn">Saglabāt</button>
            <a href="{{ route('rezerveskopijas.index') }}" class="btn secondary">Atcelt</a>
        </div>
    </form>
@endsection
