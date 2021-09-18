<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        /*total communites*/
        $totalCommunities = User::where('role_id',2)->count();

        /*total users*/
        $totalUsers = User::where('role_id',3)->count();

        /*total donations*/
        $totalDonations = Donation::count();

        /*total messages*/
        $totalMessages = Message::count();

        /*total notifications*/
        $totalNotifications = Campaign::count();
        return view('admin.dashboard',compact('totalCommunities','totalUsers','totalDonations','totalMessages','totalNotifications'));
    }
}
