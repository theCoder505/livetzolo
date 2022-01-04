<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UpdateController extends Controller
{
    //



    public function getAllUpdates()
    {

        $joined = DB::table('coininfos')->join('coins_update', 'coininfos.id', '=', 'coins_update.coin_id')
            ->where('coins_update.status', 'waiting')->orderBy('coins_update.sno', 'asc')
            ->get();
        return view('normalpages.update', compact('joined'));
    }






    public function getParticularCoinData($coinSno)
    {
        $getParticularCoin = DB::table('coins_update')->where('status', 'waiting')->where('sno', $coinSno)->get();

        // return response()->json([
        //     'partCoin' => $getParticularCoin
        // ]);

        $coinId = DB::table('coins_update')->where('status', 'waiting')->where('sno', $coinSno)->value('coin_id');
        return view('normalpages.updateform', compact('getParticularCoin', 'coinId', 'coinSno'));
    }



    public function cancelRequestMethod($cancelId)
    {
        $cancelled = DB::table('coins_update')->where('sno', $cancelId)->update([
            'status' => 'cancelled'
        ]);

        if ($cancelled) {
            return response()->json([
                'resp' => 'done'
            ]);
        }
    }





    public function updateCoin(Request $request)
    {

        $actionId = $request->coinUniqueId;
        $upInfoDbSerial = $request->upsno;

        $reqimgLocation = $request->imgLocation;
        $reqcoinName = $request->coinName;
        $reqcoinSymbol = $request->coinSymbol;
        $reqnetwork = $request->network;
        $reqpresalePhase = $request->presalePhase;
        $reqlaunchDate = $request->launchDate;
        $reqcontractAddr = $request->contractAddr;
        $reqdesc = $request->desc;
        $reqboggedLink = $request->boggedLink;
        $reqswapLink = $request->swapLink;
        $reqwebLink = $request->webLink;
        $reqtelLink = $request->telLink;
        $reqtwitLink = $request->twitLink;
        $reqdiscordLink = $request->discordLink;


        if ($reqimgLocation == '') {
            $reqimgLocation = DB::table('coininfos')->where('id', $actionId)->value('coin_img');
        }

        if ($reqcoinName == '') {
            $reqcoinName = DB::table('coininfos')->where('id', $actionId)->value('coin_name');
        }

        if ($reqcoinSymbol == '') {
            $reqcoinSymbol = DB::table('coininfos')->where('id', $actionId)->value('symbol');
        }

        if ($reqnetwork == '') {
            $reqnetwork = DB::table('coininfos')->where('id', $actionId)->value('network_chain');
        }

        if ($reqpresalePhase == '') {
            $reqpresalePhase = DB::table('coininfos')->where('id', $actionId)->value('project_phase');
        }

        if ($reqlaunchDate == '') {
            $reqlaunchDate = DB::table('coininfos')->where('id', $actionId)->value('launch');
        }

        if ($reqcontractAddr == '') {
            $reqcontractAddr = DB::table('coininfos')->where('id', $actionId)->value('contract_addr');
        }

        if ($reqdesc == '') {
            $reqdesc = DB::table('coininfos')->where('id', $actionId)->value('description');
        }

        if ($reqboggedLink == '') {
            $reqboggedLink = DB::table('coininfos')->where('id', $actionId)->value('chart_link');
        }

        if ($reqswapLink == '') {
            $reqswapLink = DB::table('coininfos')->where('id', $actionId)->value('swap_link');
        }

        if ($reqwebLink == '') {
            $reqwebLink = DB::table('coininfos')->where('id', $actionId)->value('web_link');
        }

        if ($reqtelLink == '') {
            $reqtelLink = DB::table('coininfos')->where('id', $actionId)->value('telegram_link');
        }

        if ($reqtwitLink == '') {
            $reqtwitLink = DB::table('coininfos')->where('id', $actionId)->value('twitter_link');
        }

        if ($reqdiscordLink == '') {
            $reqdiscordLink = DB::table('coininfos')->where('id', $actionId)->value('discord_link');
        }



        $updateQuery = DB::table('coininfos')->where('id', $actionId)->update([
            'coin_img' => $reqimgLocation,
            'coin_name' => $reqcoinName,
            'symbol' => $reqcoinSymbol,
            'network_chain' => $reqnetwork,
            'project_phase' => $reqpresalePhase,
            'launch' => $reqlaunchDate,
            'contract_addr' => $reqcontractAddr,
            'description' => $reqdesc,
            'chart_link' => $reqboggedLink,
            'swap_link' => $reqswapLink,
            'web_link' => $reqwebLink,
            'telegram_link' => $reqtelLink,
            'twitter_link' => $reqtwitLink,
            'discord_link' => $reqdiscordLink,
        ]);



        if ($updateQuery) {

            $approvalinfo = DB::table('coins_update')->where('sno', $upInfoDbSerial)->update([
                'status' => 'approved',
            ]);

            if ($approvalinfo) {
                return Redirect::back()->with('successmsg', 'Coin Data Updated Successfully');
            } else {
                return Redirect::back()->with('errormsg', 'Could not save Approval! Try again Later!...');
            }
        } else {
            return Redirect::back()->with('errormsg', 'Could not save Updates! Try again Later!...');
        }
    }
}
