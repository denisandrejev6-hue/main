{{-- resources/views/alldata.blade.php --}}
@extends('layouts.app')

@section('title', 'Visi pasākumi')

@section('content')
<div class="admin-container" style="max-width: 1400px !important;">
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
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; margin-top: 16px;">
            @foreach($data as $index => $item)
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 20px rgba(0,0,0,0.1); transition: all 0.3s; display: flex; flex-direction: column; height: 100%;" 
                     onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.15)'" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.1)'">
                    
                    {{-- Attēls --}}
                    @php
                        $imgFiles = ['img1.jpg', 'img2.jpg', 'img3.jpg'];
                        $imgFile = $imgFiles[$index % count($imgFiles)];
                    @endphp
                    <div style="height: 220px; overflow: hidden;">
                        <img src="{{ asset('img/' . $imgFile) }}" 
                             alt="Pasākuma attēls" 
                             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;"
                             onmouseover="this.style.transform='scale(1.08)'" 
                             onmouseout="this.style.transform='scale(1)'">
                    </div>
                    
                    {{-- Saturs --}}
                    <div style="padding: 25px; flex: 1; display: flex; flex-direction: column;">
                        <h3 style="margin: 0 0 15px 0; color: #333; font-size: 24px; font-weight: 600;">{{ $item->nosaukums }}</h3>
                        
                        <div style="margin-bottom: 15px;">
                            <span style="background: #e8f5e9; color: #2e7d32; padding: 6px 14px; border-radius: 25px; font-size: 14px; font-weight: 500; display: inline-block;">
                                📅 {{ $item->datums }}
                            </span>
                        </div>
                        
                        @if(!empty($item->apraksts))
                            <p style="color: #666; line-height: 1.7; margin-bottom: 20px; flex: 1; font-size: 15px;">
                                {{ \Illuminate\Support\Str::limit($item->apraksts, 150) }}
                            </p>
                        @endif
                        
                        <div style="margin-top: auto;">
                            <a href="{{ route('pasakumi.show', $item->ID) }}" 
                               class="btn btn-save" 
                               style="display: inline-block; text-decoration: none; padding: 12px 28px; font-size: 16px;">
                                🔍 Skatīt detalizēti
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        {{-- Administratora/Redaktora skats --}}
        <div style="background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow-x: auto; margin-top: 20px;">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0; min-width: 1400px;">
                <thead>
                    <tr style="background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                        <th style="padding: 20px 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 3px solid #4CAF50; font-size: 15px; white-space: nowrap;">Nosaukums</th>
                        <th style="padding: 20px 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 3px solid #4CAF50; font-size: 15px; white-space: nowrap;">Periods</th>
                        <th style="padding: 20px 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 3px solid #4CAF50; font-size: 15px; white-space: nowrap;">Laiks</th>
                        <th style="padding: 20px 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 3px solid #4CAF50; font-size: 15px; white-space: nowrap;">Apraksts</th>
                        <th style="padding: 20px 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 3px solid #4CAF50; font-size: 15px; white-space: nowrap;">Atbildīgais</th>
                        <th style="padding: 20px 16px; text-align: left; font-weight: 600; color: #333; border-bottom: 3px solid #4CAF50; font-size: 15px; white-space: nowrap;">Telpa</th>
                        <th style="padding: 20px 16px; text-align: center; font-weight: 600; color: #333; border-bottom: 3px solid #4CAF50; font-size: 15px; white-space: nowrap;">Darbības</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr style="border-bottom: 1px solid #f0f0f0; transition: all 0.3s;" 
                            onmouseover="this.style.background='#f8f9fa'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.05)'" 
                            onmouseout="this.style.background='white'; this.style.boxShadow='none'">
                            
                            <td style="padding: 20px 16px;">
                                <div style="font-weight: 600; color: #333; font-size: 16px; margin-bottom: 4px;">{{ $item->nosaukums }}</div>
                                <div style="font-size: 13px; color: #999;">ID: {{ $item->ID }}</div>
                            </td>
                            
                            <td style="padding: 20px 16px;">
                                <div style="margin-bottom: 6px;">
                                    <span style="color: #666; font-size: 13px;">No:</span>
                                    <span style="font-weight: 500; color: #333; margin-left: 4px;">{{ $item->datums_no }}</span>
                                </div>
                                <div>
                                    <span style="color: #666; font-size: 13px;">Līdz:</span>
                                    <span style="font-weight: 500; color: #333; margin-left: 4px;">{{ $item->datums_lidz }}</span>
                                </div>
                            </td>
                            
                            <td style="padding: 20px 16px;">
                                <div style="margin-bottom: 6px;">
                                    <span style="color: #666; font-size: 13px;">Sākums:</span>
                                    <span style="font-weight: 500; color: #4CAF50; margin-left: 4px;">{{ $item->sakuma_laiks }}</span>
                                </div>
                                <div>
                                    <span style="color: #666; font-size: 13px;">Beigas:</span>
                                    <span style="font-weight: 500; color: #f44336; margin-left: 4px;">{{ $item->beigu_laiks }}</span>
                                </div>
                            </td>
                            
                            <td style="padding: 20px 16px; max-width: 300px;">
                                @if(!empty($item->apraksts))
                                    <div style="position: relative;">
                                        <div style="color: #555; line-height: 1.6; max-height: 80px; overflow-y: auto; padding-right: 8px; font-size: 14px; scrollbar-width: thin;">
                                            {{ $item->apraksts }}
                                        </div>
                                        @if(strlen($item->apraksts) > 200)
                                            <div style="font-size: 12px; color: #4CAF50; margin-top: 6px; cursor: pointer;" 
                                                 onclick="this.previousSibling.style.maxHeight = this.previousSibling.style.maxHeight === 'none' ? '80px' : 'none'; this.textContent = this.textContent === '▼ Rādīt vairāk' ? '▲ Rādīt mazāk' : '▼ Rādīt vairāk'">
                                                ▼ Rādīt vairāk
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <span style="color: #999; font-style: italic;">Nav apraksta</span>
                                @endif
                            </td>
                            
                            <td style="padding: 20px 16px;">
                                @if($item->darbinieks)
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="background: #e3f2fd; color: #1976d2; padding: 8px 14px; border-radius: 30px; font-size: 14px; font-weight: 500; display: inline-block; white-space: nowrap;">
                                            👤 {{ $item->darbinieks->vards }}
                                        </span>
                                    </div>
                                @else
                                    <span style="color: #999; font-style: italic;">Nav norādīts</span>
                                @endif
                            </td>
                            
                            <td style="padding: 20px 16px;">
                                @if($item->telpa)
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="background: #fff3e0; color: #f57c00; padding: 8px 14px; border-radius: 30px; font-size: 14px; font-weight: 500; display: inline-block; white-space: nowrap;">
                                            🏢 {{ $item->telpa->nosaukums }}
                                        </span>
                                    </div>
                                @else
                                    <span style="color: #999; font-style: italic;">Nav norādīta</span>
                                @endif
                            </td>
                            
                            <td style="padding: 20px 16px;">
                                <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
                                    <a href="{{ route('pasakumi.show', $item->ID) }}" 
                                       class="btn btn-save" 
                                       style="padding: 10px 20px; font-size: 14px; text-decoration: none; background: linear-gradient(135deg, #4CAF50, #45a049); min-width: 90px; text-align: center;"
                                       onmouseover="this.style.background='linear-gradient(135deg, #45a049, #3d8b40)'" 
                                       onmouseout="this.style.background='linear-gradient(135deg, #4CAF50, #45a049)'">
                                        👁️ Skatīt
                                    </a>
                                    
                                    <a href="{{ route('pasakumi.edit', $item->ID) }}" 
                                       class="btn btn-save" 
                                       style="padding: 10px 20px; font-size: 14px; text-decoration: none; background: linear-gradient(135deg, #2196F3, #1976D2); min-width: 90px; text-align: center;"
                                       onmouseover="this.style.background='linear-gradient(135deg, #1976D2, #1565C0)'" 
                                       onmouseout="this.style.background='linear-gradient(135deg, #2196F3, #1976D2)'">
                                        ✏️ Rediģēt
                                    </a>
                                    
                                    <form action="{{ route('pasakumi.destroy', $item->ID) }}" method="POST" style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-cancel" 
                                                style="padding: 10px 20px; font-size: 14px; border: none; cursor: pointer; background: linear-gradient(135deg, #f44336, #d32f2f); min-width: 90px; text-align: center;"
                                                onmouseover="this.style.background='linear-gradient(135deg, #d32f2f, #b71c1c)'" 
                                                onmouseout="this.style.background='linear-gradient(135deg, #f44336, #d32f2f)'"
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
        
        {{-- Kopsavilkums --}}
        <div style="margin-top: 25px; display: flex; justify-content: space-between; align-items: center; background: white; padding: 20px 25px; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            <div style="color: #666;">
                <span style="font-weight: 600; color: #333;">Kopā pasākumi:</span> 
                <span style="background: #4CAF50; color: white; padding: 4px 12px; border-radius: 20px; margin-left: 8px;">{{ count($data) }}</span>
            </div>
            <div style="display: flex; gap: 20px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="width: 12px; height: 12px; background: #4CAF50; border-radius: 3px;"></span>
                    <span style="color: #666; font-size: 14px;">Aktīvie</span>
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="width: 12px; height: 12px; background: #2196F3; border-radius: 3px;"></span>
                    <span style="color: #666; font-size: 14px;">Rediģējami</span>
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="width: 12px; height: 12px; background: #f44336; border-radius: 3px;"></span>
                    <span style="color: #666; font-size: 14px;">Dzēšami</span>
                </div>
            </div>
        </div>
        
        {{-- Ja nav datu --}}
        @if(count($data) === 0)
            <div style="text-align: center; padding: 80px 20px; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-top: 30px;">
                <div style="font-size: 80px; margin-bottom: 20px; opacity: 0.7;">📅</div>
                <h3 style="color: #333; margin-bottom: 10px; font-size: 28px;">Nav pievienotu pasākumu</h3>
                <p style="color: #666; margin-bottom: 30px; font-size: 16px;">Pievienojiet pirmo pasākumu, lai sāktu darbu.</p>
                <a href="{{ route('pasakumi.create') }}" class="btn btn-save" style="display: inline-block; text-decoration: none; padding: 15px 40px; font-size: 16px;">➕ Pievienot pasākumu</a>
            </div>
        @endif
    @endif
