<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $campaigns = DB::table('campaigns')
            ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
            ->select('campaigns.*', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
            ->groupBy('campaigns.id')
            ->orderBy('campaigns.id','DESC')
            ->take(9)
            ->get();

        return view('welcome',compact('campaigns'));
    }
}
