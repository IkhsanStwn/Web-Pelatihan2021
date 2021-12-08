<?php

use App\Models\Car;
use App\Models\Merk;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardCarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "cars" => Car::all(),
        "merks" => Merk::all()
    ]);
});

Route::get('/catalog', [CarController::class, 'index']);

// halaman single catalog atau detail
Route::get('catalog/{car}', [CarController::class, 'show']);

route::get('/categories', function(){
    return view('categories', [
        'title' => 'Car Merk',
        'categories' => Merk::all()
    ]);
});

Route::get('/categories/{merk:slug}', function(Merk $merk){
    return view('catalog',[
        'title' => "Mobil Merk : $merk->name",
        'cars' => $merk->cars->load('user', 'merk')
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/cars', DashboardCarController::class)->middleware('auth');
