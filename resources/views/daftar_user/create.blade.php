@extends('layouts.data')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Cafe
            </div>
            <div class="card-body">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form method="post" action="{{ route('daftar.store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Nama">Nama Cafe</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="title">
            </div>
            <div class="form-group">
                <label for="Kelas">Deskripsi</label>
                <input type="text" name="content" class="form-control" id="content" aria-describedby="content">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat">
            </div>
            <div class="form-group">
                <label for="link">Link Maps</label>
                <input type="link" name="link" class="form-control" id="link" aria-describedby="link">
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="image" id="image"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ ('/daftar') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

