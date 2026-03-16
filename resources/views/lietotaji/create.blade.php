{{-- resources/views/lietotaji/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Pievienot jaunu lietotāju</h1>

    @if ($errors->any())
        <div class="flash flash-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lietotaji.store') }}" method="POST" style="max-width:500px;">
        @csrf

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Vārds:</label>
            <input type="text" name="vards" value="{{ old('vards') }}" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Uzvārds:</label>
            <input type="text" name="uzvards" value="{{ old('uzvards') }}" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">E-pasts:</label>
            <input type="email" name="epasts" value="{{ old('epasts') }}" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Parole:</label>
            <input type="password" name="parole" style="width:90%; padding:10px; border-radius:6px;">
        </div>

        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Loma:</label>
            <select name="loma" style="width:90%; padding:10px; border-radius:6px;">
                <option value="">-- izvēlēties --</option>
                @if(auth()->user()->loma === 'Admin')
                    <option value="Admin" {{ old('loma')=='Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Darbinieks" {{ old('loma')=='Darbinieks' ? 'selected' : '' }}>Darbinieks</option>
                @endif
                <option value="Lietotajs" {{ old('loma')=='Lietotajs' ? 'selected' : '' }}>Lietotājs</option>
            </select>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn">Saglabāt</button>
            <a href="{{ route('lietotaji.index') }}" class="btn secondary">Atcelt</a>
        </div>
    </form>
@endsection
