<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\RecordRequest;
use App\Record;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RecordController extends Controller
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
        $records = Record::with('file')->get();

        return view('records.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(RecordRequest $request): RedirectResponse
    {
        $file = $this->fileUploadService->uploadFile($request, Record::path());

        $record = new Record();

        $record->number = $request->number;
        $record->date = $request->date;
        $record->file_id = $file->id;

        $record->save();

        toast('Ata cadastrada com sucesso!','success');

        return redirect()->route('records.index');
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
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $record = Record::find($id);

        $record->file->delete();
        $record->delete();

        toast('Ata removida com sucesso!','success');

        return redirect()->route('records.index');
    }
}
