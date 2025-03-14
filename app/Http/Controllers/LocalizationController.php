<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function setLanguage (Request $request)
    {
         // Save selected Locale to current "Session"
         $locale = $request->lang ;
         // App::setLocale($locale); --> There is no need for this here, as the middleware will run after the redirect() where it has already been set.
         session(['locale'=> $locale]);
        //  App::setLocale($locale);
        return App::currentLocale();
        //  return redirect()->back();
     }
}
