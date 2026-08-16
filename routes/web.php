<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\InstructorController;
// use App\Http\Controllers\BatchController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', function() {
    return "Hello, students";
});

Route::get('/students/{id}', function($id) {
    return "Student ID :" . $id;
});


Route::get('/dashboard', function() {
    return "Welcome from Talent Professional Program";
})->name('tpp');

Route::get('/talent', function() {
    return redirect()->route('tpp');
});

Route::prefix('/talent')->group(function() {

    Route::get('/php', function() {
        return "This is PHP Track";
    });

     Route::get('/java', function() {
        return "This is Java Track";
    });
});


// Route::get('/category', function(){
//     return view('category.index');
// });

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/eidt', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

Route::get('/batches', [BatchController::class, 'index'])
    ->name('batches.index');

Route::get('/batches/create', [BatchController::class, 'create'])
    ->name('batches.create');

Route::post('/batches', [BatchController::class, 'store'])
    ->name('batches.store');

Route::delete('/batches/{batch}', [BatchController::class, 'destroy'])
    ->name('batches.destroy');

Route::resource('instructors', InstructorController::class);
