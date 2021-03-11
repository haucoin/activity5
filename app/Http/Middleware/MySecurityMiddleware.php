<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class MySecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	// Step 1: You can use the following to get the route URI $request->pathh() or use $request->is()
    	$path = $request->path();
    	Log::info("Entering MySecurityMiddleware.handle() at path: " . $path);
    	
    	// Step 2: Run business rules that check for the URI's that you don't need to secure
    	$secureCheck = true;
    	
    	if($request->is('/') || $request->is('loginvalidate') || $request->is('dologin3') || $request->is('login') || $request->is('dologin') || $request->is('usersrest') || $request->is('usersrest/0') || $request->is('rest') || $request->is('rest/0')) {
    		$secureCheck = false;
    	}
    	
    	Log::info($secureCheck ? "In SecurityMiddleware.handle() -> Needs security" : "In SecurityMiddleware.handle() -> No security needed");
    	
    	// Step 3: If entering a security URI with no security token, do a redirect to the login page
    	if(session()->get('security') == 'enabled') {
    		return $next($request);
    	}
    	if($secureCheck) {
    		Log::info("Leaving the MySecurityMiddleware.handle() doing a redirect to login");
    		return redirect('/login');
    	}
    	
    	return $next($request);
    }
}
