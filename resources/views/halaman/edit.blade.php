@extends('layouts.data')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Home
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
                <form method="post" action="{{ route('admin.update', $daftar->id) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Id">ID</label>
                        <input type="text" name="id" class="form-control" id="Id" value="{{ $daftar->id }}" aria- describedby="ID">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $daftar->title }}" aria- describedby="title">
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Content</label>
                        <input type="content" name="content" class="form-control" id="content" value="{{ $daftar->content }}" aria- describedby="content">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Title2</label>
                        <input type="title" name="title2" class="form-control" id="title2" value="{{ $daftar->title2 }}" aria- describedby="title2">
                    </div>
                    <div class="form-group">
                        <label for="content2">Content 2</label>
                        <input type="text" name="content2" class="form-control" id="content2" value="{{ $daftar->content2 }}" aria-describedby="content2">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection