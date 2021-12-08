@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Cars</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/cars" method="POST" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="model" class="col-sm-2 col-form-label">Model</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model') }}">
                    @error('model')
                        {{ $message }}
                    @enderror
                </div>
                
            </div>
            <div class="row mb-3">
                <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                <div class="col-sm-8">
                    <select class="form-select" name="merk_id">
                        @foreach ($merks as $merk)
                            @if (old('merk_id') == $merk->id)
                                <option value="{{ $merk->id }}" selected>{{ $merk->name}}</option>
                            @else 
                                <option value="{{ $merk->id }}">{{ $merk->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            
            {{-- <div class="mb-3">
                <label for="model" class="form-label">Transmisi</label>
                <input type="text" class="form-control" id="model" name="model">
            </div> --}}

            <div class="row mb-3">
                <label for="transmisi" class="col-sm-2 col-form-label">Transmisi </label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        {{-- @if (old('transmisi') === 'Manual Transmision (MT)' )
                            <input class="form-check-input " type="radio" name="transmisi" id="transmisi1" value="Manual Transmision (MT)" checked>
                        @else
                            <input class="form-check-input " type="radio" name="transmisi" id="transmisi1" value="Manual Transmision (MT)">
                        @endif --}}
                        <input class="form-check-input " type="radio" name="transmisi" id="transmisi1" value="Manual Transmision (MT)" checked>
                        <label class="form-check-label" for="transmisi1">
                          MT
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if (old('transmisi') === 'Automatic Transmision (AT)')
                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi2" value="Automatic Transmision (AT)" checked> 
                        @else
                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi2" value="Automatic Transmision (AT)">
                        @endif
                        <label class="form-check-label" for="transmisi2">
                          AT
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if (old('transmisi') === 'Continuous Variable Transmision (CVT)')
                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi3" value="Continuous Variable Transmision (CVT)" checked> 
                        @else
                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi3" value="Continuous Variable Transmision (CVT)">    
                        @endif
                        <label class="form-check-label" for="transmisi3">
                          CVT
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if (old('transmisi') === 'Dual Clutch Transmision (DCT)')
                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi4" value="Dual Clutch Transmision (DCT)" checked> 
                        @else
                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi4" value="Dual Clutch Transmision (DCT)">
                        @endif
                        <label class="form-check-label" for="transmisi4">
                          DCT
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if (old('transmisi') === 'Automated Manual Transmision (AMT)')
                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi5" value="Automated Manual Transmision (AMT)" checked>
                        @else
                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi5" value="Automated Manual Transmision (AMT)">
                        @endif
                        
                        <label class="form-check-label" for="transmisi5">
                            AMT
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="bbm" class="col-sm-2 col-form-label">Bahan Bakar</label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bbm" id="bbm1" value="Bensin" checked>
                        <label class="form-check-label" for="bbm1">
                          Bensin
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if (old('bbm') === 'Diesel')
                            <input class="form-check-input" type="radio" name="bbm" value="Diesel" id="bbm2" checked>
                        @else
                            <input class="form-check-input" type="radio" name="bbm" value="Diesel" id="bbm2">  
                        @endif
                        <label class="form-check-label" for="bbm2">
                          Diesel
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tahun" class="col-sm-2 col-form-label">Tahun Pembuatan</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control  @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') }}">
                    @error('tahun')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="km" class="col-sm-2 col-form-label">Jarak Tempuh (km)</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control  @error('km') is-invalid @enderror" id="km" name="km" value="{{ old('km') }}">
                    @error('km')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="cc" class="col-sm-2 col-form-label">Kapasitas Mesin (cc)</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control  @error('cc') is-invalid @enderror" id="cc" name="cc" value="{{ old('cc') }}">
                    @error('cc')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga" class="col-sm-2 col-form-label">Harga (Rp)</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control  @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
                    @error('harga')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Foto Mobil</label>
                <img class="img-preview img-fluid my-3 col-sm-5">
                <div class="col-sm-10">
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
            </div>
              
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    <script>

        function previewImage(){
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');
            
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        
        }


    
    </script>
@endsection