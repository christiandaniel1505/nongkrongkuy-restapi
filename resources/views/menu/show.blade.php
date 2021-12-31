

@extends('layouts.data')
  
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Menu
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    
                @foreach ($daftar as $data)
                    <li class="list-group-item">{{ $data->title}}</li>
                    <li class="list-group-item">dgfgdf</li>
                
                @endforeach
            </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('daftar.index') }}">Kembali</a>

        </div>
    </div>
</div>
@endsection
