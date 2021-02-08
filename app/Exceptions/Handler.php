<?php

namespace App\Exceptions;

use Throwable;
use Mockery\Exception\InvalidOrderException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        // $this->renderable(function (Throwable $e) {
        //     if ($e->getMessage() === 'This action is unauthorized.') {
        //         return response([
        //             'error' => 'This action is unauthorized.'
        //         ], 403);
        //     }
        //     return response([
        //         'error' => $e->getMessage()
        //     ], $e->getCode() ? $e->getCode() : 400);
        // });
    }
}
