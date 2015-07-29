<?php namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\RedirectResponse;

class CmsAdminValidation {

	public function handle($request, Closure $next)
	{
	  
    if(! Session::has('is_admin')){
      
      return new RedirectResponse(url('user/login'));
      
    }
    
		return $next($request);
	}

}
