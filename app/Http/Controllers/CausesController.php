<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use App\Models\RankCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CausesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $filterCampaigns = Campaign::distinct()->pluck('city');

       /* $campaigns = DB::table('campaigns')
            ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
            ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
            ->select('campaigns.*','categories.id as category_id','categories.name as category_name', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
            ->groupBy('campaigns.id')
            ->get();*/
        $campaigns = array();

        $rankedCampaigns = RankCampaign::pluck('campaign_id')->toArray();

        $originalCampaigns = Campaign::pluck('id')->toArray();

        $mergedBothCampaigns = array_merge($rankedCampaigns, $originalCampaigns);

        $finallyShowingCampaigns = array_unique($mergedBothCampaigns);

        $arrayOfCampaignsToString = implode(",",$finallyShowingCampaigns);

        foreach ($categories as $category)
        {
            $campaignsByCategory = DB::table('campaigns')
                ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
                ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
                ->select('campaigns.*','categories.id as category_id','categories.name as category_name', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
                ->groupBy('campaigns.id','campaigns.category_id')
                ->where('campaigns.category_id',$category->id)
                ->whereIn('campaigns.id', $finallyShowingCampaigns)
                ->orderByRaw(DB::raw("FIELD(campaigns.id, $arrayOfCampaignsToString )"))
                ->get();
            if(sizeof($campaignsByCategory)) {
                $campaignsByCategory = $campaignsByCategory->take(3);
                $campaigns[$category->id] = $campaignsByCategory;
            }
        }


        return view('latest-causes',compact('campaigns','categories','filterCampaigns'));
    }

    public function show(Campaign $cause)
    {
        $calculatedCause = DB::table('campaigns')
            ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
            ->leftJoin('users', 'campaigns.user_id', '=', 'users.id')
            ->select('campaigns.*','users.*', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
            ->groupBy('campaigns.id')
            ->where('campaigns.id',$cause->id)
            ->get();

        $categories = Category::all();
        $campaigns = Campaign::latest()->limit(3)->get();
        return view('single-cause',compact(['cause','calculatedCause', 'categories','campaigns']));
    }

    public function search(Request $request)
    {
        $categories = Category::all();

        $filterCampaigns = Campaign::distinct()->pluck('city');

        $rankedCampaigns = RankCampaign::pluck('campaign_id')->toArray();

        $originalCampaigns = Campaign::pluck('id')->toArray();

        $mergedBothCampaigns = array_merge($rankedCampaigns, $originalCampaigns);

        $finallyShowingCampaigns = array_unique($mergedBothCampaigns);

        $arrayOfCampaignsToString = implode(",",$finallyShowingCampaigns);

        $campaigns = array();

        if($request->search_category)
        {
            /*$campaigns = DB::table('campaigns')
                ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
                ->select('campaigns.*', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
                ->groupBy('campaigns.id')
                ->where('category_id',$request->search_category)
                ->get();*/

            foreach ($categories as $category)
            {
                $campaignsByCategory = DB::table('campaigns')
                    ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
                    ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
                    ->select('campaigns.*','categories.id as category_id','categories.name as category_name', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
                    ->groupBy('campaigns.id','campaigns.category_id')
                    ->where(['campaigns.category_id'=>$category->id, 'category_id' => $request->search_category])
                    ->whereIn('campaigns.id', $finallyShowingCampaigns)
                    ->orderByRaw(DB::raw("FIELD(campaigns.id, $arrayOfCampaignsToString )"))
                    ->get();
                if(sizeof($campaignsByCategory)) {
                    $campaignsByCategory = $campaignsByCategory->take(3);
                    $campaigns[$category->id] = $campaignsByCategory;
                }
            }

            return view('latest-causes',compact('campaigns','categories','filterCampaigns'));
        }
        if ($request->search_location)
        {

            /*$campaigns = DB::table('campaigns')
                ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
                ->select('campaigns.*', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
                ->groupBy('campaigns.id')
                ->where('campaigns.city',$request->search_location)
                ->get();*/

            foreach ($categories as $category)
            {
                $campaignsByCategory = DB::table('campaigns')
                    ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
                    ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
                    ->select('campaigns.*','categories.id as category_id','categories.name as category_name', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
                    ->groupBy('campaigns.id','campaigns.category_id')
                    ->where(['campaigns.category_id'=>$category->id, 'city' => $request->search_location])
                    ->whereIn('campaigns.id', $finallyShowingCampaigns)
                    ->orderByRaw(DB::raw("FIELD(campaigns.id, $arrayOfCampaignsToString )"))
                    ->get();
                if(sizeof($campaignsByCategory)) {
                    $campaignsByCategory = $campaignsByCategory->take(3);
                    $campaigns[$category->id] = $campaignsByCategory;
                }
            }

            return view('latest-causes',compact('campaigns','categories','filterCampaigns'));
        }

            return 'not found';

    }

    public function rankedCauses()
    {
        $categories = Category::all();

        $filterCampaigns = Campaign::all()->pluck('location');

        $rankedCampaigns = RankCampaign::pluck('campaign_id')->toArray();

        $campaigns = DB::table('campaigns')
            ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
            ->select('campaigns.*', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
            ->groupBy('campaigns.id')
            ->whereIn('campaigns.id',$rankedCampaigns)
            ->get();

        return view('ranked-causes',compact('campaigns','categories','filterCampaigns'));
    }

    public function moreCampaigns($searchId)
    {
        $categories = Category::all();

        $filterCampaigns = Campaign::distinct()->pluck('city');

        $rankedCampaigns = RankCampaign::pluck('campaign_id')->toArray();

        $originalCampaigns = Campaign::pluck('id')->toArray();

        $mergedBothCampaigns = array_merge($rankedCampaigns, $originalCampaigns);

        $finallyShowingCampaigns = array_unique($mergedBothCampaigns);

        $arrayOfCampaignsToString = implode(",",$finallyShowingCampaigns);

        $campaigns = DB::table('campaigns')
            ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
            ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
            ->select('campaigns.*', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
            ->groupBy('campaigns.id')
            ->where('categories.id',$searchId)
            ->whereIn('campaigns.id', $finallyShowingCampaigns)
            ->orderByRaw(DB::raw("FIELD(campaigns.id, $arrayOfCampaignsToString )"))
            ->get();
//        dd($campaigns);

        return view('more-causes',compact('campaigns','categories','filterCampaigns'));

    }
}
