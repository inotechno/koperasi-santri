<?php

namespace App\Helpers;

use App\Models\ProductVisits;
use Jenssegers\Agent\Agent;


class ProductVisit
{
    public static function insert($product_id, $user_id = null)
    {
        $data['product_id'] = $product_id;
        $agent = new Agent();

        $data['user_agent'] = $agent->getUserAgent();
        $data['device'] = $agent->device();
        $data['platform'] = $agent->platform();
        $data['browser'] = $agent->browser();
        $data['ip'] = request()->ip();
        $data['user_id'] = $user_id;

        try {
            ProductVisits::create($data);
            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
