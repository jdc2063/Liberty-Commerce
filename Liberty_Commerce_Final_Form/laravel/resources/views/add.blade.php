@extends('layouts.app')

@section('content')
    <form action="/store" method="POST" id="addproduct" enctype="multipart/form-data">

        <div class="container">

            {{ csrf_field() }}

            Nom :
            <input type="text" class="form-controle" id="inputtitle" name="title">

            <br>
            Description :
            <input type="text" class="form-controle" id="inputdescription" name="description">
            
            <br>
            Photo :
            <input type="file" name="image" placeholder="Choose image" id="image">
            @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            <br>

            Prix :
            <input type="text" class="form-contrle" id="inputprice" name="price">
            <br>
            
            Stock :
            <input type="text" class="form-controle" id="inputstock" name="stock">
            <br>
            
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>            
        </div>
    </form>
@endsection