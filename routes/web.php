<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseExportImportController;

use App\Http\Controllers\SearchHouseController;

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

Route::controller(HouseExportImportController::class)->group(function(){
    Route::get('houses', 'index');
    Route::get('houses-export', 'export')->name('houses.export');
    Route::post('houses-import', 'import')->name('houses.import');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [SearchHouseController::class,'index']);
Route::post('/action', [SearchHouseController::class,'action'])->name('text_search.action');

Route::get('/', function () {
    return view('welcome');
});
