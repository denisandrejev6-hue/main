@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="jumbotron bg-light p-5 rounded">
        <h1 class="display-4">Bibliotēkas Pasakumi</h1>
        <p class="lead">Izpēti brīnumainus pasakumus un stāstus no visas pasaules</p>
        <hr class="my-4">
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">📚 Daudzveidīga Kollekcija</h5>
                    <p class="card-text">Lasi pasakumus no dažādām kultūrām un tradīcijām.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">⭐ Populārie Pasakumi</h5>
                    <p class="card-text">Iepazīsti lasītāju iecienītākos pasakumus un klasiku.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">🔍 Meklēt Pasakumus</h5>
                    <p class="card-text">Ātri atrodi interesējošos pasakumus, izmantojot meklēšanu.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
