<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
    //return redirect()->route('index');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/','App\Http\Controllers\WelcomeController@index')->name('index');
Route::get('about','App\Http\Controllers\WelcomeController@about');

Route::resource('categories','App\Http\Controllers\CategoriesController');
Route::resource('tags','App\Http\Controllers\TagsController');
Route::post('tags','App\Http\Controllers\TagsController@getTag')->name('get-tag');

//Route::get('/categories/{categoryId}/issues', [IssueController::class, 'getIssuesByCategory'])->name('categories.issues');

Route::resource('issues','App\Http\Controllers\IssuesController');
Route::resource('comments','App\Http\Controllers\CommentsController');



require __DIR__.'/auth.php';
