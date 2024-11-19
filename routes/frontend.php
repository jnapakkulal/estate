<?php

use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'Home'])->name('home');

Route::get('/about', [FrontendController::class, 'About'])->name('about');

Route::get('/services', [FrontendController::class, 'Services'])->name('services');

Route::get('/properties', [FrontendController::class, 'Properties'])->name('properties');

Route::get('/agents', [FrontendController::class, 'Agents'])->name('agents');

Route::get('/contacts', [FrontendController::class, 'Contacts'])->name('contacts');

//Route::get('/login', [FrontendController::class, ''])->name('login');  for login with breeze we dont need a route

Route::post('/contacts.store', [FrontendController::class, 'ContactsStore'])->name('contacts.store');
