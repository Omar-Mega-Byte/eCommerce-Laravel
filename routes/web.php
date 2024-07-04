<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('pages/welcome',[
        'page_name' => 'Home Page',
        'page_description' => 'This is Description',
    ]);
})->name('Home');

Route::get('/about-me', function () {
    return view('pages/about',[
        'page_name' => 'About Page',
        'page_description' => 'This is Description',
    ]);
})->name('About');

Route::view('/contact-me', "pages/contact" , [
    'page_name' => 'Contact Me Page',
    'page_description' => 'This is Description'
])->name('Contact');

Route::get('/category/{id}/posts/{post}', function ($id,$post) {
    $cats = [
        '1' => 'Games',
        '2' => 'Programming',
        '3' => 'Books'
    ];

    return view('pages/category',[
        'page_name' => 'Category Page',
        'page_description' => 'This is Description',
        'the_id' => $cats[$id] ?? "This ID is not found !",
        'the_post' => $post
    ]);
})->name('Category');

Route::get('/register', function () {
    return view('auth/register',[
        'page_name' => 'Register Page',
        'page_description' => 'This is Description',
    ]);
})->name('Register');

Route::post('/register', [AuthController::class , 'register'])->name('auth');
