<?php

namespace App\Helpers;

use App\Models\Store;
use App\Models\HistoryBalance;

class Balance
{
    public static function insert($store_id, $nominal, $debit_or_credit, $keterangan)
    {
        $store = Store::find($store_id);
        // dd($store);
        if ($store != NULL) {
            $data['store_id'] = $store->id;
            $data['saldo_awal'] = intval($store->saldo);
            $data['nominal'] = intval($nominal);
            if ($debit_or_credit == 'credit') {
                $data['debit_or_credit'] = 'credit';
                $data['saldo_akhir'] = ($data['saldo_awal'] - $data['nominal']);
            } else {
                $data['debit_or_credit'] = 'debit';
                $data['saldo_akhir'] = ($data['saldo_awal'] + $data['nominal']);
            }

            $data['keterangan'] = $keterangan;

            try {
                $store->saldo = $data['saldo_akhir'];
                $store->save();

                $history = HistoryBalance::create($data);
                return $history;
            } catch (\Throwable $th) {
                return $th;
            }
        }
    }
}
