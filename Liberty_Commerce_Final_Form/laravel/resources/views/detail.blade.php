@extends('layouts.app')

@section('content')
    <section class="menu">
        <h2>Menu</h2>
        <a class="non_active" href="\catalogue">catalogue</a>
        <a class="non_active" id="basket" href="\basket"></a>
    </section>
    <section class="detail_produit">
        <section class="photo">
            @foreach ($photo as $save)
                @if($save->id === $products->id)
                    <img style="width: 100%; max-width: 700px;" src="{{($save->path)}}">
                @endif
            @endforeach
        </section>
        <section class="description">
            <h2>{{$products->title}}</h2>
            <h3>Prix: {{$products->price}} &euro;</h3>
            @if (($products->stock) === 0)
                <h4>Plus d'article disponible</h4>
            @else
                <h4>Stock: {{$products->stock}}</h4>
            @endif
            @if (($user->admin) === 1)
                <form action="/stock" method="POST" id="addpstock">

                    <div class="container">
            
                        {{ csrf_field() }}
                        <input type= "hidden" name="id" value="{{$products->id}}" />
                        Changer le stock:
                        <input type="number" min="0" class="form-controle" id="inputstock" name="stock">
                        <button type="submit">Change</button>
                    </div>
                </form>
            @endif            
            <p>{{$products->description}}</p>    
            <section class="bouton">
                <button onclick="add_product({{$products->id}})">Achat</button>
            </section>
        </section>
    </section>
@endsection