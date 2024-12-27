<?php
use Illuminate\Support\Facades\Route;
use Laracontact\Contactform\Http\Controllers\ContactController;

Route::middleware(['guest', 'web'])->group (function(){
Route::get('/contact-form', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact.submit');
});