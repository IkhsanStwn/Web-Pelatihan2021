<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        return view('catalog', [
            "title" => "Semua Mobil",
            // "cars" => Car::all()
            "cars" => Car::latest()->paginate(30)
        ]);
    }

    public function show(Car $car)
    {
        return view('detail', [
            "title" => "Detail",
            "car" => $car
        ]);
    }

}
