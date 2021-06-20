<?php

namespace App\Http\Controllers;

use App\Report;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    protected $fileUploadService;

    public function __construct()
    {
        $this->fileUploadService = new FileUploadService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $reports = Report::all();

        return view('reports.index', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $file = $this->fileUploadService->uploadFile($request, Report::path());

        $report = new Report();

        $report->name = $request->name;
        $report->month = $request->month;
        $report->entries = $request->entries;
        $report->exits = $request->exits;
        $report->balance = $request->entries - $request->exits;
        $report->file_id = $file->id;

        $report->save();

        toast('Relatório cadastrado com sucesso!','success');

        return redirect()->route('reports.index');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
