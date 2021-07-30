<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Api;

use App\Event;
use App\EventMember;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $events = Event::orderBy('created_at')->get();

        // TODO: Resource
        return response()->json($events);
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
     * @return JsonResponse
     */
    public function show(Event $event): JsonResponse
    {
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $event = Event::find($id);

        if ($event->registered_participants >= $event->max_participants) {
            return response()->json(['message' => 'Não há mais vagas disponíveis para esse evento.']);
        }

        $event->registered_participants++;
        $event->save();

        $event->members()->attach($request->member_id);

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
