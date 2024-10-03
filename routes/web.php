<?php

// use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KulinerController;
use Illuminate\Support\Facades\Http;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Route;

// Route::get('/events', [GuruController::class, 'getEvents']);
Route::get('/kuliner', [KulinerController::class, 'index'])->name('kuliner.index');
Route::get('/kuliner/{id}', [KulinerController::class, 'show'])->name('kuliner.show');
Route::get('/kategori/{category}', [KulinerController::class, 'category'])->name('kuliner.category');
Route::get('/jurnal', [JurnalController::class, 'index'])->name('jurnals.index');
// Route::get('/', [GuruController::class, 'index'])->name('home');
Route::get('/', [GuruController::class, 'index'])->name('home');

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/category/{tema}', [BlogController::class, 'category'])->name('blogs.category');


Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::get('/test-openai', function () {
    $returnValue = OpenAI::chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => 'Hello!'],
        ],
    ]);
    echo  $returnValue->choices[0]->message->content;
});
