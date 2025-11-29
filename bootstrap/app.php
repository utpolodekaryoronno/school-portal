<?php

use App\Http\Middleware\LoginCheck;
use Illuminate\Foundation\Application;
use App\Http\Middleware\LoginCheckAdmin;
use App\Http\Middleware\LoginCheckStaff;
use App\Http\Middleware\LoginCheckTeacher;
use App\Http\Middleware\LoggedInMiddleware;
use App\Http\Middleware\RoleCheckerMiddleware;
use App\Http\Middleware\LoggedinMiddlewareAdmin;
use App\Http\Middleware\LoggedInMiddlewareStaff;
use App\Http\Middleware\LoggedInMiddlewareTeacher;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            "login-checking"            =>  LoginCheck::class,
            "loggedinMiddleware"        => LoggedInMiddleware::class,
            "login-checking-staff"      =>  LoginCheckStaff::class,
            "loggedinMiddlewareStaff"   => LoggedInMiddlewareStaff::class,
            "login-checking-teacher"    =>  LoginCheckTeacher::class,
            "loggedinMiddlewareTeacher" => LoggedInMiddlewareTeacher::class,
            "RoleChecker"               => RoleCheckerMiddleware::class,
            "login-checking-admin"      => LoginCheckAdmin::class,
            "loggedinMiddlewareAdmin"   => LoggedinMiddlewareAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
