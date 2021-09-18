<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        /*count the total campaigns of currently login community*/
        $totalCampaigns = Campaign::where('user_id', Auth::user()->id)->count();

        /*count the total donations of currently login community*/
       $totalDonations = Campaign::where('user_id', Auth::user()->id)->get();
        $items = array();
        foreach ($totalDonations as $donation)
        {
            $items[] = $donation->donations->count();
        }
        $countTotalDonations = array_sum($items);

        return view('communities.dashboard', compact('totalCampaigns','countTotalDonations'));
    }
}
