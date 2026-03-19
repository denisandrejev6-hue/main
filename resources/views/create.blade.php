{{-- resources/views/create.blade.php --}}
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">

<div class="pasakumi-container">
        <h1 class="page-title">Pievienot jaunu pasākumu</h1>

        @if ($errors->any())
            <div class="error-block">
                <strong>Lūdzu, izlabojiet šādas kļūdas:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pasakumi.store') }}" method="POST" class="pasakumi-form">
            @csrf

            <!-- Nosaukums un Kategorija -->
            <div class="form-row">
                <div class="form-group">
                    <label>Nosaukums <span class="required-star">*</span></label>
                    <input type="text" name="nosaukums" value="{{ old('nosaukums') }}" placeholder="Ievadiet pasākuma nosaukumu"
                        class="form-control @error('nosaukums') is-invalid @enderror">
                    @error('nosaukums')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kategorija <span class="required-star">*</span></label>
                    <input type="text" name="kategorija" value="{{ old('kategorija') }}" placeholder="Ievadiet kategoriju"
                        class="form-control @error('kategorija') is-invalid @enderror">
                    @error('kategorija')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Datumi -->
            <div class="form-row">
                <div class="form-group">
                    <label>Datums no <span class="required-star">*</span></label>
                    <input type="date" name="datums_no" value="{{ old('datums_no') }}"
                        class="form-control @error('datums_no') is-invalid @enderror">
                    @error('datums_no')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Datums līdz <span class="required-star">*</span></label>
                    <input type="date" name="datums_lidz" value="{{ old('datums_lidz') }}"
                        class="form-control @error('datums_lidz') is-invalid @enderror">
                    @error('datums_lidz')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Laiki -->
            <div class="form-row">
                <div class="form-group">
                    <label>Sākuma laiks <span class="required-star">*</span></label>
                    <select name="sakuma_laiks" id="sakuma_laiks"
                        class="form-control @error('sakuma_laiks') is-invalid @enderror"
                        onchange="validateTimeRange()">
                        <option value="">-- Izvēlieties sākuma laiku --</option>
                        @php
                            $start = strtotime('00:00');
                            $end = strtotime('23:30');
                            for ($i = $start; $i <= $end; $i += 1800) {
                                $time = date('H:i', $i);
                                $selected = old('sakuma_laiks') == $time ? 'selected' : '';
                                echo "<option value=\"$time\" $selected>$time</option>";
                            }
                        @endphp
                    </select>
                    @error('sakuma_laiks')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <span class="time-error" id="start_error">❌ Sākuma laiks nedrīkst būt pēc beigu laika</span>
                </div>
                <div class="form-group">
                    <label>Beigu laiks <span class="required-star">*</span></label>
                    <select name="beigu_laiks" id="beigu_laiks"
                        class="form-control @error('beigu_laiks') is-invalid @enderror"
                        onchange="validateTimeRange()">
                        <option value="">-- Izvēlieties beigu laiku --</option>
                        @php
                            for ($i = $start; $i <= $end; $i += 1800) {
                                $time = date('H:i', $i);
                                $selected = old('beigu_laiks') == $time ? 'selected' : '';
                                echo "<option value=\"$time\" $selected>$time</option>";
                            }
                        @endphp
                    </select>
                    @error('beigu_laiks')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <span class="time-error" id="end_error">❌ Beigu laiks nedrīkst būt pirms sākuma laika</span>
                </div>
            </div>

            <!-- Apraksts -->
            <div class="form-group" style="margin-bottom:24px;">
                <label>Apraksts</label>
                <textarea name="apraksts" placeholder="Ievadiet pasākuma aprakstu..."
                    class="form-control @error('apraksts') is-invalid @enderror">{{ old('apraksts') }}</textarea>
                @error('apraksts')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Darbinieks un Telpa -->

            <!-- Darbinieks -->
            <div class="form-row" style="margin-bottom:32px;">
                <div class="form-group">
                    <label>Darbinieks <span class="required-star">*</span></label>
                    @if(auth()->user()->loma === 'Darbinieks')
                        <input type="text" value="{{ auth()->user()->vards }}" class="form-control" disabled>
                        <input type="hidden" name="darbinieks_id" value="{{ auth()->user()->ID }}">
                        @else
                      <select name="darbinieks_id"
                        class="form-control @error('darbinieks_id') is-invalid @enderror">
                        <option value="">-- Izvēlieties darbinieku --</option>
                        @foreach($darbinieki as $d)
                            <option value="{{ $d->ID }}" {{ old('darbinieks_id') == $d->ID ? 'selected' : '' }}>{{ $d->vards }}</option>
                        @endforeach
                    </select>
                    @endif

                    @error('darbinieks_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Telpa -->
                <div class="form-group">
                    <label>Telpa <span class="required-star">*</span></label>
                    <select name="telpa_id"
                        class="form-control @error('telpa_id') is-invalid @enderror">
                        <option value="">-- Izvēlieties telpu --</option>
                        @foreach($telpas as $t)
                            <option value="{{ $t->ID }}" {{ old('telpa_id') == $t->ID ? 'selected' : '' }}>{{ $t->nosaukums }}</option>
                        @endforeach
                    </select>
                    @error('telpa_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Pogas -->
            <div class="form-actions">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Atcelt</a>
                <button type="submit" class="btn btn-primary">➕ Saglabāt pasākumu</button>
            </div>
        </form>
    </div>

    <script>
        function validateTimeRange() {
            const startSelect = document.getElementById('sakuma_laiks');
            const endSelect = document.getElementById('beigu_laiks');
            const startError = document.getElementById('start_error');
            const endError = document.getElementById('end_error');

            // Noņemam esošās kļūdu klases
            startSelect.classList.remove('is-invalid');
            endSelect.classList.remove('is-invalid');
            startError.classList.remove('show');
            endError.classList.remove('show');

            if (startSelect.value && endSelect.value) {
                if (startSelect.value > endSelect.value) {
                    startError.classList.add('show');
                    endError.classList.add('show');
                    startSelect.classList.add('is-invalid');
                    endSelect.classList.add('is-invalid');

                    // Pievienojam shake animāciju
                    startSelect.classList.add('shake');
                    endSelect.classList.add('shake');

                    setTimeout(() => {
                        startSelect.classList.remove('shake');
                        endSelect.classList.remove('shake');
                    }, 300);
                }
            }
        }

        window.onload = function() {
            validateTimeRange();
        };
    </script>
@endsection