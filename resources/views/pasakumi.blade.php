@section('content')
    <h1>Pasākumi</h1>
    <br>
    <p>Šeit būs informācija par pasākumiem</p>
    <br>
    
    <a href="{{ route('pasakumi.create') }}" class="btn btn-success" style="background-color: #00ffff; color: #000; border: none; font-weight: bold; margin-bottom: 20px;">PIEVIENOT JAUNU IERAKSTU</a>

    <table class="table-custom">
        <thead>
            <tr>
                <th>Nosaukums</th>
                <th>Datums</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasakumi as $pasakums)
            <tr>
                <td>{{ $pasakums->nosaukums }}</td>
                <td>{{ $pasakums->datums }}</td>
                <td class="actions-cell">
                    <a href="{{ route('pasakumi.edit', $pasakums->id) }}" class="btn-action edit">REDIĢĒT</a>

                    <form action="{{ route('pasakumi.destroy', $pasakums->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action delete" onclick="return confirm('Vai tiešām vēlaties dzēst?')">DZĒST</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <style>
        /* Стили для таблицы в стиле твоего скриншота */
        .table-custom {
            width: 100%;
            border-collapse: collapse;
            color: #00ffff;
            border: 1px solid #444;
        }
        .table-custom th, .table-custom td {
            border: 1px solid #444;
            padding: 15px;
            text-align: center;
        }
        .actions-cell {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .btn-action {
            padding: 8px 15px;
            background-color: #00ffff;
            color: #000;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 12px;
            transition: 0.3s;
        }
        .btn-action:hover {
            background-color: #fff;
            box-shadow: 0 0 10px #00ffff;
        }
        .btn-action.delete:hover {
            background-color: #ff4d4d;
            color: #fff;
        }
    </style>
@endsection