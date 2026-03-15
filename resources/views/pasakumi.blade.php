@extends('layouts.app') <!-- pievieno app.blade.php sagatavi -->

@section('content')
    <h1>Pasākumi</h1>
    <br>
    <p>Šeit būs informācija par pasākumiem</p>
    <br>
    <a href="{{ route('pasakumi.index') }}" class="btn btn-success">Skatīt visus pasākumus</a>
@endsection

<a href="{{ route('pasakumi.show', $pasakums->id) }}" class="btn btn-primary">Detalizēti</a>

@section('sidemenu')
    <!-- Šis kods tiks rādīts sānu izvēlnē -->
    <div class="card">
        <h2>Sānu izvēlne</h2>
        <p>Šeit var ievietot papildu navigāciju vai saturu.</p>
    </div>
@endsection
