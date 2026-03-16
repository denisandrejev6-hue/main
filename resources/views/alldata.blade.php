<tbody>
                @foreach($data as $item)
                    <tr>
                        <td style="text-align:center;">{{ $item->nosaukums }}</td>
                        <td style="text-align:center;">{{ $item->datums }}</td>
                        <td style="text-align:center;">
                            {{-- Контейнер для кнопок, чтобы они были в ряд --}}
                            <div style="display: flex; gap: 5px; justify-content: center; align-items: center; padding: 5px;">
                                
                                @if(auth()->user()->loma !== 'Lietotajs')
                                    {{-- Твоя оригинальная кнопка Rediģēt с фиксом цвета --}}
                                    <a href="{{ route('pasakumi.edit', $item->ID) }}" class="btn" style="background-color: #00ffff; color: #000; font-size: 11px; padding: 5px 10px; text-decoration: none; font-weight: bold; border-radius: 4px;">REDIĢĒT</a>
                                    
                                    {{-- Твоя оригинальная кнопка Dzēst с фиксом цвета --}}
                                    <form action="{{ route('pasakumi.destroy', $item->ID) }}" method="POST" style="display:inline; margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: #00ffff; color: #000; font-size: 11px; padding: 5px 10px; font-weight: bold; border-radius: 4px; cursor: pointer; border: none;" onclick="return confirm('Vai tiešām dzēst?')">DZĒST</button>
                                    </form>
                                @endif
                                
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>