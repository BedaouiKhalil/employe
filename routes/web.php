<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;

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

Route::get('/home', function () {
    return view('backend.home');
})->name('home');

Auth::routes();

Route::resource('service', Backend\ServiceController::class);
Route::resource('fonction', Backend\FonctionController::class);
Route::resource('contrat', Backend\contratController::class);
Route::resource('administration', Backend\AdministrationController::class);
Route::get('employe/archive',[Backend\EmployeController::class,'archive'])->name('employe.archive'); 
Route::get('employe/generate_pdf/{id}',[Backend\EmployeController::class,'generate_pdf'])->name('employe.generate_pdf'); 
Route::resource('employe', Backend\EmployeController::class);


Route::get('conge',[Backend\Demande\CongeController::class,'index'])->name('demande.conge.index'); 
Route::get('conge/mesconges',[Backend\Demande\CongeController::class,'mesconges'])->name('demande.conge.mesconges');
Route::get('conge/show/{id}',[Backend\Demande\CongeController::class,'show'])->name('demande.conge.show'); 
Route::get('conge/create',[Backend\Demande\CongeController::class,'create'])->name('demande.conge.create'); 
Route::post('conge/store',[Backend\Demande\CongeController::class,'store'])->name('demande.conge.store'); 
Route::delete('conge/destroy/{id}',[Backend\Demande\CongeController::class,'destroy'])->name('demande.conge.destroy'); 

Route::put('conge/reponse/{id}',[Backend\Demande\CongeController::class,'reponse'])->name('demande.conge.reponse'); 
