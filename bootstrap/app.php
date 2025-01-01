<?php

use App\Http\Middleware\User;
use App\Http\Middleware\Admin;
use Illuminate\Foundation\Application;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
        Route::middleware('web')
            ->group(base_path('routes/admin.php'));
    },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => Admin::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'csrf-check' => VerifyCsrfToken::class,
        ]);
        // $middleware->append(VerifyCsrfToken::class);
    })



    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


