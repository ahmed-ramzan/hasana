<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendCredentialsToCommunity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AddCommunityController extends Controller

{
    public function index()
    {
        $communities = User::where('role_id',2)->get();

        return view('admin.communities.index',compact('communities'));
    }


    public function create()
    {
        return view('admin.communities.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'phone' => 'required|max:10|unique:users',
            'city' => 'required',
            'district' => 'required',
            'cnic' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8'
        ]);

          User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'district' => $request->district,
            'cnic' => $request->cnic,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


          Mail::to($request->email)->send(new SendCredentialsToCommunity($request->name, $request->email, $request->password));

        return redirect(route('communities.index'))->with('success','Community Added Successfully and mail was sent');
    }




    public function edit(User $community)
    {
        return view('admin.communities.edit',compact('community'));
    }

    public function update(Request $request, User $community)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8'
        ]);


            $community->update([
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            Mail::to($request->email)->send(new SendCredentialsToCommunity($request->name, $request->email, $request->password));



        return redirect(route('communities.index'))->with('success','Community Updated Successfully');

    }


    public function destroy(User $community)
    {
        $community->delete();
        return redirect(route('communities.index'))->with('success','Community Removed Successfully');
    }
}
