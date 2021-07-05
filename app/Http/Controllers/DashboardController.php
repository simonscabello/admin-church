<?php

namespace App\Http\Controllers;

use App\Member;
use App\Report;
use App\Services\BibleApiService;
use App\Tithe;
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
        $total_members = $members->count();

        $visitors = Visitor::all();

        $random_verse = $this->bibleService->getRandomVerse();

        $reports = Report::all();
        $entries = $reports->sum('entries');
        $exits = $reports->sum('exits');
        $tithes = Tithe::all();

        $member_tithe = 0;
        foreach ($tithes as $key => $tithe) {
            if(in_array($tithe->id, $members->toArray()[$total_members - 1])) {
                $member_tithe++;
            }
        }

        $data = [];
        $data['members'] = $members;
        $data['men'] = $men;
        $data['woman'] = $woman;
        $data['visitors'] = $visitors;
        $data['random_verse'] = $random_verse;
        $data['entries'] = $entries;
        $data['exits'] = $exits;
        $data['member_tithe'] = $member_tithe;

        return view('dashboard', compact('data'));
    }
}
