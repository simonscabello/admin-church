<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorRequest;
use App\Visitor;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $visitors = Visitor::all();

        return view('visitors.index', ['visitors' => $visitors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('visitors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VisitorRequest $request
     * @return RedirectResponse
     */
    public function store(VisitorRequest $request): RedirectResponse
    {
        Visitor::create($request->all());

        toast('Visitante cadastrado com sucesso!','success');

        return redirect()->route('visitors.index');
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
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $visitor = Visitor::find($id);

        return view('visitors.edit', ['visitor' => $visitor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VisitorRequest $request
     * @param Visitor $visitor
     * @return RedirectResponse
     */
    public function update(VisitorRequest $request, Visitor $visitor): RedirectResponse
    {
        $visitor->update($request->all());

        toast('Visitante atualizado com sucesso!','success');

        return redirect()->route('visitors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Visitor $visitor
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Visitor $visitor): RedirectResponse
    {
        $visitor->delete();

        toast('Visitante removido com sucesso!','success');

        return redirect()->route('visitors.index');
    }
}
