@extends('layouts.app')

@section('content')
    <section class="menu">
        <h2>Menu</h2>
        <a class="non_active" href="\catalogue">catalogue</a>
        <a id="basket" class="active" href="\basket"></a>
    </section>



    <section class="panier"></section>
    <h3 id="final"></h3> 

    <div class="container">
        <button onclick="save()">Payer</button>
    </div>

@endsection