</div>
@endsection

@section('styles')
<style>
    /* Palielināts konteiners */
    .admin-container {
        max-width: 1600px !important;
        margin: 40px auto !important;
        padding: 0 30px !important;
    }
    
    /* Tabulas stili */
    table {
        border-collapse: separate !important;
        border-spacing: 0 !important;
        width: 100%;
    }
    
    thead th {
        position: sticky;
        top: 0;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        z-index: 10;
    }
    
    /* Pirmā kolonna ar nosaukumu */
    td:first-child {
        font-weight: 500;
    }
    
    /* Pēdējā kolonna ar darbībām */
    td:last-child {
        background: rgba(76, 175, 80, 0.02);
    }
    
    /* Ritjosla garam aprakstam */
    td[style*="max-width: 300px"] div::-webkit-scrollbar {
        width: 4px;
    }
    
    td[style*="max-width: 300px"] div::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    td[style*="max-width: 300px"] div::-webkit-scrollbar-thumb {
        background: #4CAF50;
        border-radius: 4px;
    }
    
    /* Darbību pogas */
    .btn {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        border-radius: 30px !important;
        font-weight: 500 !important;
        letter-spacing: 0.3px !important;
    }
    
    .btn:hover {
        transform: translateY(-3px) !important;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2) !important;
    }
    
    /* Klienta kartītes */
    .client-card {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    /* Responsive dizains */
    @media (max-width: 1200px) {
        .admin-container {
            max-width: 100% !important;
            padding: 0 20px !important;
        }
        
        table {
            min-width: 1200px !important;
        }
    }
    
    @media (max-width: 768px) {
        .admin-title {
            font-size: 28px !important;
        }
        
        .admin-container {
            padding: 0 15px !important;
        }
        
        div[style*="display: flex; justify-content: space-between;"] {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start !important;
        }
    }
    
    /* Animācijas – visas rindas parādās vienlaicīgi */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    tbody tr {
        animation: fadeIn 0.5s ease-out;
    }
    
    /* Statusa indikatori */
    .status-indicator {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 6px;
    }
    
    .status-active {
        background: #4CAF50;
        box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
    }
</style>
@endsection