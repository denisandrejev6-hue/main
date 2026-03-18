{{-- resources/views/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div style="max-width:900px; margin:40px auto; padding:0 20px;">
        <h1 style="color:#333; font-size:32px; margin-bottom:32px; border-bottom:3px solid #4CAF50; padding-bottom:12px;">Pievienot jaunu pasākumu</h1>

        @if ($errors->any())
            <div style="background:#ffebee; border-left:5px solid #f44336; color:#c62828; padding:16px 20px; margin-bottom:30px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                <strong style="display:block; margin-bottom:8px; font-size:16px;">Lūdzu, izlabojiet šādas kļūdas:</strong>
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li style="margin:4px 0;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pasakumi.store') }}" method="POST" style="background:white; padding:32px; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,0.12);">
            @csrf
            
            <!-- Nosaukums un Kategorija -->
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                <div>
                    <label style="font-weight:600; display:block; margin-bottom:10px; color:#333; font-size:15px;">Nosaukums <span style="color:#f44336;">*</span></label>
                    <input type="text" name="nosaukums" value="{{ old('nosaukums') }}" placeholder="Ievadiet pasākuma nosaukumu" 
                        style="width:100%; padding:14px 16px; border:2px solid {{ $errors->has('nosaukums') ? '#f44336' : '#e0e0e0' }}; border-radius:10px; font-size:15px; transition:all 0.3s; background:{{ $errors->has('nosaukums') ? '#fff8f8' : '#fafafa' }};"
                        onfocus="this.style.borderColor='#4CAF50'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(76,175,80,0.1)'" 
                        onblur="this.style.borderColor='{{ $errors->has('nosaukums') ? '#f44336' : '#e0e0e0' }}'; this.style.background='{{ $errors->has('nosaukums') ? '#fff8f8' : '#fafafa' }}'; this.style.boxShadow='none'">
                    @if($errors->has('nosaukums'))
                        <small style="color: #f44336; margin-top: 6px; display: block; font-size:13px; font-weight:500;">⚠️ {{ $errors->first('nosaukums') }}</small>
                    @endif
                </div>
                <div>
                    <label style="font-weight:600; display:block; margin-bottom:10px; color:#333; font-size:15px;">Kategorija <span style="color:#f44336;">*</span></label>
                    <input type="text" name="kategorija" value="{{ old('kategorija') }}" placeholder="Ievadiet kategoriju" 
                        style="width:100%; padding:14px 16px; border:2px solid {{ $errors->has('kategorija') ? '#f44336' : '#e0e0e0' }}; border-radius:10px; font-size:15px; transition:all 0.3s; background:{{ $errors->has('kategorija') ? '#fff8f8' : '#fafafa' }};"
                        onfocus="this.style.borderColor='#4CAF50'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(76,175,80,0.1)'" 
                        onblur="this.style.borderColor='{{ $errors->has('kategorija') ? '#f44336' : '#e0e0e0' }}'; this.style.background='{{ $errors->has('kategorija') ? '#fff8f8' : '#fafafa' }}'; this.style.boxShadow='none'">
                    @if($errors->has('kategorija'))
                        <small style="color: #f44336; margin-top: 6px; display: block; font-size:13px; font-weight:500;">⚠️ {{ $errors->first('kategorija') }}</small>
                    @endif
                </div>
            </div>

            <!-- Datumi - FIXED VERSION -->
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                <div style="position:relative;">
                    <label style="font-weight:600; display:block; margin-bottom:10px; color:#333; font-size:15px;">Datums no <span style="color:#f44336;">*</span></label>
                    <input type="date" name="datums_no" value="{{ old('datums_no') }}" 
                        style="width:100%; padding:14px 16px; border:2px solid {{ $errors->has('datums_no') ? '#f44336' : '#e0e0e0' }}; border-radius:10px; font-size:15px; transition:all 0.3s; background:{{ $errors->has('datums_no') ? '#fff8f8' : '#fafafa' }}; color:#333; position:relative; z-index:1;"
                        onfocus="this.style.borderColor='#4CAF50'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(76,175,80,0.1)'" 
                        onblur="this.style.borderColor='{{ $errors->has('datums_no') ? '#f44336' : '#e0e0e0' }}'; this.style.background='{{ $errors->has('datums_no') ? '#fff8f8' : '#fafafa' }}'; this.style.boxShadow='none'">
                    @if($errors->has('datums_no'))
                        <small style="color: #f44336; margin-top: 6px; display: block; font-size:13px; font-weight:500;">⚠️ {{ $errors->first('datums_no') }}</small>
                    @endif
                </div>
                <div style="position:relative;">
                    <label style="font-weight:600; display:block; margin-bottom:10px; color:#333; font-size:15px;">Datums līdz <span style="color:#f44336;">*</span></label>
                    <input type="date" name="datums_lidz" value="{{ old('datums_lidz') }}" 
                        style="width:100%; padding:14px 16px; border:2px solid {{ $errors->has('datums_lidz') ? '#f44336' : '#e0e0e0' }}; border-radius:10px; font-size:15px; transition:all 0.3s; background:{{ $errors->has('datums_lidz') ? '#fff8f8' : '#fafafa' }}; color:#333; position:relative; z-index:1;"
                        onfocus="this.style.borderColor='#4CAF50'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(76,175,80,0.1)'" 
                        onblur="this.style.borderColor='{{ $errors->has('datums_lidz') ? '#f44336' : '#e0e0e0' }}'; this.style.background='{{ $errors->has('datums_lidz') ? '#fff8f8' : '#fafafa' }}'; this.style.boxShadow='none'">
                    @if($errors->has('datums_lidz'))
                        <small style="color: #f44336; margin-top: 6px; display: block; font-size:13px; font-weight:500;">⚠️ {{ $errors->first('datums_lidz') }}</small>
                    @endif
                </div>
            </div>

            <!-- Laiki -->
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                <div>
                    <label style="font-weight:600; display:block; margin-bottom:10px; color:#333; font-size:15px;">Sākuma laiks <span style="color:#f44336;">*</span></label>
                    <select name="sakuma_laiks" id="sakuma_laiks" 
                        style="width:100%; padding:14px 16px; border:2px solid {{ $errors->has('sakuma_laiks') ? '#f44336' : '#e0e0e0' }}; border-radius:10px; font-size:15px; transition:all 0.3s; background:{{ $errors->has('sakuma_laiks') ? '#fff8f8' : '#fafafa' }}; cursor:pointer;"
                        onfocus="this.style.borderColor='#4CAF50'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(76,175,80,0.1)'" 
                        onblur="this.style.borderColor='{{ $errors->has('sakuma_laiks') ? '#f44336' : '#e0e0e0' }}'; this.style.background='{{ $errors->has('sakuma_laiks') ? '#fff8f8' : '#fafafa' }}'; this.style.boxShadow='none'"
                        onchange="validateTimeRange()">
                        <option value="" style="color:#999;">-- Izvēlieties sākuma laiku --</option>
                        @php
                            $start = strtotime('00:00');
                            $end = strtotime('23:30');
                            for ($i = $start; $i <= $end; $i += 1800) {
                                $time = date('H:i', $i);
                                $selected = old('sakuma_laiks') == $time ? 'selected' : '';
                                echo "<option value=\"$time\" $selected style=\"padding:8px;\">$time</option>";
                            }
                        @endphp
                    </select>
                    @if($errors->has('sakuma_laiks'))
                        <small style="color: #f44336; margin-top: 6px; display: block; font-size:13px; font-weight:500;">⚠️ {{ $errors->first('sakuma_laiks') }}</small>
                    @endif
                    <small style="color: #f44336; margin-top: 8px; display: none; font-size:13px; font-weight:500;" id="start_error">❌ Sākuma laiks nedrīkst būt pēc beigu laika</small>
                </div>
                <div>
                    <label style="font-weight:600; display:block; margin-bottom:10px; color:#333; font-size:15px;">Beigu laiks <span style="color:#f44336;">*</span></label>
                    <select name="beigu_laiks" id="beigu_laiks" 
                        style="width:100%; padding:14px 16px; border:2px solid {{ $errors->has('beigu_laiks') ? '#f44336' : '#e0e0e0' }}; border-radius:10px; font-size:15px; transition:all 0.3s; background:{{ $errors->has('beigu_laiks') ? '#fff8f8' : '#fafafa' }}; cursor:pointer;"
                        onfocus="this.style.borderColor='#4CAF50'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(76,175,80,0.1)'" 
                        onblur="this.style.borderColor='{{ $errors->has('beigu_laiks') ? '#f44336' : '#e0e0e0' }}'; this.style.background='{{ $errors->has('beigu_laiks') ? '#fff8f8' : '#fafafa' }}'; this.style.boxShadow='none'"
                        onchange="validateTimeRange()">
                        <option value="" style="color:#999;">-- Izvēlieties beigu laiku --</option>
                        @php
                            for ($i = $start; $i <= $end; $i += 1800) {
                                $time = date('H:i', $i);
                                $selected = old('beigu_laiks') == $time ? 'selected' : '';
                                echo "<option value=\"$time\" $selected style=\"padding:8px;\">$time</option>";
                            }
                        @endphp
                    </select>
                    @if($errors->has('beigu_laiks'))
                        <small style="color: #f44336; margin-top: 6px; display: block; font-size:13px; font-weight:500;">⚠️ {{ $errors->first('beigu_laiks') }}</small>
                    @endif
                    <small style="color: #f44336; margin-top: 8px; display: none; font-size:13px; font-weight:500;" id="end_error">❌ Beigu laiks nedrīkst būt pirms sākuma laika</small>
                </div>
            </div>
            
            <!-- Apraksts -->
            <div style="margin-bottom:24px;">
                <label style="font-weight:600; display:block; margin-bottom:10px; color:#333; font-size:15px;">Apraksts</label>
                <textarea name="apraksts" placeholder="Ievadiet pasākuma aprakstu..." 
                    style="width:100%; padding:14px 16px; border:2px solid {{ $errors->has('apraksts') ? '#f44336' : '#e0e0e0' }}; border-radius:10px; min-height:120px; font-size:15px; transition:all 0.3s; background:{{ $errors->has('apraksts') ? '#fff8f8' : '#fafafa' }}; font-family:inherit; resize:vertical;"
                    onfocus="this.style.borderColor='#4CAF50'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(76,175,80,0.1)'" 
                    onblur="this.style.borderColor='{{ $errors->has('apraksts') ? '#f44336' : '#e0e0e0' }}'; this.style.background='{{ $errors->has('apraksts') ? '#fff8f8' : '#fafafa' }}'; this.style.boxShadow='none'">{{ old('apraksts') }}</textarea>
                @if($errors->has('apraksts'))
                    <small style="color: #f44336; margin-top: 6px; display: block; font-size:13px; font-weight:500;">⚠️ {{ $errors->first('apraksts') }}</small>
                @endif
            </div>
            
            <!-- Darbinieks un Telpa -->
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:32px;">
                <div>
                    <label style="font-weight:600; display:block; margin-bottom:10px; color:#333; font-size:15px;">Darbinieks <span style="color:#f44336;">*</span></label>
                    <select name="darbinieks_id" 
                        style="width:100%; padding:14px 16px; border:2px solid {{ $errors->has('darbinieks_id') ? '#f44336' : '#e0e0e0' }}; border-radius:10px; font-size:15px; transition:all 0.3s; background:{{ $errors->has('darbinieks_id') ? '#fff8f8' : '#fafafa' }}; cursor:pointer;"
                        onfocus="this.style.borderColor='#4CAF50'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(76,175,80,0.1)'" 
                        onblur="this.style.borderColor='{{ $errors->has('darbinieks_id') ? '#f44336' : '#e0e0e0' }}'; this.style.background='{{ $errors->has('darbinieks_id') ? '#fff8f8' : '#fafafa' }}'; this.style.boxShadow='none'">
                        <option value="" style="color:#999;">-- Izvēlieties darbinieku --</option>
                        @foreach($darbinieki as $d)
                            <option value="{{ $d->ID }}" {{ old('darbinieks_id') == $d->ID ? 'selected' : '' }} style="padding:8px;">{{ $d->vards }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('darbinieks_id'))
                        <small style="color: #f44336; margin-top: 6px; display: block; font-size:13px; font-weight:500;">⚠️ {{ $errors->first('darbinieks_id') }}</small>
                    @endif
                </div>
                <div>
                    <label style="font-weight:600; display:block; margin-bottom:10px; color:#333; font-size:15px;">Telpa <span style="color:#f44336;">*</span></label>
                    <select name="telpa_id" 
                        style="width:100%; padding:14px 16px; border:2px solid {{ $errors->has('telpa_id') ? '#f44336' : '#e0e0e0' }}; border-radius:10px; font-size:15px; transition:all 0.3s; background:{{ $errors->has('telpa_id') ? '#fff8f8' : '#fafafa' }}; cursor:pointer;"
                        onfocus="this.style.borderColor='#4CAF50'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(76,175,80,0.1)'" 
                        onblur="this.style.borderColor='{{ $errors->has('telpa_id') ? '#f44336' : '#e0e0e0' }}'; this.style.background='{{ $errors->has('telpa_id') ? '#fff8f8' : '#fafafa' }}'; this.style.boxShadow='none'">
                        <option value="" style="color:#999;">-- Izvēlieties telpu --</option>
                        @foreach($telpas as $t)
                            <option value="{{ $t->ID }}" {{ old('telpa_id') == $t->ID ? 'selected' : '' }} style="padding:8px;">{{ $t->nosaukums }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('telpa_id'))
                        <small style="color: #f44336; margin-top: 6px; display: block; font-size:13px; font-weight:500;">⚠️ {{ $errors->first('telpa_id') }}</small>
                    @endif
                </div>
            </div>
            
            <!-- Pogas -->
            <div style="display:flex; gap:16px; justify-content:flex-end; border-top:2px solid #f0f0f0; padding-top:24px;">
                <a href="{{ url()->previous() }}" style="background:#9e9e9e; color:white; padding:14px 32px; border-radius:50px; text-decoration:none; font-weight:600; font-size:16px; transition:all 0.3s; box-shadow:0 2px 8px rgba(0,0,0,0.1); display:inline-block;" onmouseover="this.style.background='#757575'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.15)'" onmouseout="this.style.background='#9e9e9e'; this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'">Atcelt</a>
                <button type="submit" style="background:linear-gradient(135deg, #4CAF50, #45a049); color:white; padding:14px 40px; border:none; border-radius:50px; cursor:pointer; font-weight:600; font-size:16px; transition:all 0.3s; box-shadow:0 2px 8px rgba(76,175,80,0.3);" onmouseover="this.style.background='linear-gradient(135deg, #45a049, #3d8b40)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(76,175,80,0.4)'" onmouseout="this.style.background='linear-gradient(135deg, #4CAF50, #45a049)'; this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(76,175,80,0.3)'">➕ Saglabāt pasākumu</button>
            </div>
        </form>
    </div>

    <script>
        function validateTimeRange() {
            const startSelect = document.getElementById('sakuma_laiks');
            const endSelect = document.getElementById('beigu_laiks');
            const startError = document.getElementById('start_error');
            const endError = document.getElementById('end_error');

            // Reset styles
            startSelect.style.borderColor = '#e0e0e0';
            endSelect.style.borderColor = '#e0e0e0';
            startError.style.display = 'none';
            endError.style.display = 'none';

            if (startSelect.value && endSelect.value) {
                if (startSelect.value > endSelect.value) {
                    startError.style.display = 'block';
                    endError.style.display = 'block';
                    startSelect.style.borderColor = '#f44336';
                    endSelect.style.borderColor = '#f44336';
                    
                    // Add shake animation
                    startSelect.style.animation = 'shake 0.3s';
                    endSelect.style.animation = 'shake 0.3s';
                    
                    setTimeout(() => {
                        startSelect.style.animation = '';
                        endSelect.style.animation = '';
                    }, 300);
                }
            }
        }

        window.onload = function() {
            validateTimeRange();
        };
    </script>

    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-2px); }
            20%, 40%, 60%, 80% { transform: translateX(2px); }
        }
        
        /* FIXED: Noņemam pozicionēšanu no date input */
        input[type="date"] {
            position: relative;
            z-index: 1;
        }
        
        select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
        }
        
        *:focus {
            outline: none;
        }
    </style>
@endsection