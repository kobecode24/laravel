<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ReservationTimeOut
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $last_reservation = $user->reservations()->latest()->first();
        if($last_reservation && now()->diffInDays($last_reservation->reservation_date) < 7 ) {
            return redirect()->route('dashboard')->with('error', 'you most wait for 7 days after your last reservation');
        }
        return $next($request);
    }
}
