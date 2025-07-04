<?php

use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/applications', [FrontendController::class, 'appoint'])->name('appoint');
Route::get('/404', [FrontendController::class, 'error'])->name('error');
Route::get('/{slug}', [FrontendController::class, 'pagesingle'])->name('pagesingle');

Route::get('/blogs/{slug}', [FrontendController::class, 'blogsingle'])->name('blogsingle');
Route::get('/categories/{slug}', [FrontendController::class, 'categorysingle'])->name('categorysingle');

Route::get('/services/{slug}', [FrontendController::class, 'servicesingle'])->name('servicesingle');
Route::get('/country/{slug}', [FrontendController::class, 'countrysingle'])->name('countrysingle');

Route::get('/careers/{slug}', [FrontendController::class, 'careersingle'])->name('careersingle');


Route::post('/inquiry', [ContactsController::class, 'inquiry'])->name('inquiry');
Route::post('/applications', [FrontendController::class, 'applications'])->name('applications');