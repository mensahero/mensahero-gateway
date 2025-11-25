<?php

namespace App\Http\Controllers\Teams;

use App\Actions\Teams\RetrieveCurrentSessionTeam;
use App\Http\Controllers\Controller;
use App\Http\Resources\Teams\TeamsMenuResource;
use App\Models\Team;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TeamsController extends Controller
{
    public function getTeams(): JsonResponse
    {
        $user = auth()->user();

        $teams = $user->allTeams();

        return response()->json([
            'teams' => $teams,
        ]);
    }

    public function getTeamMenus(): JsonResponse
    {
        $user = auth()->user();

        $teams = $user->allTeams();

        return response()->json(TeamsMenuResource::collection($teams));
    }

    /**
     * @throws Exception
     */
    public function getCurrentTeam(): JsonResponse
    {
        return response()->json([
            'current_team' => app(RetrieveCurrentSessionTeam::class)->handle(),
        ]);
    }

    public function setCurrentTeam(Request $request): JsonResponse
    {
        $request->validate([
            'team' => ['required', 'exists:teams,id'],
        ]);

        $team = Team::query()->findOrFail($request->team);
        if (! $team) {
            ValidationException::withMessages([
                'team' => 'The team does not exist',
            ]);
        }

        $request->user()->switchTeam($team);

        return response()->json([
            'message' => 'Team switched successfully',
        ]);

    }
}
