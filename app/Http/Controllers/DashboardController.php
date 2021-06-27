<?php

namespace App\Http\Controllers;

use App\Member;
use App\Report;
use App\Services\BibleApiService;
use App\Visitor;
use GuzzleHttp\Client;

class DashboardController extends Controller
{
    protected $bibleService;

    public function __construct()
    {
        $this->bibleService = new BibleApiService();
    }

    public function index()
    {
        $members = Member::all();
        $men = $members->where('gender_id', '=', '1')->count();
        $woman = $members->where('gender_id', '=', '2')->count();
        $visitors = Visitor::all();
        $random_verse = $this->bibleService->getRandomVerse();
        $reports = Report::all();
        $entries = $reports->sum('entries');
        $exits = $reports->sum('exits');

        $data['members'] = $members;
        $data['men'] = $men;
        $data['woman'] = $woman;
        $data['visitors'] = $visitors;
        $data['random_verse'] = $random_verse;
        $data['entries'] = $entries;
        $data['exits'] = $exits;

        return view('dashboard', compact('data'));
    }
}
