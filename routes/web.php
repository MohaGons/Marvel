<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnageController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/addpersonnage', [PersonnageController::class, 'addPersonnage'])->middleware(['auth'])->name('addpersonnages');

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
    [PersonnageController::class, 'formPersonnage']
)->middleware(['auth'])->name('personnageadded');

Route::get(
    '/film',
    [PersonnageController::class, 'film']
)->middleware(['auth'])->name('film');

Route::post('/postCommentairePersonnage/{id_personnage}',
    [PersonnageController::class, 'postCommentairePersonnage']
)->middleware(['auth'])->name('postcommentairepersonnage');

Route::get('login/github', [AuthenticatedSessionController::class, 'redirectToProvider']);
Route::get('login/github/callback', [AuthenticatedSessionController::class, 'handleProviderCallback']);

require __DIR__.'/auth.php';

require __DIR__ . '/auth.php';
