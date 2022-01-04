<?php

namespace App\Imports;

use App\Models\ExcellUp;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;


class ExcellImport implements ToModel
{
    /**
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */



    public function model(array $data)
    {
        return new ExcellUp([
            //
            'added_user_id' => 0,
            'coin_name' => $data[1],
            'coin_img' => $data[2],
            'chain' => $data[5],
            'symbol' => $data[4],
            'network_chain' => $data[5],
            'project_phase' => $data[6],
            'contract_addr' => $data[7],
            'chart_link' => $data[8],
            'swap_link' => $data[9],
            'web_link' => $data[10],
            'telegram_link' => $data[11],

            'twitter_link' => $data[12],
            'discord_link' => $data[13],
            'coin_mrkt_link' => $data[14],
            'coin_geko_link' => $data[15],
            'poo_coin' => $data[16],
            'flooz_trade' => $data[17],
            'launch' => $data[18],
            'description' => $data[19],
            'marketcap' => $data[20],
            'price_usd' => $data[21],

            // 'votes_total' => $data[22],
            // 'today_votes' => $data[23],
            'voting_date' => $data[24],
            // 'watchlist' => $data[25],
            'status' => $data[26],
            'action_status' => '',
            'promote_position' => 0,
            'time' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),

        ]);
    }
}
