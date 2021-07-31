<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrayerRequestResource;
use App\PrayerRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Cache;

class PrayerRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): AnonymousResourceCollection
    {
        $key = 'requests_index';

        PrayerRequestResource::withoutWrapping();
        if (Cache::has($key)) {
            return PrayerRequestResource::collection(Cache::get($key));
        }

        $pedidos = PrayerRequest::orderBy('created_at')->get();
        Cache::put($key, $pedidos);

        return PrayerRequestResource::collection($pedidos);
    }

    public function store(Request $request): JsonResponse
    {
        $pedido = new PrayerRequest();

        $pedido->member_id = auth()->user()->id;
        $pedido->date = $request->input('date');
        $pedido->description = $request->input('description');

        $pedido->save();

        Cache::forget('requests_index');

        return response()->json(['message' => 'Pedido cadastrado com sucesso!']);
    }

    public function show(PrayerRequest $prayerRequest)
    {
        PrayerRequestResource::withoutWrapping();
        $key = md5(serialize($prayerRequest));
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $pedido = PrayerRequestResource::make($prayerRequest);

        Cache::put($key, $pedido, Carbon::now()->addDay());

        return $pedido;
    }
}
