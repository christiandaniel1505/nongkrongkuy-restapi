@extends('layouts.data')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Halaman
            </div>
            <div class="card-body">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form method="post" action="{{ route('home.store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Nama">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="title">
            </div>
            <div class="form-group">
                <label for="Kelas">Content</label>
                <input type="text" name="content" class="form-control" id="content" aria-describedby="content">
            </div>
            <div class="form-group">
                <label for="alamat">Title2</label>
                <input type="title2" name="title2" class="form-control" id="title2" aria-describedby="title2">
            </div>
            <div class="form-group">
                <label for="content2">Content2</label>
                <input type="content2" name="content2" class="form-control" id="content2" aria-describedby="content2">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ ('/daftar') }}">Kembali</a>
                
            </div>
        </form>
    </div>
</div>
@endsection

