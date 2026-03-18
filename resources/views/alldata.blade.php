{{-- resources/views/alldata.blade.php --}}
@extends('layouts.app')

@section('title', 'Visi pasākumi')

@section('content')
<div class="admin-container">
    <h1 class="admin-title">Visi pasākumi</h1>

    @if(session('success'))
        <div class="error-container" style="background: #e8f5e9; border-left-color: #4CAF50; color: #2e7d32;">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if(auth()->user()->loma !== 'Lietotajs')
        <div style="margin-bottom: 24px;">
            <a href="{{ route('pasakumi.create') }}" class="btn btn-save" style="display: inline-block; text-decoration: none;">➕ Pievienot jaunu pasākumu</a>
        </div>
    @endif

    @if(auth()->user()->loma === 'Lietotajs')
        {{-- Klienta skats --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px; margin-top: 16px;">
            @foreach($data as $index => $item)
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s; display: flex; flex-direction: column; height: 100%;" 
                     onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                    
                    {{-- Attēls --}}
                    @php
                        $imgFiles = ['img1.jpg', 'img2.jpg', 'img3.jpg'];
                        $imgFile = $imgFiles[$index % count($imgFiles)];
                    @endphp
                    <div style="height: 200px; overflow: hidden;">
                        <img src="{{ asset('img/' . $imgFile) }}" 
                             alt="Pasākuma attēls" 
                             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;"
                             onmouseover="this.style.transform='scale(1.05)'" 
                             onmouseout="this.style.transform='scale(1)'">
                    </div>
                    
                    {{-- Saturs --}}
                    <div style="padding: 20px; flex: 1; display: flex; flex-direction: column;">
                        <h3 style="margin: 0 0 12px 0; color: #333; font-size: 22px; font-weight: 600;">{{ $item->nosaukums }}</h3>
                        
                        <div style="margin-bottom: 12px;">
                            <span style="background: #e8f5e9; color: #2e7d32; padding: 6px 12px; border-radius: 20px; font-size: 14px; font-weight: 500;">
                                📅 {{ $item->datums }}
                            </span>
                        </div>
                        
                        @if(!empty($item->apraksts))
                            <p style="color: #666; line-height: 1.6; margin-bottom: 16px; flex: 1;">
                                {{ \Illuminate\Support\Str::limit($item->apraksts, 120) }}
                            </p>
                        @endif
                        
                        <div style="margin-top: auto;">
                            <a href="{{ route('pasakumi.show', $item->ID) }}" 
                               class="btn btn-save" 
                               style="display: inline-block; text-decoration: none; padding: 12px 24px; font-size: 15px;">
                                🔍 Detalizēti
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        {{-- Administratora/Redaktora skats --}}
        <div style="background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 1200px;">
                <thead>
                    <tr style="background: linear-gradient(135deg, #f5f5f5, #eeeeee);">
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #4CAF50;">Nosaukums</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #4CAF50;">Sākuma datums</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #4CAF50;">Beigu datums</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #4CAF50;">Sākuma laiks</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #4CAF50;">Beigu laiks</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #4CAF50;">Apraksts</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #4CAF50;">Atbildīga persona</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #4CAF50;">Telpa</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 2px solid #4CAF50;">Darbības</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr style="border-bottom: 1px solid #f0f0f0; transition: background 0.3s;" 
                            onmouseover="this.style.background='#f9f9f9'" 
                            onmouseout="this.style.background='white'">
                            
                            <td style="padding: 16px; color: #333; font-weight: 500;">{{ $item->nosaukums }}</td>
                            <td style="padding: 16px; color: #666;">{{ $item->datums_no }}</td>
                            <td style="padding: 16px; color: #666;">{{ $item->datums_lidz }}</td>
                            <td style="padding: 16px; color: #666;">{{ $item->sakuma_laiks }}</td>
                            <td style="padding: 16px; color: #666;">{{ $item->beigu_laiks }}</td>
                            <td style="padding: 16px; color: #666; max-width: 250px;">
                                <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $item->apraksts ?: 'Nav apraksta' }}
                                </div>
                            </td>
                            <td style="padding: 16px;">
                                <span style="background: #e3f2fd; color: #1976d2; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                                    {{ $item->darbinieks->vards ?? 'Nav norādīts' }}
                                </span>
                            </td>
                            <td style="padding: 16px;">
                                <span style="background: #fff3e0; color: #f57c00; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                                    {{ $item->telpa->nosaukums ?? 'Nav norādīta' }}
                                </span>
                            </td>
                            <td style="padding: 16px;">
                                <div style="display: flex; gap: 8px; align-items: center;">
                                    <a href="{{ route('pasakumi.edit', $item->ID) }}" 
                                       class="btn btn-save" 
                                       style="padding: 8px 16px; font-size: 14px; text-decoration: none; background: linear-gradient(135deg, #2196F3, #1976D2); box-shadow: 0 2px 8px rgba(33,150,243,0.3);"
                                       onmouseover="this.style.background='linear-gradient(135deg, #1976D2, #1565C0)'; this.style.transform='translateY(-2px)'" 
                                       onmouseout="this.style.background='linear-gradient(135deg, #2196F3, #1976D2)'; this.style.transform='translateY(0)'">
                                        ✏️ Rediģēt
                                    </a>
                                    
                                    <form action="{{ route('pasakumi.destroy', $item->ID) }}" method="POST" style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-cancel" 
                                                style="padding: 8px 16px; font-size: 14px; border: none; cursor: pointer; background: linear-gradient(135deg, #f44336, #d32f2f); box-shadow: 0 2px 8px rgba(244,67,54,0.3);"
                                                onmouseover="this.style.background='linear-gradient(135deg, #d32f2f, #b71c1c)'; this.style.transform='translateY(-2px)'" 
                                                onmouseout="this.style.background='linear-gradient(135deg, #f44336, #d32f2f)'; this.style.transform='translateY(0)'"
                                                onclick="return confirm('Vai tiešām vēlaties dzēst šo pasākumu?')">
                                            🗑️ Dzēst
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{-- Ja nav datu --}}
        @if(count($data) === 0)
            <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-top: 24px;">
                <div style="font-size: 64px; margin-bottom: 16px;">📭</div>
                <h3 style="color: #333; margin-bottom: 8px;">Nav pievienotu pasākumu</h3>
                <p style="color: #666; margin-bottom: 24px;">Pievienojiet pirmo pasākumu, lai sāktu darbu.</p>
                <a href="{{ route('pasakumi.create') }}" class="btn btn-save" style="display: inline-block; text-decoration: none;">➕ Pievienot pasākumu</a>
            </div>
        @endif
    @endif
</div>
@endsection

@section('styles')
<style>
    /* Papildu stili, kas nav galvenajā CSS failā */
    .client-card-hover {
        transition: all 0.3s;
    }
    
    /* Pielāgojumi mobilajām ierīcēm */
    @media (max-width: 768px) {
        .admin-title {
            font-size: 24px;
        }
        
        div[style*="grid-template-columns: repeat(auto-fill, minmax(320px, 1fr))"] {
            grid-template-columns: 1fr !important;
        }
    }
    
    /* Darbību pogu animācija */
    .btn {
        transition: all 0.3s !important;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.2) !important;
    }
    
    /* Tabulas rindu animācija */
    tbody tr {
        transition: background 0.3s;
    }
    
    /* Tooltip gariem aprakstiem */
    td[style*="max-width: 250px"] div:hover {
        overflow: visible;
        white-space: normal;
        word-break: break-word;
        background: white;
        padding: 8px;
        border-radius: 4px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        position: absolute;
        z-index: 100;
        max-width: 300px;
    }
    
    /* Statusa zīmes */
    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
    }
    
    .badge-employee {
        background: #e3f2fd;
        color: #1976d2;
    }
    
    .badge-room {
        background: #fff3e0;
        color: #f57c00;
    }
</style>
@endsection