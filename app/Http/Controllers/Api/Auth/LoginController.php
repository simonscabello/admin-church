<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $member = Member::where('birth_day', $request->birth_day)->first();

        if (! $member || $request->cpf != $member->cpf) {
            return response()->json(['message' => 'Dados inválidos.'], 403);
        }

        $token = $member->createToken($member->name)->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
