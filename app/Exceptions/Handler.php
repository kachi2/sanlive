<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Inertia\Inertia;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Customize response for specific exceptions.
     */
    public function render($request, Throwable $exception)
    {
        // Handle 404 errors for web (non-API) requests
        if ($exception instanceof NotFoundHttpException || $exception instanceof ModelNotFoundException) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json(['message' => 'Not Found'], 404);
            }

            // Return Inertia 404 page
            return Inertia::render('404')
                ->toResponse($request)
                ->setStatusCode(404);
        }

        return parent::render($request, $exception);
    }
}
