<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Http\Resources\MemberResource;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Cache;

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
        $key = 'members_index';

        MemberResource::withoutWrapping();
        if (Cache::has($key)) {
            return MemberResource::collection(Cache::get($key));
        }

        $members = Member::orderBy('name')->get();
        Cache::put($key, $members);

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

        Cache::forget('members_index');

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
        $key = md5(serialize($member));
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $membro = MemberResource::make($member);

        Cache::put($key, $membro, Carbon::now()->addDay());

        return $membro;
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

        Cache::forget('members_index');

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
