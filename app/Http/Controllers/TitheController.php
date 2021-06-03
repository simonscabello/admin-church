<?php

namespace App\Http\Controllers;

use App\Http\Requests\TitheRequest;
use App\Member;
use App\Tithe;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TitheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $tithes = Tithe::with('member')->get();

        return view('tithes.index', ['tithes' => $tithes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $members = Member::all();

        return view('tithes.create', ['members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TitheRequest $request
     * @return RedirectResponse
     */
    public function store(TitheRequest $request): RedirectResponse
    {
        Tithe::create($request->all());

        toast('Contribuição cadastrada com sucesso!','success');

        return redirect()->route('tithes.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $tithe = Tithe::find($id);
        $members = Member::all();

        $tithe->load('member');

        return view('tithes.edit', ['tithe' => $tithe, 'members' => $members]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TitheRequest $request
     * @param Tithe $tithe
     * @return RedirectResponse
     */
    public function update(TitheRequest $request, Tithe $tithe): RedirectResponse
    {
        $tithe->update($request->all());

        toast('Dízimo atualizado com sucesso!','success');

        return redirect()->route('tithes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $tithe = Tithe::find($id);

        $tithe->delete();

        toast('Contribuição removida com sucesso!', 'success');

        return redirect()->route('tithes.index');
    }
}
