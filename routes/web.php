<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('home');
});
Route::get('/lang/{lang}', function ($lang) {
    if (!in_array($lang, ['en', 'ar'])) {
        abort(400); // Prevent invalid languages
    }

    // Store the locale in the session (this should update the existing session row in the database)
    session(['locale' => $lang]);

    // Apply the language immediately
    App::setLocale($lang);

    return back(); // Redirect back to previous page
});
