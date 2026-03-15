{{-- resources/views/details.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="event-details-card" style="max-width: 420px; margin: 0 auto; background: rgba(0,0,40,0.7); border-radius: 18px; box-shadow: 0 4px 24px #0004; padding: 32px 28px 24px 28px; color: var(--clr-text-light);">
        <h2 style="text-align:center; color: var(--clr-french-violet); margin-bottom: 18px; letter-spacing: 0.04em; font-size: 2rem;">
            <span style="vertical-align: middle;">📚</span> {{ $data->nosaukums }}
        </h2>
        <div style="margin-bottom: 12px;">
            <span style="font-weight:600; color:var(--clr-text-muted);">Kategorija:</span> {{ $data->kategorija }}
        </div>
        <div style="margin-bottom: 12px;">
            <span style="font-weight:600; color:var(--clr-text-muted);">Datums:</span> <span style="color:var(--clr-bright-pink);">{{ $data->datums }}</span>
        </div>
        <div style="margin-bottom: 12px;">
            <span style="font-weight:600; color:var(--clr-text-muted);">Laiks:</span> {{ $data->sakuma_laiks }} – {{ $data->beigu_laiks }}
        </div>
        <div style="margin-bottom: 18px;">
            <span style="font-weight:600; color:var(--clr-text-muted);">Apraksts:</span> {{ $data->apraksts }}
        </div>
        <div style="margin-bottom: 12px;">
            <span style="font-weight:600; color:var(--clr-text-muted);">Atbildīgais darbinieks:</span> {{ optional(\App\Models\Lietotajs::find($data->darbinieks_id))->vards ?? 'Nav norādīts' }}
        </div>
        <div style="margin-bottom: 24px;">
            <span style="font-weight:600; color:var(--clr-text-muted);">Telpa:</span> {{ optional(\App\Models\Telpa::find($data->telpa_id))->nosaukums ?? 'Nav norādīta' }}
        </div>
        <div style="text-align:center; margin-top: 18px;">
            <a href="{{ route('pasakumi.index') }}" class="btn secondary" style="font-size:1.1rem; padding: 10px 32px; border-radius: 8px;">Atpakaļ uz sarakstu</a>
        </div>
    </div>
@endsection
