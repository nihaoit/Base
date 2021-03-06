<?php namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Debug\Exception\FatalErrorException;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
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
		Log::error($e);
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

		/**
		 * 404 page when a model is not found
		 */
		if ($e instanceof ModelNotFoundException) {
			return response()->view('errors.404', [], 404);
		}

		/**
		 * 500 page on FatalErrorException
		 * when env is not local
		 */
		if (! app()->isLocal()) {
			if ($e instanceof FatalErrorException) {
				return response()->view('errors.500', [], 500);
			}
		}

		if ($this->isHttpException($e)) {
			return $this->renderHttpException($e);
		} else {
			return parent::render($request, $e);
		}
	}

}
