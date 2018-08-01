<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if($request->is('dashboard/*')){
            if ($exception instanceof NotFoundHttpException) {
                return redirect('/dashboard/404');
            }

            if($exception instanceof ModelNotFoundException){
                return redirect('/dashboard/404');
            }
        }

        if ($exception instanceof NotFoundHttpException) {
            return redirect('/404');
        }

        if($exception instanceof ModelNotFoundException){
            return redirect('/404');
        }


        return parent::render($request, $exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function unauthenticated($request, AuthenticationException $exception)
    {
        $guard = array_get($exception->guards(), 0);
        switch ($guard) {
            default:
                $login = 'authentication.form';
                break;
        }
        return redirect()->guest(route($login));
    }
}
