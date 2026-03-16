<tbody>
    @foreach($data as $item)
        <tr>
            {{-- Возвращаем стандартное выравнивание, которое было в твоем проекте --}}
            <td style="text-align:center; padding: 15px;">{{ $item->nosaukums }}</td>
            <td style="text-align:center; padding: 15px;">{{ $item->datums }}</td>
            <td style="text-align:center; padding: 15px;">
                {{-- Используем Flex только для контейнера кнопок, не ломая ячейку --}}
                <div style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                    
                    @if(auth()->user()->loma !== 'Lietotajs')
                        {{-- Кнопка Редактировать --}}
                        <a href="{{ route('pasakumi.edit', $item->ID) }}" 
                           class="btn" {{-- Оставляем твой класс btn для сохранения общих стилей --}}
                           style="background-color: #00ffff; color: #000; padding: 5px 12px; text-decoration: none; font-weight: bold; border-radius: 4px; font-size: 11px; text-transform: uppercase; border: none;">
                           REDIĢĒT
                        </a>
                        
                        {{-- Кнопка Удалить --}}
                        <form action="{{ route('pasakumi.destroy', $item->ID) }}" method="POST" style="margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn" {{-- Оставляем твой класс btn --}}
                                    onclick="return confirm('Vai tiešām dzēst?')"
                                    style="background-color: #00ffff; color: #000; padding: 5px 12px; border: none; font-weight: bold; border-radius: 4px; font-size: 11px; text-transform: uppercase; cursor: pointer;">
                                    DZĒST
                            </button>
                        </form>
                    @endif

                </div>
            </td>
        </tr>
    @endforeach
</tbody>