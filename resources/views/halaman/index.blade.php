@extends('layouts.data')
@section('content')
<div class="row m-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>NONGKRONGYUK</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('admin.create') }}"> Tambah</a>
        </div>
    </div>

    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title 1</th>
            <th>Content</th>
            <th>Title2</th>
            <th>Content2</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($daftar as $mahasiswa)
        <tr>
            <td>{{$mahasiswa->id}}</td>
            <td>{{$mahasiswa->title}}</td>
            <td>{{$mahasiswa->content}}</td>
            <td>{{$mahasiswa->title2}}</td>
            <td>{{$mahasiswa->content2}}</td>
            <td>
                <form action="{{route('admin.destroy', $mahasiswa->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ ('/home') }}">Kembali</a>
                    <a class="btn btn-primary" href="{{ route('admin.edit', $mahasiswa->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex">
    {{ $daftar->links('pagination::bootstrap-4') }}
    </div>
</div>