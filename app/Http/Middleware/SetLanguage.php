<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('locale')){
            app()->setLocale(Session::get('locale'));
        }
       /* if(Session::has('locale')){

            $current_locale= Session::get('locale');//get saved session locale value

            App::setLocale($current_locale); // set app localization with locale value session

            Carbon::setLocale($current_locale); //set carbon localization for date/time system with locale value session
        }
        else{

            $app_locale = session('locale', config('app.locale')); // set session locale with app localization setting & return the locale value
            Carbon::setLocale($app_locale);//set carbon localization with current app localization configuration

        }*/


        return $next($request);
    }
}
