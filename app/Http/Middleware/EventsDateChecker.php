<?php

namespace App\Http\Middleware;

use App\Models\Event;
use Closure;
use DateTime;
use Illuminate\Http\Request;

class EventsDateChecker
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
        
        $url = $request->url();

        $now = new DateTime();

        $explodedWord = explode('/', $url);

        $eventId = (int) $explodedWord[4];

        $event = Event::findOrFail($eventId);

        $eventDate = new DateTime($event->date);

        $dateDiff = $now->diff($eventDate);

        if ($dateDiff->invert == 1) {
            Event::where('id', $eventId)->update(['expired' => 0]);
        }
        
        return $next($request);
    }
}
