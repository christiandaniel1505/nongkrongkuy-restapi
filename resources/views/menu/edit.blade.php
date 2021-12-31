@extends('layouts.data')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Menu
            </div>
            <div class="card-body">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form method="post" action="{{ route('menu.update', $daftar->id) }}" id="myForm" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="Nama">ID</label>
                <input type="text" name="id" class="form-control" id="id" value="{{ $daftar->id }}" aria-describedby="id">
            </div>
            <div class="form-group">
                <label for="cafe_id">Nama Cafe</label>
                <div class="col-md-6">
                    <select class="form-control" name="cafe_id" required="" id="cafe_id">
                        <option value="">-- Pilih --</option>
                            @foreach($daftar as $data)
                                <option value="{{$data->id}}"
                                {{$data->cafe_id === $daftar->id ? "selected" : ""}}>{{$data->title}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="Nama">Menu</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $daftar->title }}" aria-describedby="title">
            </div>
            <div class="form-group">
                <label for="Kelas">Deskripsi</label>
                <input type="text" name="content" class="form-control" id="content" value="{{ $daftar->content }}" aria-describedby="content">
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="image" value="{{ asset('img/'. $daftar->image) }}" id="image"/>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" class="form-control" id="harga" value="{{ $daftar->harga }}" aria-describedby="harga">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ ('/menu') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

