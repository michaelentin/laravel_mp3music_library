<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{

	public function handle($request, Closure $next) 
	{
        //User::firstOrCreate(array('username' => $request->username));
        $user = User::where('username', $request->username);
        if ($user->count() == 0)
        {
          //return redirect()->back(); 
        }
        return $next($request); 
		
	}

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
