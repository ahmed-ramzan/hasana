<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\RankCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminCampaignsController extends Controller
{

    public function index()
    {
//        $campaigns = Campaign::all();

        $campaigns = DB::table('campaigns')
            ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
            ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
            ->leftJoin('users', 'campaigns.user_id', '=', 'users.id')
            ->select('campaigns.*','categories.name as catname','users.name as ownername', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
            ->groupBy('campaigns.id')
            ->orderBy('campaigns.id','DESC')
            ->get();

//        dd($campaigns);

        return view('admin.campaigns.index',compact('campaigns'));
    }



    public function show(Campaign $camp)
    {
        return view('admin.campaigns.show',compact('camp'));
    }



    public function notifications()
    {
        $notifications = Campaign::with('user')->orderBy('id','DESC')->get();

        return json_encode($notifications);
    }

    public function rank()
    {
        $campaigns = Campaign::all();

        $rankedCampaigns = RankCampaign::pluck('campaign_id')->toArray();

        return view('admin.rank-campaigns.index',compact('campaigns','rankedCampaigns'));
    }

    public function storeRanking(Request $request)
    {
        $checkboxes = $request->checkboxes;


        $rankedCampaigns = RankCampaign::all()->pluck('campaign_id')->toArray();

        foreach ($rankedCampaigns as $ranked)
        {
            RankCampaign::where('campaign_id',$ranked)->delete();
        }

        if($checkboxes==[])
        {
            return redirect()->back()->with('error','at least select one campaign');
        }
        foreach ($checkboxes as $checkbox)
        {
                RankCampaign::create([
                    'campaign_id' => $checkbox
                ]);
        }



        /*foreach ($checkboxes as $checkbox)
        {
            RankCampaign::create([
                'campaign_id' => $checkbox
            ]);
        }*/

        return redirect()->back()->with('success','Selected Campaigns Ranked On Top Successfully');
    }

}
