<?php

namespace App\Http\Controllers;

use App\Event;
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
        $random_verse = $this->bibleService->getRandomVerse();

        $members = Member::all();
        $men = $members->where('gender_id', '=', '1')->count();
        $woman = $members->where('gender_id', '=', '2')->count();
        $total_members = $members->count();

        $visitors = Visitor::all();
        $tithes = Tithe::all();
        $events = Event::all()->count();

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
        $data['member_tithe'] = $member_tithe;
        $data['events'] = $events;

        return view('dashboard', compact('data'));
    }
}
