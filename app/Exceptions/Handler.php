<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Session\TokenMismatchException;

class Handler extends ExceptionHandler
{
    /**
     * Report or log an exception.
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // ถ้า session หมดอายุหรือ cookie หาย (TokenMismatchException)
        if ($exception instanceof TokenMismatchException) {
            return redirect('/login')->with('status', 'Session expired Please login again');
        }
        return parent::render($request, $exception);
    }
}
