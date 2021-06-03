<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\DepartmentRequest;
use App\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $departments = Department::with('member')->get();

        return view('departments.index', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $members = Member::all();

        return view('departments.create', ['members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentRequest $request): RedirectResponse
    {
        Department::create($request->all());

        toast('Departamento cadastrado com sucesso!','success');

        return redirect()->route('departments.index');
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
        $department = Department::find($id);
        $members = Member::all();

        $department->load('member');

        return view('departments.edit', ['department' => $department, 'members' => $members]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(DepartmentRequest $request, Department $department): RedirectResponse
    {
        $department->update($request->all());

        toast('Departamento atualizado com sucesso!','success');

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $department = Department::find($id);

        $department->delete();

        toast('Departamento removido com sucesso!', 'success');

        return redirect()->route('departments.index');
    }
}
