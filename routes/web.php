<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Middleware\SetLanguage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [HomeController::class, 'index']);

Route::get('/lang/{lang}', function ($lang) {
    if (!in_array($lang, ['en', 'ar'])) {
        abort(400); // Prevent invalid languages
    }
   session(['locale'=> $lang]);
   return redirect()->back();
});

// Route::get('/debug-locale', function () {
//     return response()->json([
//         'session_locale' => session('locale'),   // What’s stored in the session?
//         'app_locale' => App::currentLocale(),       // What Laravel is actually using?
//     ]);
// });