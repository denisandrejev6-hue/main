@else
        {{-- Возвращаем твою оригинальную таблицу, чтобы вернулся темный фон --}}
        <table border="1" cellpadding="12" cellspacing="0" style="margin-top:16px; width:100%; border-collapse:collapse; table-layout:auto; color: white;">
            <colgroup>
                <col style="width:40%;">
                <col style="width:25%;">
                <col style="width:20%;">
            </colgroup>
            <thead>
                <tr>
                    <th style="text-align:center; color: #00ffff;">Nosaukums</th>
                    <th style="text-align:center; color: #00ffff;">Datums</th>
                    <th style="text-align:center; color: #00ffff;">Darbības</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr style="border-bottom: 1px solid #444;">
                        <td style="text-align:center; padding: 15px;">{{ $item->nosaukums }}</td>
                        <td style="text-align:center; padding: 15px;">{{ $item->datums }}</td>
                        <td style="text-align:center; padding: 15px;">
                            <div style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                                
                                {{-- Только REDIĢĒT и DZĒST --}}
                                @if(auth()->user()->loma !== 'Lietotajs')
                                    <a href="{{ route('pasakumi.edit', $item->ID) }}" 
                                       style="background-color: #00ffff; color: #000; padding: 8px 15px; text-decoration: none; font-weight: bold; border-radius: 5px; font-size: 12px; border: none; display: inline-block;">
                                       REDIĢĒT
                                    </a>
                                    
                                    <form action="{{ route('pasakumi.destroy', $item->ID) }}" method="POST" style="margin:0; display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Vai tiešām dzēst?')"
                                                style="background-color: #00ffff; color: #000; padding: 8px 15px; border: none; font-weight: bold; border-radius: 5px; font-size: 12px; cursor: pointer;">
                                                DZĒST
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif