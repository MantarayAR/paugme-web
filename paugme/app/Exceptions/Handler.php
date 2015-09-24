<?php

namespace App\Exceptions;

use Exception;
use Ipunkt\LaravelAnalytics\AnalyticsFacade;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        $debug = config('app.debug', false);

//        if ( $debug) {
//            return (new SymfonyDisplayer($debug))->createResponse($e);
//        }
        AnalyticsFacade::trackEvent('error', get_class( $e ) . '@' . $e->getMessage());
        return response()->view('errors.default', ['exception' => $e], 500);
    }

}
