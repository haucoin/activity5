<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class MyTestMiddleware
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
    	Log::info("Entering MyTestMiddleware.handle()");
    	
    	// Using the data cache in laravel
    	// Step 1: Get an instance of one of the caches (in this case, the file)
    	// Step 2: Get a value from the cache, and if the value isnt there put it in the cache
    	if($request->username != null) {
    		Log::info("Username is not null. It is: " . $request->username);
    		$value = Cache::store("file")->get("mydata");
    		if($value == null) {
    			Log::info("Caching first time username for: " . $request->username);
    			Cache::store("file")->put("mydata", $request->username, 1);
    		}
    	}
    	else {
    		$value = Cache::store("file")->get("mydata");
    		if($value != null) {
    			Log::info("Getting username from cache for: " . $value);
    		}
    		else {
    			Log::info("Could not get username from cache (data is older than 1 minute)");
    		}
    	}
    	
        return $next($request);
    }
}
