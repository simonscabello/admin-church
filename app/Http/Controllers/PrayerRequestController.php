<?php

namespace App\Http\Controllers;

use App\PrayerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrayerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $requests = PrayerRequest::orderBy('created_at')->get();

        return view('prayer-requests.index', ['requests' => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param PrayerRequest $prayerRequest
     * @return Response
     */
    public function show(PrayerRequest $prayerRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PrayerRequest $prayerRequest
     * @return Response
     */
    public function edit(PrayerRequest $prayerRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $pedido = PrayerRequest::find($id);
        $pedido->response = $request->response;
        $pedido->save();

        toast('Resposta enviada com sucesso!','success');

        return redirect()->route('prayer.requests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PrayerRequest $prayerRequest
     * @return Response
     */
    public function destroy(PrayerRequest $prayerRequest)
    {
        //
    }
}
