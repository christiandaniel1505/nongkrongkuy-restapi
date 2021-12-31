@extends('layouts.admin')
@section('content')
<section class="tm-section row">
    <div class="tm-main-section light-gray-bg">
        <div class="container" id="main">
            <div class="col-lg-12 tm-section-header-container margin-bottom-30">
                <h2 class="tm-section-header gold-text tm-handwriting-font"><a href="{{route('menu.create')}}" class="tm-section-header gold-text tm-handwriting-font">Tambah Menu</a></h2>
                <div class="tm-hr-container">
                    <hr class="tm-hr">
                </div>
            </div>
            
            @foreach ($daftar as $data)
                <div class="tm-menu-product-content col-lg-9 col-md-9">
                    <!-- menu content -->
                    <div class="tm-product">
                        <img src="{{ asset('img/'. $data->image) }}" alt="Product" width="100px" height="100px">
                        <div class="tm-product-text">
                            <h3 class="tm-product-title">{{ $data->title}}</h3>
                                <p class="tm-product-description">{{ $data->content}}</p><br>
                                <form action="{{route('menu.destroy', $data->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('menu.edit', $data->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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