<?php

namespace App\Http\Middleware;

use Exception;
use App\Models\User;
use App\Actions\Teams\RetrieveCurrentSessionTeam;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HandlePermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     * @throws Exception
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = auth()->user();
        $currentTeam = app(RetrieveCurrentSessionTeam::class)->handle();

        Inertia::share('role', $user->teamRole($currentTeam));

        Inertia::share('permissions', $user->teamPermissions($currentTeam));

        return $next($request);
    }
}
