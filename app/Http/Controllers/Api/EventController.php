<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Api;

use App\Event;
use App\EventMember;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $events = Event::all();

        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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

//        $event_member = new EventMember();
//        $event_member->member_id = $request->member_id;
//        $event_member->event_id = $id;
//        $event_member->save();

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
