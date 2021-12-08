@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach ($categories as $merk)
                <div class="col-md-3 mb-3">
                    <a href="/categories/{{ $merk->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="{{ url('img/logomerk.jpg')}}" class="card-img" alt="LogoMerk">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4 fs-4" style="background-color: rgba(0, 0, 0, 0.8)">{{ $merk->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>       
@endsection
    
