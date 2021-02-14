@extends('layouts.app')

@section('content')
    <section class="menu">
        <h2>Menu</h2>
        <a class="non_active" href="\catalogue">catalogue</a>
        <a id="basket" class="non_active" href="\basket"></a>
    </section>
    <section>
        <h2>Facture n°{{$number}}</h2><br>  
        <section class="produit">
            <section class="titre"><h3>Nom</h3></section>
            <section class="unité"><h3>Unité</h3></section>
            <section class="price"><h3>Prix total</h3></section>
            @foreach ($facture as $facture)
                <section class="titre"><h3>{{$facture->title}}</h3></section>
                <section class="unité"><h3>{{$facture->choose}}</h3></section>
                <section class="price"><h3>{{$facture->price_t}}</h3></section>
            @endforeach
            <br>
            Prix Payé: {{$facture->price_f}} &euro;
        </section>
    </section>
@endsection