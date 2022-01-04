<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AllCoinController extends Controller
{




    public function getAllCoin()
    {

        $getCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->get();

        return view('normalpages.allcoins', compact('getCoins'));
    }
    //

    public function getCoinAjaxData()
    {
        $getCoins = DB::table('coininfos')->orderBy('votes_total', 'desc')->get();

        return response()->json([
            'allCoins' => $getCoins
        ]);
    }



    public function particularCoinData($coinId)
    {
        $getParticularCoin = DB::table('coininfos')->where('id', $coinId)->get();

        return response()->json([
            'partCoin' => $getParticularCoin
        ]);
    }



    public function saveEdits(Request $request)
    {
        $postedcoinUniqueId = $request->coinUniqueId;
        $postedaddProfileImg = $request->addProfileImg;
        $postedcoinName = $request->coinName;
        $postedcoinSymbol = $request->coinSymbol;
        $postednetwork = $request->network;
        $postedpresalePhase = $request->presalePhase;
        $postedlaunchDate = $request->launchDate;
        $postedcontractAddr = $request->contractAddr;
        $posteddesc = $request->desc;
        $postedmarketCap = $request->marketCap;
        $postedpriceusd = $request->priceusd;
        $postedboggedLink = $request->boggedLink;
        $postedcoinmrkt = $request->coinmrkt;
        $postedcoinGeko = $request->coinGeko;
        $postedpooCoin = $request->pooCoin;
        $postedswapLink = $request->swapLink;
        $postedfloozTrade = $request->floozTrade;
        $postedwebLink = $request->webLink;
        $postedtelLink = $request->telLink;
        $postedtwitLink = $request->twitLink;
        $posteddiscordLink = $request->discordLink;


        if (!(empty($postedaddProfileImg))) {


            $validate = $request->validate([
                'addProfileImg' => 'required|mimes:jpg,png,jpeg,gif'
            ]);

            if ($validate) {
                $storeLocation = $request->file('addProfileImg')->store('public/coinimages');
                if ($storeLocation) {
                    $photoName = explode('/', $storeLocation)[2];
                    $host = $_SERVER['HTTP_HOST'];
                    $imgLocation = 'http://' . $host . '/storage/coinimages/' . $photoName;
                    $postedaddProfileImg = $imgLocation;
                } else {
                    return Redirect::back()->with('errormsg', 'Could not save Image! Try again later!...');
                }
            } else {
                return Redirect::back()->with('errormsg', 'Use particular image file [like mimes:jpg, png, jpeg, gif ]!');
            }
        } else {
            $postedaddProfileImg = DB::table('coininfos')->where('id', $postedcoinUniqueId)->value('coin_img');
        }


        if ($postedpresalePhase == '') {
            $postedpresalePhase = DB::table('coininfos')->where('id', $postedcoinUniqueId)->value('project_phase');
        }


        $save = DB::table('coininfos')->where('id', $postedcoinUniqueId)->update([
            'coin_img' => $postedaddProfileImg,
            'coin_name' => $postedcoinName,
            'symbol' => $postedcoinSymbol,
            'network_chain' => $postednetwork,
            'project_phase' => $postedpresalePhase,
            'launch' => $postedlaunchDate,
            'contract_addr' => $postedcontractAddr,
            'marketcap' => $postedmarketCap,
            'price_usd' => $postedpriceusd,
            'description' => $posteddesc,
            'chart_link' => $postedboggedLink,
            'coin_mrkt_link' => $postedcoinmrkt,
            'coin_geko_link' => $postedcoinGeko,
            'poo_coin' => $postedpooCoin,
            'swap_link' => $postedswapLink,
            'flooz_trade' => $postedfloozTrade,
            'web_link' => $postedwebLink,
            'telegram_link' => $postedtelLink,
            'twitter_link' => $postedtwitLink,
            'discord_link' => $posteddiscordLink,
        ]);

        if ($save) {
            return Redirect::back()->with('successmsg', 'Coin editted successfully!');
        } else {
            return Redirect::back()->with('errormsg', 'Could not save edits! Try again Later!...');
        }
    }








    public function deleteCoin($deletingId)
    {
        $delete = DB::table('coininfos')->where('id', $deletingId)->delete();
        if ($delete) {
            return "deleted";
        } else {
            return "Could not delete";
        }
    }
}
