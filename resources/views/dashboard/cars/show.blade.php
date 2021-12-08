@extends('dashboard.layouts.main')

@section('container')
    <div class="container my-3">

        <a href="/dashboard/cars" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my cars</a>
        <a href="/dashboard/cars/{{ $car->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/cars/{{ $car->id }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                <span data-feather="x-circle"></span> Delete
            </button>
        </form>
        
        <div class="card my-3">
            @if ($car->gambar)
                <img src="{{ asset('storage/'.$car->gambar) }}" class="card-img-top" height="500" alt="...">
            @else
                <img src="{{ url('img/car.jpeg') }}" class="card-img-top" height="500" alt="...">  
            @endif
            
            <div class="card-body">
                <h3 class="card-title">
                    {{ $car->tahun }} {{ $car->merk->name }} {{ $car->model}}
                </h3>
                <p class="card-text">
                    <small class="text-muted"> {{ $car->km }} km | {{ $car->transmisi }} | {{ $car->bbm }}</small>
                </p>
                <p class="card-text fs-3 fw-bold text-danger">Rp {{ number_format($car->harga,0,',','.') }}</p>
                <p class="card-text"><small class="text-muted">Last updated {{ $car->updated_at->diffForHumans()}}</small></p>
            </div>
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
                    </tr>
                    <tr>
                        <th scope="row">Kapasitas Mesin</th>
                        <td>{{ $car->cc }} cc</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection