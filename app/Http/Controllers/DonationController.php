<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function index($id)
    {
        $perPersonFund = Campaign::where('id',$id)->pluck('per_person_fund');
        $goal = Campaign::where('id',$id)->pluck('goal');


        if(!auth()->check())
        {
            return redirect()->back()->with('message','You Have To Login First!');
        }
        return view('donations.donation',compact('id','perPersonFund','goal'));
    }

    public function store(Request $request)
    {
       /* $perPersonFund = Campaign::where('id',$request->donation_id)->first();
        $perPersonFund = intval($perPersonFund->per_person_fund);
        $amount = intval($request->amount);

        if($amount > $perPersonFund)
        {
            return redirect()->back()->with('errorMessage','You cannot donate more than per person fund');
        }*/

        Donation::create([
            'campaign_id' => $request->donation_id,
            'donor_id' => Auth::user()->id,
            'amount' => $request->amount
        ]);

        return redirect()->back()->with('message','You Donated '.$request->amount.' Rs for better world');
    }
}
