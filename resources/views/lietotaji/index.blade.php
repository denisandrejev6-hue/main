{{-- resources/views/lietotaji/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Lietotāju saraksts</h1>

    @if(session('success'))
        <div class="flash flash-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('lietotaji.create') }}" class="btn">Pievienot jaunu lietotāju</a>

    <table border="1" cellpadding="12" cellspacing="0" style="margin-top:16px; width:100%; border-collapse:collapse; table-layout:auto;">
        <thead>
            <tr>
                <th style="text-align:center;">Vārds</th>
                <th style="text-align:center;">Uzvārds</th>
                <th style="text-align:center;">E-pasts</th>
                <th style="text-align:center;">Loma</th>
                <th style="text-align:center;">Darbības</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td style="text-align:center;">{{ $item->vards }}</td>
                    <td style="text-align:center;">{{ $item->uzvards }}</td>
                    <td style="text-align:center;">{{ $item->epasts }}</td>
                    <td style="text-align:center;">{{ $item->loma }}</td>
                    <td style="text-align:center;">
                        <a href="{{ route('lietotaji.show', $item->ID) }}" class="btn secondary">Detalizēti</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
