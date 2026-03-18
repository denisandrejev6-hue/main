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
                <input type="text" name="nosaukums" value="{{ old('nosaukums') }}" style="width:90%; padding:10px; border-radius:6px; border:1px solid #ddd;">
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Kategorija:</label>
                <input type="text" name="kategorija" value="{{ old('kategorija') }}" style="width:90%; padding:10px; border-radius:6px; border:1px solid #ddd;">
            </div>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 2fr; gap:16px; margin-bottom:16px;">
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Datums no:</label>
                <input type="date" name="datums_no" value="{{ old('datums_no') }}" style="width:90%; padding:10px; border-radius:6px; border:1px solid #ddd;">
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Datums līdz:</label>
                <input type="date" name="datums_lidz" value="{{ old('datums_lidz') }}" style="width:90%; padding:10px; border-radius:6px; border:1px solid #ddd;">
            </div>
        </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                <!-- {{-- Sākuma laiks --}} -->
                <div class="form-control">
                    <label style="font-weight:700; display:block; margin-bottom:8px;">Sākuma laiks:</label>
                    <div style="display:flex; gap:8px; align-items:center;">
                        <select name="sakuma_stunda" id="sakuma_stunda" style="flex:1; padding:10px; border-radius:6px; border:1px solid #ddd; background:white;" onchange="validateTimeRange()">
                            <option value="">Stunda</option>
                            @for($h = 0; $h <= 23; $h++)
                                @php
                                    $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
                                    $selected = (old('sakuma_stunda') == $hour) ? 'selected' : '';
                                @endphp
                                <option value="{{ $hour }}" {{ $selected }}>{{ $hour }}</option>
                            @endfor
                        </select>
                        
                        <span style="font-size:20px; font-weight:bold;">:</span>
                        
                        <select name="sakuma_minute" id="sakuma_minute" style="flex:1; padding:10px; border-radius:6px; border:1px solid #ddd; background:white;" onchange="validateTimeRange()">
                            <option value="">Minūte</option>
                            <option value="00" {{ old('sakuma_minute') == '00' ? 'selected' : '' }}>00</option>
                            <option value="30" {{ old('sakuma_minute') == '30' ? 'selected' : '' }}>30</option>
                        </select>
                    </div>
                    <small style="color: #ff4d7d; margin-top: 4px; display: none; font-size:12px;" id="start_error">Sākuma laiks nav korekts</small>
                </div>
                
                <!-- {{-- Beigu laiks --}} -->
                <div class="form-control">
                    <label style="font-weight:700; display:block; margin-bottom:8px;">Beigu laiks:</label>
                    <div style="display:flex; gap:8px; align-items:center;">
                        <select name="beigu_stunda" id="beigu_stunda" style="flex:1; padding:10px; border-radius:6px; border:1px solid #ddd; background:white;" onchange="validateTimeRange()">
                            <option value="">Stunda</option>
                            @for($h = 0; $h <= 23; $h++)
                                @php
                                    $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
                                    $selected = (old('beigu_stunda') == $hour) ? 'selected' : '';
                                @endphp
                                <option value="{{ $hour }}" {{ $selected }}>{{ $hour }}</option>
                            @endfor
                        </select>
                        
                        <span style="font-size:20px; font-weight:bold;">:</span>
                        
                        <select name="beigu_minute" id="beigu_minute" style="flex:1; padding:10px; border-radius:6px; border:1px solid #ddd; background:white;" onchange="validateTimeRange()">
                            <option value="">Minūte</option>
                            <option value="00" {{ old('beigu_minute') == '00' ? 'selected' : '' }}>00</option>
                            <option value="30" {{ old('beigu_minute') == '30' ? 'selected' : '' }}>30</option>
                        </select>
                    </div>
                    <small style="color: #ff4d7d; margin-top: 4px; display: none; font-size:12px;" id="end_error">Beigu laiks nav korekts</small>
                </div>
            </div>
        </div>
        
        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Apraksts:</label>
            <textarea name="apraksts" style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd; min-height:80px;">{{ old('apraksts') }}</textarea>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:24px;">
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Darbinieks:</label>
                <select name="darbinieks_id" style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd; background:white;">
                    <option value="">-- izvēlieties darbinieku --</option>
                    @foreach($darbinieki as $d)
                        <option value="{{ $d->ID }}" {{ old('darbinieks_id') == $d->ID ? 'selected' : '' }}>{{ $d->vards }} ({{ $d->ID }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Telpa:</label>
                <select name="telpa_id" style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd; background:white;">
                    <option value="">-- izvēlieties telpu --</option>
                    @foreach($telpas as $t)
                        <option value="{{ $t->ID }}" {{ old('telpa_id') == $t->ID ? 'selected' : '' }}>{{ $t->nosaukums }} ({{ $t->ID }})</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn" style="background:#4CAF50; color:white; padding:12px 24px; border:none; border-radius:6px; cursor:pointer; font-weight:600;">Saglabāt</button>
            <a href="{{ url()->previous() }}" class="btn secondary" style="background:#f44336; color:white; padding:12px 24px; border-radius:6px; text-decoration:none; font-weight:600;">Atcelt</a>
        </div>
    </form>

    <script>
        function validateTimeRange() {
            const sakumaStunda = document.getElementById('sakuma_stunda').value;
            const sakumaMinute = document.getElementById('sakuma_minute').value;
            const beiguStunda = document.getElementById('beigu_stunda').value;
            const beiguMinute = document.getElementById('beigu_minute').value;
            
            const startError = document.getElementById('start_error');
            const endError = document.getElementById('end_error');
            
            const sakumaSelects = [document.getElementById('sakuma_stunda'), document.getElementById('sakuma_minute')];
            const beiguSelects = [document.getElementById('beigu_stunda'), document.getElementById('beigu_minute')];

            // Reset styles
            sakumaSelects.forEach(el => el.style.borderColor = '#ddd');
            beiguSelects.forEach(el => el.style.borderColor = '#ddd');
            startError.style.display = 'none';
            endError.style.display = 'none';

            // Pārbauda vai visi lauki ir aizpildīti
            if (sakumaStunda && sakumaMinute && beiguStunda && beiguMinute) {
                const startTime = sakumaStunda + ':' + sakumaMinute;
                const endTime = beiguStunda + ':' + beiguMinute;
                
                if (startTime > endTime) {
                    // Sākuma laiks ir pēc beigu laika
                    startError.style.display = 'block';
                    endError.style.display = 'block';
                    sakumaSelects.forEach(el => el.style.borderColor = '#ff4d7d');
                    beiguSelects.forEach(el => el.style.borderColor = '#ff4d7d');
                }
            } else {
                // Ja kāds lauks nav aizpildīts, bet citi ir
                if ((sakumaStunda || sakumaMinute) && !(sakumaStunda && sakumaMinute)) {
                    sakumaSelects.forEach(el => el.style.borderColor = '#ff4d7d');
                    startError.style.display = 'block';
                    startError.textContent = 'Izvēlieties gan stundu, gan minūti';
                }
                if ((beiguStunda || beiguMinute) && !(beiguStunda && beiguMinute)) {
                    beiguSelects.forEach(el => el.style.borderColor = '#ff4d7d');
                    endError.style.display = 'block';
                    endError.textContent = 'Izvēlieties gan stundu, gan minūti';
                }
            }
        }

        // Palaist validāciju lapas ielādes brīdī
        window.onload = function() {
            validateTimeRange();
        };
    </script>

    <style>
        select:hover {
            border-color: #999 !important;
        }
        select:focus {
            outline: none;
            border-color: #4CAF50 !important;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            transition: all 0.2s;
        }
    </style>
@endsection