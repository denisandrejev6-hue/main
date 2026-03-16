<tbody>
                @foreach($data as $item)
                    <tr>
                        <td style="text-align:center;">{{ $item->nosaukums }}</td>
                        <td style="text-align:center;">{{ $item->datums }}</td>
                        <td style="text-align:center;">
                            <div style="display: flex; gap: 8px; justify-content: center; align-items: center;">
                                {{-- Проверяем роль, чтобы показать кнопки управления --}}
                                @if(auth()->user()->loma !== 'Lietotajs')
                                    <a href="{{ route('pasakumi.edit', $item->ID) }}" 
                                       style="background-color: #00ffff; color: #000; padding: 8px 12px; text-decoration: none; font-weight: bold; border-radius: 4px; font-size: 12px; text-transform: uppercase; border: none; display: inline-block;">
                                       REDIĢĒT
                                    </a>
                                    
                                    <form action="{{ route('pasakumi.destroy', $item->ID) }}" method="POST" style="margin:0; display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Vai tiešām dzēst?')"
                                                style="background-color: #00ffff; color: #000; padding: 8px 12px; border: none; font-weight: bold; border-radius: 4px; font-size: 12px; text-transform: uppercase; cursor: pointer;">
                                                DZĒST
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>