@extends('layouts.data')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Cafe
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your i
                    nput.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('daftar.update', $daftar->id) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Id">ID</label>
                        <input type="text" name="id" class="form-control" id="Id" value="{{ $daftar->id }}" aria- describedby="ID">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama cafe</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $daftar->title }}" aria- describedby="title">
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Deskripsi</label>
                        <input type="content" name="content" class="form-control" id="content" value="{{ $daftar->content }}" aria- describedby="content">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="alamat" name="alamat" class="form-control" id="alamat" value="{{ $daftar->alamat }}" aria- describedby="alamat">
                    </div>
                    <div class="form-group">
                        <label for="link">Link Maps</label>
                        <input type="link" name="link" class="form-control" id="link" value="{{ $daftar->link }}" aria-describedby="link">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{ asset('img/'. $daftar->image) }}" aria-describedby="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection