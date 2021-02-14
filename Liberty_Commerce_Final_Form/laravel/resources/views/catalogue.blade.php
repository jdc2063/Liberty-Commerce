@extends('layouts.app')

@section('content')
    <section class="menu">
        <h2>Menu</h2>
        <a class="active" href="\catalogue">catalogue</a>
        <a id="basket" class="non_active" href="\basket"></a>
    </section>

    <section class="catalogue">

        @foreach ($products as $product)
            <section class="card">
                    
                <section style="width: 100%">
                    @foreach ($photo as $save)
                        @if($save->id === $product->id)
                            <img class="image" src="{{($save->path)}}">
                        @endif
                    @endforeach
                </section>
                        
                <section class="name">
                    <h3>{{$product->title}}</h3>
                </section>
                <section class="button">
                    <form action="/detail" method="POST" id="addproduct">

                        <div class="container">
                
                            {{ csrf_field() }}
                            <input type= "hidden" name="id" value="{{$product->id}}" />
                            <button type="submit">D&#233tail</button>
                        </div>
                    </form>

                    <div class="container">
                        
                        <button type="add_product" onclick="add_product({{$product->id}})">Achat Direct</button>
                    </div>
                    </form>
                </section>
            </section>       
        @endforeach
    </section>
    <script>var choix = '<?php echo $products; ?>' ;</script>
@endsection

