<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Donation;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{

    public function index()
    {
//        $campaigns = Campaign::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();

        $campaigns = DB::table('campaigns')
            ->leftJoin('donations', 'campaigns.id', '=', 'donations.campaign_id')
            ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
            ->select('campaigns.*','categories.name as category_name', (DB::raw('SUM(donations.amount) as raised, FLOOR(SUM(donations.amount)*100/campaigns.goal) as percentage')))
            ->groupBy('campaigns.id')
            ->where('campaigns.user_id',Auth::user()->id)
            ->orderBy('campaigns.id','DESC')
            ->get();
//        dd($campaignProgress);

        return view('communities.campaigns.index',compact('campaigns'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('communities.campaigns.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required|string|max:255',
            'goal' => 'required',
            'per_person_fund' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'city' => 'required',
            'district' => 'required',
        ]);

        if($request->per_person_fund>$request->goal)
        {
            return redirect()->back()->with('error','per person fund must be less than goal');
        }

        $imagePath = $request->image->store('campaigns');

        Campaign::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'goal' => $request->goal,
            'per_person_fund' => $request->per_person_fund,
            'description' => $request->description,
            'image' => $imagePath,
            'city' => $request->city,
            'district' => $request->district
        ]);

        return redirect(route('campaigns.index'))->with('success','Campaign Created Successfully');
    }


    public function show(Campaign $campaign)
    {
        return view('communities.campaigns.show',compact('campaign'));
    }


    public function edit(Campaign $campaign)
    {
        $categories = Category::all();
        return view('communities.campaigns.edit',compact(['campaign','categories']));
    }


    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required|string|max:255',
            'goal' => 'required',
            'per_person_fund' => 'required',
            'description' => 'required',
            'city' => 'required',
            'district' => 'required',
        ]);

        if($request->per_person_fund>$request->goal)
        {
            return redirect()->back()->with('error','per person fund must be less than goal');
        }

        if($request->hasFile('image'))
        {
            $request->validate(['image' => 'image|mimes:jpg,png,jpeg|max:2048']);
            $imagePath = $request->image->store('campaigns');
        }
        else
        {
            $imagePath = $campaign->image;
        }

        $campaign->update([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'goal' => $request->goal,
            'per_person_fund' => $request->per_person_fund,
            'description' => $request->description,
            'image' => $imagePath,
            'city' => $request->city,
            'district' => $request->district
        ]);

        return redirect(route('campaigns.index'))->with('success','Campaign Updated Successfully');
    }


    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        Storage::delete($campaign->image);

        return redirect(route('campaigns.index'))->with('success','Campaign Removed Successfully');
    }

    public function notifications($id)
    {
        $notifications = Donation::with('users')->where('campaign_id', $id)->orderBy('id','DESC')->get();


        return json_encode($notifications);
    }
}
