<?php

use App\Http\Controllers\Admin\ClientRegistrationController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\RecruitmentsController;
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

Route::get('/404', [FrontendController::class, 'error'])->name('error');
Route::get('/{slug}', [FrontendController::class, 'pagesingle'])->name('pagesingle');

Route::get('/blogs/{slug}', [FrontendController::class, 'blogsingle'])->name('blogsingle');
Route::get('/categories/{slug}', [FrontendController::class, 'categorysingle'])->name('categorysingle');

Route::get('/services/{slug}', [FrontendController::class, 'servicesingle'])->name('servicesingle');

// Route::get('/projects/{slug}', [FrontendController::class, 'projectsingle'])->name('projectsingle');
// Route::get('/projectcategory/{slug}', [FrontendController::class, 'projectcategory'])->name('projectcategory');

Route::get('/careers/{slug}', [FrontendController::class, 'careersingle'])->name('careersingle');
Route::get('/pricing/{slug}', [FrontendController::class, 'pricingsingle'])->name('pricingsingle');


Route::post('/inquiry', [ContactsController::class, 'inquiry'])->name('inquiry');
