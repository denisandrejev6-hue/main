{{-- resources/views/alldata.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Visi Pasakumi</h1>

    @if(session('success'))
        <div class="flash flash-success">{{ session('success') }}</div>
    @endif

    @if(auth()->user()->loma !== 'Lietotajs')
        <a href="{{ route('pasakumi.create') }}" class="btn">Pievienot jaunu pasakumu</a>
    @endif

    @if(auth()->user()->loma === 'Lietotajs')
        <div class="client-container" style="margin-top: 16px;">
            @foreach($data as $index => $item)
                <div class="client-card">
                    <h3>{{ $item->nosaukums }}</h3>
                    <p><strong>Datums:</strong> {{ $item->datums }}</p>
                    @php
                        $imgFiles = ['img1.jpg', 'img2.jpg', 'img3.jpg'];
                        $imgFile = $imgFiles[$index % count($imgFiles)];
                    @endphp
                    <img src="{{ asset('img/' . $imgFile) }}" alt="Pasākuma attēls" style="width:100%;max-width:320px;border-radius:8px;margin-bottom:8px;" />
                    @if(!empty($item->apraksts))
                        <p>{{ \Illuminate\Support\Str::limit($item->apraksts, 120) }}</p>
                    @endif
                    <a href="{{ route('pasakumi.show', $item->ID) }}" class="btn-detail">Detalizēti</a>
                </div>
            @endforeach
        </div>
    @else
        <table border="1" cellpadding="12" cellspacing="0" style="margin-top:16px; width:100%; border-collapse:collapse; table-layout:auto;">
            <colgroup>
                <col style="width:40%;">
                <col style="width:25%;">
                <col style="width:20%;">
            </colgroup>
            <thead>
                <tr>
                    <th style="text-align:center;">Nosaukums</th>
                    <th style="text-align:center;">Datums</th>
                    <th style="text-align:center;">Darbības</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td style="text-align:center;">{{ $item->nosaukums }}</td>
                        <td style="text-align:center;">{{ $item->datums }}</td>
                        <td style="text-align:center;">
                            <div style="display:flex; gap:8px; justify-content:center; align-items:center;">
                                <a href="{{ route('pasakumi.edit', $item->ID) }}" class="btn edit">Rediģēt</a>
                                <form action="{{ route('pasakumi.destroy', $item->ID) }}" method="POST" style="margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete" onclick="return confirm('Vai tiešām dzēst šo pasakumu?')">Dzēst</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection