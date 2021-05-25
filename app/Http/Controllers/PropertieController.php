<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertieRequest;
use App\Propertie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $properties = Propertie::all();

        return view('properties.index', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PropertieRequest $request
     * @return RedirectResponse
     */
    public function store(PropertieRequest $request): RedirectResponse
    {
        Propertie::create($request->all());

        toast('Patrimônio cadastrado com sucesso!','success');

        return redirect()->route('properties.index');
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
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        $propertie = Propertie::find($id);

        return view('properties.edit', ['propertie' => $propertie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PropertieRequest $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(PropertieRequest $request, int $id): RedirectResponse
    {
        $propertie = Propertie::find($id);

        $propertie->update($request->all());

        toast('Patrimônio atualizado com sucesso!','success');

        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $propertie = Propertie::find($id);

        $propertie->delete();

        toast('Patrimônio removido com sucesso!','success');

        return redirect()->route('properties.index');
    }
}
