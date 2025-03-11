<?php

use App\Http\Middleware\SetLanguage;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Ensure Laravel session is initialized first
        $middleware->prepend(\Illuminate\Session\Middleware\StartSession::class);
        
        // Now apply language settings
        $middleware->append(SetLanguage::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
