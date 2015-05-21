<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;


class RedirectToInstall {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next){
            $path = App::basePath();
            $file_setting=$path."/config/dbsetting.php";
                if (!file_exists($file_setting)){
                    return redirect('install');
                }
            
            return $next($request);
	}

}
