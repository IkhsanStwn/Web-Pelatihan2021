@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3" style="border-bottom: 3px solid #b6812f;">{{ $title }}</h1>

        @if ($cars->count())
        <a href="/catalog/{{ $cars[0]->id }}" class="text-decoration-none text-dark">
            <div class="card mb-3">
                @if ($cars[0]->gambar)
                    <img src="{{ asset('storage/'.$cars[0]->gambar) }}" class="card-img-top" height="450" alt="...">
                @else
                    <img src="{{ url('img/car.jpeg') }}" class="card-img-top" height="450" alt="...">  
                @endif
                <div class="card-body text-center">
                    <h3 class="card-title">
                        {{ $cars[0]->tahun }} {{ $cars[0]->merk->name }} {{ $cars[0]->model }}
                    </h3>
                    <p class="card-text">
                        <small class="text-muted"> {{ $cars[0]->km }} km | {{ $cars[0]->transmisi }} | {{ $cars[0]->bbm }}</small>
                    </p>
                    <p class="card-text fs-3 fw-bold text-danger">Rp {{ number_format($cars[0]->harga,0,',','.') }}</p>
                    <p class="card-text text-end"><small class="text-muted">Last updated {{ $cars[0]->updated_at->diffForHumans()}}</small></p>
                </div>
            </div>
        </a>

        <div class="row">
            @foreach ($cars->skip(1) as $car)
            <div class="col-lg-4 mb-4">
                <a href="/catalog/{{ $car->id }}" class="text-decoration-none text-dark">
                    <div class="card">
                        @if ($car->gambar)
                            <img src="{{ asset('storage/'.$car->gambar) }}" class="card-img-top" height="250" alt="...">
                        @else
                            <img src="{{ url('img/car.jpeg') }}" class="card-img-top" height="250" alt="...">  
                        @endif
                        <div class="card-body">
                            <h5 class="card-title ">
                                {{ $car->tahun }} {{ $car->merk->name }} {{ $car->model }}
                            </h5>
                            <div class="card-text">
                                <small class="text-muted"> {{ $car->km }} km | {{ $car->transmisi }} | {{ $car->bbm }}</small>
                            </div>
                            <div class="card-text fs-4 fw-bold text-danger">Rp {{ number_format($car->harga,0,',','.') }}</div>
                            <div class="card-text text-end">
                                <small class="text-muted">Last updated {{ $car->updated_at->diffForHumans()}}</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>   
            @endforeach
        </div>  
    </div>

    @else
        <p class="text-center fs-4">Car Not Found</p>
    @endif
    

@endsection
    
