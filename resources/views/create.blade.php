{{-- resources/views/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Pievienot jaunu ierakstu</h1>

    @if ($errors->any())
        <div class="flash flash-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasakumi.store') }}" method="POST" style="max-width:800px;">
        @csrf
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Nosaukums:</label>
                <input type="text" name="nosaukums" value="{{ old('nosaukums') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Kategorija:</label>
                <input type="text" name="kategorija" value="{{ old('kategorija') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-bottom:16px;">
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Datums:</label>
                <input type="date" name="datums" value="{{ old('datums') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Sākuma laiks:</label>
                <input type="time" name="sakuma_laiks" id="sakuma_laiks" value="{{ old('sakuma_laiks') }}" style="width:90%; padding:10px; border-radius:6px;" onchange="validateTimeRange()">
                <small style="color: #ffcdd8; margin-top: 4px; display: none;" id="start_error">Sākuma laiks nedrīkst būt pēc beigu laika</small>
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Beigu laiks:</label>
                <input type="time" name="beigu_laiks" id="beigu_laiks" value="{{ old('beigu_laiks') }}" style="width:90%; padding:10px; border-radius:6px;" onchange="validateTimeRange()">
                <small style="color: #ffcdd8; margin-top: 4px; display: none;" id="end_error">Beigu laiks nedrīkst būt pirms sākuma laika</small>
            </div>
        </div>
        
        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Apraksts:</label>
            <textarea name="apraksts" style="width:100%; padding:10px; border-radius:6px; min-height:80px;">{{ old('apraksts') }}</textarea>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:24px;">
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Darbinieks:</label>
                <select name="darbinieks_id" style="width:90%; padding:10px; border-radius:6px;">
                    <option value="">-- izvēlieties darbinieku --</option>
                    @foreach($darbinieki as $d)
                        <option value="{{ $d->ID }}" {{ old('darbinieks_id') == $d->ID ? 'selected' : '' }}>{{ $d->vards }} ({{ $d->ID }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Telpa:</label>
                <select name="telpa_id" style="width:90%; padding:10px; border-radius:6px;">
                    <option value="">-- izvēlieties telpu --</option>
                    @foreach($telpas as $t)
                        <option value="{{ $t->ID }}" {{ old('telpa_id') == $t->ID ? 'selected' : '' }}>{{ $t->nosaukums }} ({{ $t->ID }})</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn">Saglabāt</button>
            <a href="{{ url()->previous() }}" class="btn secondary">Atcelt</a>
        </div>
    </form>

    <script>
        function validateTimeRange() {
            const startInput = document.getElementById('sakuma_laiks');
            const endInput = document.getElementById('beigu_laiks');
            const startError = document.getElementById('start_error');
            const endError = document.getElementById('end_error');

            // Reset styles
            startInput.style.borderColor = '';
            endInput.style.borderColor = '';
            startError.style.display = 'none';
            endError.style.display = 'none';

            if (startInput.value && endInput.value) {
                if (startInput.value > endInput.value) {
                    // Start time is after end time
                    startError.style.display = 'block';
                    endError.style.display = 'block';
                    startInput.style.borderColor = '#ff4d7d';
                    endInput.style.borderColor = '#ff4d7d';
                }
            }
        }
    </script>
@endsection
