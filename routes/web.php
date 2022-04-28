<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnageController;

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
    return view('welcome');
});

Route::get('/addpersonnage', function () {
    return view('addpersonnages');
})->middleware(['auth'])->name('addpersonnages');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get(
    '/personnage',
    [PersonnageController::class, 'personnage']
)->middleware(['auth'])->name('personnage');

Route::get(
    '/detailPersonnage/{id}',
    [PersonnageController::class, 'detailPersonnage']
)->middleware(['auth'])->name('detailpersonnage');

Route::get(
    '/deletePersonnage/{id}',
    [PersonnageController::class, 'deletePersonnage']
)->middleware(['auth'])->name('deletepersonnage');

Route::post(
    '/personnageAdded',
    [PersonnageController::class, 'addPersonnage']
)->middleware(['auth'])->name('personnageadded');

Route::get(
    '/film',
    [PersonnageController::class, 'film']
)->middleware(['auth'])->name('film');

require __DIR__ . '/auth.php';
