{{-- resources/views/telpas/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Kategoriju saraksts</h1>

    @if(session('success'))
        <div class="flash flash-success">{{ session('success') }}</div>
    @endif

    @if(auth()->user()->loma !== 'Lietotajs')
        <a href="{{ route('kategorijas.create') }}" class="btn">Pievienot jaunu kategoriju</a>
    @endif

    <table border="1" cellpadding="12" cellspacing="0" style="margin-top:16px; width:100%; border-collapse:collapse; table-layout:auto;">
        <thead>
            <tr>
                <th style="text-align:center;">Nosaukums</th>
                @if(auth()->user()->loma !== 'Lietotajs')
                    <th style="text-align:center;">Darbības</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td style="text-align:center;">{{ $item->nosaukums }}</td>
                    @if(auth()->user()->loma !== 'Lietotajs')
                        <td style="text-align:center;">
                            <a href="{{ route('kategorijas.edit', $item->ID) }}" class="btn secondary">Rediģēt</a>
                            <form action="{{ route('kategorijas.destroy', $item->ID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn danger" onclick="return confirm('Vai tiešām vēlaties dzēst šo kategoriju?')">Dzēst</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
