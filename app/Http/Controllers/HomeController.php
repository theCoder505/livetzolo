<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //



    public function showInHome()
    {

        $totalCoins = DB::table('coininfos')->count();
        $totalVotes = DB::table('coininfos')->sum('votes_total');
        $totalUsers = DB::table('user_data')->count();
        $totalInfluencers = DB::table('user_data')->where('user_type', 'influencer')->count();
        $totalVoters = DB::table('user_data')->where('user_type', 'voter')->count();
        $totalCoinOwners = DB::table('user_data')->where('user_type', 'owner')->count();

        return view('home', compact('totalCoins', 'totalVotes', 'totalUsers', 'totalInfluencers', 'totalVoters', 'totalCoinOwners'));
    }
}
