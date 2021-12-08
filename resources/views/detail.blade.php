@extends('layouts.main')

@section('content')
    <div class="container mt-3">
          <div class="card my-2">
            @if ($car->gambar)
                <img src="{{ asset('storage/'.$car->gambar) }}" class="card-img-top" height="500" alt="...">
            @else
                <img src="{{ url('img/car.jpeg') }}" class="card-img-top" height="500" alt="...">  
            @endif
            <div class="card-body">
                <h3 class="card-title">
                    {{ $car->tahun }} {{ $car->merk->name }} {{ $car->model}}
                </h3>
                <h6 class="card-text">Di Posting Oleh : {{ $car->user->name}}</h6>
                <p class="card-text">
                    <small class="text-muted"> {{ $car->km }} km | {{ $car->transmisi }} | {{ $car->bbm }}</small>
                </p>
                <p class="card-text fs-3 fw-bold text-danger">Rp {{ number_format($car->harga,0,',','.') }}</p>
                <p class="card-text"><small class="text-muted">Last updated {{ $car->updated_at->diffForHumans()}}</small></p>
            </div>
        </div>
        <div class="d-grid my-2">
            <a href="https://whatsapp.com/" class="btn btn-lg btn-block fs-5 fw-bold" style="background-color: #fdcf33; color: #272d3c">
                <span class="fas fa-phone-alt"></span> Hubungi Penjual
            </a>
        </div>

        <div class="card mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Detail Mobil</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Merk</th>
                        <td>{{ $car->merk->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tahun Produksi</th>
                        <td>{{ $car->tahun}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Transmisi</th>
                        <td>{{ $car->transmisi}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Bahan Bakar</th>
                        <td>{{ $car->bbm }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jarak Tempuh</th>
                        <td>{{ $car->km }} km</td>
                    </tr><tr>
                        <th scope="row">Kapasitas Mesin</th>
                        <td>{{ $car->cc }} cc</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <a href="/catalog">Back to Catalog</a>
    </div>
@endsection