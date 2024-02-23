<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSchoolAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        // dd($user);
        if($user && $user->school)
        {
            $requestSchoolName = $request->route('name');
            $requestedUserId = $request->route('id');
            //dd($requestSchoolName,$requestedUserId);

            // dd($user->school->name != $requestSchoolName || $user->id != $requestedUserId);
            
            if($user->school->name != $requestSchoolName || $user->id != $requestedUserId)
            {
                // return redirect('/login');
                //dd('fuck');
                return redirect()->back();
            }
        }
        return $next($request);
    }
}
