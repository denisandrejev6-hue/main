{{-- resources/views/alldata.blade.php --}}
@extends('layouts.app')

@section('content')
    <div style="max-width:1400px; margin:0 auto; padding:20px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <h1 style="margin:0; color:#333; font-size:28px;">Visi Pasākumi</h1>

            @if(auth()->user()->loma !== 'Lietotajs')
                <a href="{{ route('pasakumi.create') }}" style="background:#4CAF50; color:white; padding:12px 24px; border-radius:8px; text-decoration:none; font-weight:600; transition:all 0.3s; box-shadow:0 2px 4px rgba(0,0,0,0.1);" onmouseover="this.style.background='#45a049'" onmouseout="this.style.background='#4CAF50'">+ Pievienot jaunu pasākumu</a>
            @endif
        </div>

        @if(session('success'))
            <div style="background:#d4edda; border-left:4px solid #28a745; color:#155724; padding:16px; margin-bottom:24px; border-radius:4px; font-weight:500;">
                {{ session('success') }}
            </div>
        @endif

        @if(auth()->user()->loma === 'Lietotajs')
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px, 1fr)); gap:24px; margin-top:16px;">
                @foreach($data as $index => $item)
                    <div style="background:white; border-radius:12px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1); transition:transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                        <div style="padding:20px;">
                            <h3 style="margin:0 0 12px 0; color:#333; font-size:20px;">{{ $item->nosaukums }}</h3>
                            
                            <div style="margin-bottom:16px;">
                                <p style="margin:8px 0; color:#666;"><strong style="color:#333;">Datums:</strong> 
                                    {{ $item->datums_no }}
                                    @if($item->datums_lidz && $item->datums_lidz != $item->datums_no)
                                        - {{ $item->datums_lidz }}
                                    @endif
                                </p>
                                <p style="margin:8px 0; color:#666;"><strong style="color:#333;">Laiks:</strong> 
                                    {{ $item->sakuma_laiks }} - {{ $item->beigu_laiks }}
                                </p>
                            </div>
                            
                            @php
                                $imgFiles = ['img1.jpg', 'img2.jpg', 'img3.jpg'];
                                $imgFile = $imgFiles[$index % count($imgFiles)];
                            @endphp
                            <img src="{{ asset('img/' . $imgFile) }}" alt="Pasākuma attēls" style="width:100%; height:180px; object-fit:cover; border-radius:8px; margin-bottom:16px;">
                            
                            @if(!empty($item->apraksts))
                                <p style="color:#666; line-height:1.5; margin-bottom:16px;">{{ \Illuminate\Support\Str::limit($item->apraksts, 100) }}</p>
                            @endif
                            
                            <a href="{{ route('pasakumi.show', $item->ID) }}" style="display:inline-block; background:#2196F3; color:white; padding:10px 20px; border-radius:6px; text-decoration:none; font-weight:500; transition:background 0.3s;" onmouseover="this.style.background='#1976D2'" onmouseout="this.style.background='#2196F3'">Detalizēti →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="background:white; border-radius:12px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1); margin-top:16px;">
                <table style="width:100%; border-collapse:collapse; font-size:14px;">
                    <thead>
                        <tr style="background:#f5f5f5; border-bottom:2px solid #ddd;">
                            <th style="padding:16px; text-align:left; color:#333; font-weight:600;">Nosaukums</th>
                            <th style="padding:16px; text-align:left; color:#333; font-weight:600;">Sākuma datums</th>
                            <th style="padding:16px; text-align:left; color:#333; font-weight:600;">Beigu datums</th>
                            <th style="padding:16px; text-align:left; color:#333; font-weight:600;">Sākuma laiks</th>
                            <th style="padding:16px; text-align:left; color:#333; font-weight:600;">Beigu laiks</th>
                            <th style="padding:16px; text-align:left; color:#333; font-weight:600;">Apraksts</th>
                            <th style="padding:16px; text-align:left; color:#333; font-weight:600;">Atbildīga persona</th>
                            <th style="padding:16px; text-align:left; color:#333; font-weight:600;">Telpa</th>
                            <th style="padding:16px; text-align:left; color:#333; font-weight:600;">Darbības</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr style="border-bottom:1px solid #eee; transition:background 0.2s;" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='white'">
                                <td style="padding:16px;">{{ $item->nosaukums }}</td>
                                <td style="padding:16px;">{{ $item->datums_no ?? '—' }}</td>
                                <td style="padding:16px;">{{ $item->datums_lidz ?? '—' }}</td>
                                <td style="padding:16px;">{{ $item->sakuma_laiks ?? '—' }}</td>
                                <td style="padding:16px;">{{ $item->beigu_laiks ?? '—' }}</td>
                                <td style="padding:16px; max-width:200px;">
                                    <div style="overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                        {{ $item->apraksts ?: '—' }}
                                    </div>
                                </td>
                                <td style="padding:16px;">
                                    @if($item->darbinieks)
                                        {{ $item->darbinieks->vards ?? 'Nav norādīts' }}
                                    @else
                                        <span style="color:#999;">Nav norādīts</span>
                                    @endif
                                </td>
                                <td style="padding:16px;">
                                    @if($item->telpa)
                                        {{ $item->telpa->nosaukums ?? 'Nav norādīta' }}
                                    @else
                                        <span style="color:#999;">Nav norādīta</span>
                                    @endif
                                </td>
                                <td style="padding:16px;">
                                    <div style="display:flex; gap:8px;">
                                        <a href="{{ route('pasakumi.edit', $item->ID) }}" style="background:#FFC107; color:#333; padding:6px 12px; border-radius:4px; text-decoration:none; font-size:12px; font-weight:500; transition:background 0.3s;" onmouseover="this.style.background='#FFB300'" onmouseout="this.style.background='#FFC107'">Rediģēt</a>
                                        
                                        <form action="{{ route('pasakumi.destroy', $item->ID) }}" method="POST" style="margin:0;" onsubmit="return confirm('Vai tiešām vēlaties dzēst šo pasākumu?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background:#f44336; color:white; padding:6px 12px; border:none; border-radius:4px; font-size:12px; font-weight:500; cursor:pointer; transition:background 0.3s;" onmouseover="this.style.background='#d32f2f'" onmouseout="this.style.background='#f44336'">Dzēst</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if(count($data) == 0)
                <div style="text-align:center; padding:48px; background:white; border-radius:12px; margin-top:16px;">
                    <p style="color:#999; font-size:16px;">Nav pievienotu pasākumu</p>
                </div>
            @endif
        @endif
    </div>

    <style>
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
@endsection