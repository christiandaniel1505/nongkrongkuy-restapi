@extends('layouts.app')
@section('content')
<section class="tm-section row">
    <div class="tm-main-section light-gray-bg">
        <div class="container" id="main">
            
            @foreach ($daftar as $data)
                <div class="tm-menu-product-content col-lg-9 col-md-9">
                    <!-- menu content -->
                    <div class="tm-product">
                        <img src="{{ asset('img/'. $data->image) }}" alt="Product" width="100px" height="100px">
                        <div class="tm-product-text">
                            <h3 class="tm-product-title">{{ $data->title}}</h3>
                            <p class="tm-product-description">{{ $data->content}}</p>
                        </div>
                        <div class="tm-product-price">
                            <a href="#" class="tm-product-price-link tm-handwriting-font">{{ $data->harga}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection