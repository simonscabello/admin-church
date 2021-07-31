<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $key = 'events_index';

        EventResource::withoutWrapping();
        if (Cache::has($key)) {
            return EventResource::collection(Cache::get($key));
        }

        $events = Event::orderBy('created_at')->get();
        Cache::put($key, $events);

        return EventResource::collection($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Event  $event
     * @return EventResource
     */
    public function show(Event $event): EventResource
    {
        EventResource::withoutWrapping();
        $key = md5(serialize($event));
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $evento = EventResource::make($event);

        Cache::put($key, $evento, Carbon::now()->addDay());

        return $evento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Event  $event
     * @return JsonResponse
     */
    public function update(Request $request, Event $event): JsonResponse
    {
        if ($event->registered_participants >= $event->max_participants) {
            return response()->json(['message' => 'Não há mais vagas disponíveis para esse evento.']);
        }

        $event->registered_participants++;
        $event->save();

        $event->members()->attach($request->member_id);

        Cache::forget('events_index');

        return response()->json(['message' => 'Membro cadastrado no evento com sucesso!']);
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
