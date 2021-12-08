<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Merk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DashboardCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.cars.index',[
            'cars' => Car::where('user_id', auth()->user()->id)->get() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cars.create', [
            'merks'=> Merk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'model' => 'required|max:255',
            'merk_id' => 'required',
            'transmisi' => 'required',
            'bbm' => 'required',
            'tahun' => 'required',
            'km' => 'required',
            'cc' => 'required',
            'harga' => 'required',
            'gambar' => 'image|file'
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('car-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Car::create($validatedData);

        return redirect('/dashboard/cars')->with('success', 'New car has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('dashboard.cars.show', [
            'car' => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('dashboard.cars.edit', [
            'car' => $car,
            'merks'=> Merk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $rules = [
            'model' => 'required|max:255',
            'merk_id' => 'required',
            'transmisi' => 'required',
            'bbm' => 'required',
            'tahun' => 'required',
            'km' => 'required',
            'cc' => 'required',
            'harga' => 'required',
            'gambar' => 'image|file'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('gambar')){
            if($request->oldGambar){
                Storage::delete($request->oldGambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('car-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Car::where('id', $car->id)
                ->update($validatedData);

        return redirect('/dashboard/cars')->with('success', 'Car has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        if($car->gambar){
            Storage::delete($car->gambar);
        }

        Car::destroy($car->id);

        return redirect('/dashboard/cars')->with('success', 'Car has been deleted!');
    }
}
