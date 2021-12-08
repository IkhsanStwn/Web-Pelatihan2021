@extends('layouts.main')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/images.jpg" width="100%" class="d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/images(2).jpg" width="100%" class="d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/images(3).jpg" width="100%" class="d-block" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 my-5" style="border-radius: 12px; box-shadow:  0 2px 20px rgb(0, 0, 0, 0.5);">
                <div class="row p-3">
                    <div class="col">
                        <div class="d-grid">
                            <a href="/catalog" class="btn btn-lg btn-block btn-info fs-5 fw-bold">Cari Mobil</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-grid">
                            <a href="/dashboard/cars/create" class="btn btn-lg btn-block btn-warning fs-5 fw-bold">Jual Mobil</a>
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    @foreach ($merks as $merk)
                    <div class="col">
                        <a href="/categories/{{ $merk->slug }}" class="text-decoration-none">
                            {{-- <div class="">
                                {{ $merk->name }}
                            </div> --}}
                            <div class="card">
                                <img src="{{ url('img/white.jpg')}}" height="50" class="card-img" alt="LogoMerk">
                                <div class="card-img-overlay d-flex align-items-center p-0">
                                    <p class="card-title text-center flex-fill" style="font-size: 10pt; color: #173559">
                                        <i class="fa fa-car" aria-hidden="true"></i> 
                                        <br> {{ $merk->name }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>          
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid my-5 " style="background-color: #173559; padding:20px 110px 50px 110px">
        <div class="text-center mb-4" style="color: #fdcf33;">
            <h1>Temukan Mobil Anda di sini</h1>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="/catalog/{{ $cars[0]->id }}" class="text-decoration-none text-dark">
                    <div class="card">
                        @if ($cars[0]->gambar)
                            <img src="{{ asset('storage/'.$cars[0]->gambar) }}" class="card-img-top" height="200" alt="...">
                        @else
                            <img src="{{ url('img/car.jpeg') }}" class="card-img-top" height="200" alt="...">  
                        @endif
                        <div class="card-body">
                            <h6 class="card-title ">
                                {{ $cars[0]->tahun }} {{ $cars[0]->merk->name }} {{ $cars[0]->model }}
                            </h6>
                            <div class="card-text text-muted" style="font-size: 9pt">
                                {{ $cars[0]->km }} km | {{ $cars[0]->transmisi }} | {{ $cars[0]->bbm }}
                            </div>
                            <div class="card-text fs-4 fw-bold text-danger">Rp {{ number_format($cars[0]->harga,0,',','.') }}</div>
                            <div class="card-text text-end">
                                <small class="text-muted">Last updated {{ $cars[0]->updated_at->diffForHumans()}}</small>
                            </div>
                        </div>
                    </div>
                </a> 
            </div>
            <div class="col-md-3">
                <a href="/catalog/{{ $cars[1]->id }}" class="text-decoration-none text-dark">
                    <div class="card">
                        @if ($cars[1]->gambar)
                            <img src="{{ asset('storage/'.$cars[1]->gambar) }}" class="card-img-top" height="200" alt="...">
                        @else
                            <img src="{{ url('img/car.jpeg') }}" class="card-img-top" height="200" alt="...">  
                        @endif
                        <div class="card-body">
                            <h6 class="card-title ">
                                {{ $cars[1]->tahun }} {{ $cars[1]->merk->name }} {{ $cars[1]->model }}
                            </h6>
                            <div class="card-text text-muted" style="font-size: 9pt">
                                {{ $cars[1]->km }} km | {{ $cars[1]->transmisi }} | {{ $cars[1]->bbm }}
                            </div>
                            <div class="card-text fs-4 fw-bold text-danger">Rp {{ number_format($cars[1]->harga,0,',','.') }}</div>
                            <div class="card-text text-end">
                                <small class="text-muted">Last updated {{ $cars[1]->updated_at->diffForHumans()}}</small>
                            </div>
                        </div>
                    </div>  
                </a>
            </div>
            <div class="col-md-3">
                <a href="/catalog/{{ $cars[2]->id }}" class="text-decoration-none text-dark">
                    <div class="card">
                        @if ($cars[2]->gambar)
                            <img src="{{ asset('storage/'.$cars[2]->gambar) }}" class="card-img-top" height="200" alt="...">
                        @else
                            <img src="{{ url('img/car.jpeg') }}" class="card-img-top" height="200" alt="...">  
                        @endif
                        <div class="card-body">
                            <h6 class="card-title ">
                                {{ $cars[2]->tahun }} {{ $cars[2]->merk->name }} {{ $cars[2]->model }}
                            </h6>
                            <div class="card-text text-muted" style="font-size: 9pt">
                                {{ $cars[2]->km }} km | {{ $cars[2]->transmisi }} | {{ $cars[2]->bbm }}
                            </div>
                            <div class="card-text fs-4 fw-bold text-danger">Rp {{ number_format($cars[2]->harga,0,',','.') }}</div>
                            <div class="card-text text-end">
                                <small class="text-muted">Last updated {{ $cars[2]->updated_at->diffForHumans()}}</small>
                            </div>
                        </div>
                    </div>
                </a> 
            </div>
            <div class="col-md-3">
                <a href="/catalog">
                    <div class="card">
                        <img src="{{ url('img/white.jpg')}}" height="337" class="card-img" alt="LogoMerk">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h4 class="card-title text-center flex-fill" style="color: #173559">
                                <i class="fas fa-eye 2x" aria-hidden="true"></i> 
                                <br> Lihat Lebih Banyak Mobil
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        

    </div>  
@endsection
    
