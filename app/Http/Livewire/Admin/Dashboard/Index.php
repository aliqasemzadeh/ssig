<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.data.kava.io/txs?tx.height=537553',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $txs = (json_decode($response,true)['txs']);
        foreach ($txs as $tx) {
            $msgs = ($tx['tx']['value']['msg']);
            echo $tx['tx']['value']['memo'];
            foreach ($msgs as $msg) {
                if($msg['type'] == 'cosmos-sdk/MsgSend') {
                    if($msg['value']['to_address'] == 'kava1ys70jvnajkv88529ys6urjcyle3k2j9r24g6a7') {
                        echo ($msg['value']['amount'][0]['amount']);
                        echo ($msg['value']['amount'][0]['denom']);
                    }
                }
            }
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.data.kava.io/txs?tx.height=567205',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $txs = (json_decode($response,true)['txs']);

        foreach ($txs as $tx) {
            $msgs = ($tx['tx']['value']['msg']);
            echo $tx['tx']['value']['memo'];
            foreach ($msgs as $msg) {
                if($msg['type'] == 'pricefeed/MsgPostPrice') {
                    echo $msg['value']['price'];
                }
            }
        }

        return view('livewire.admin.dashboard.index')->layout('layouts.admin');
    }
}
