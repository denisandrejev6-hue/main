{{-- resources/views/kategorijas/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kategoriju saraksts</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(auth()->user()->loma !== 'Lietotajs')
            <a href="{{ route('kategorijas.create') }}" class="btn btn-primary">Pievienot jaunu kategoriju</a>
        @endif

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Nosaukums</th>
                    @if(auth()->user()->loma !== 'Lietotajs')
                        <th>Darbības</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>{{ $item->nosaukums }}</td>
                        @if(auth()->user()->loma !== 'Lietotajs')
                            <td>
                                <a href="{{ route('kategorijas.edit', $item->ID) }}" class="btn btn-sm btn-warning">Rediģēt</a>
                                <form action="{{ route('kategorijas.destroy', $item->ID) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Vai tiešām vēlaties dzēst šo kategoriju?')">Dzēst</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Nav pievienotu kategoriju</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection