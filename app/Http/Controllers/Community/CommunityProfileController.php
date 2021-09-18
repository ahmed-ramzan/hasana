<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommunityProfileController extends Controller
{
    public function create()
    {
        $community = User::where('id',Auth::user()->id)->first();

        return view('communities.profile.create',compact('community'));
    }

    public function update(Request $request, $id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'city' => $request->city,
                'district' => $request->district,
                'cnic' => $request->cnic,
            ]);

        return redirect()->back()->with('success','Profile Updated Successfully');
    }
}
