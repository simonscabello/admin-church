<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Http\Resources\MemberResource;
use App\Member;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $members = Member::orderBy('name')->get();

        MemberResource::withoutWrapping();
        return MemberResource::collection($members);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MemberRequest $request
     * @return JsonResponse
     */
    public function store(MemberRequest $request): JsonResponse
    {
        Member::create($request->all());

        return response()->json(['message' => 'Membro cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Member $member
     * @return MemberResource
     */
    public function show(Member $member): MemberResource
    {
        MemberResource::withoutWrapping();
        return MemberResource::make($member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MemberRequest $request
     * @param Member $member
     * @return JsonResponse
     */
    public function update(MemberRequest $request, Member $member): JsonResponse
    {
        if (auth()->user()->id != $member->id) {
            return response()->json(['message' => 'Não consegue né moisés'], 401);
        }
        $member->update($request->all());

        return response()->json(['message' => 'Dados atualizados com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
