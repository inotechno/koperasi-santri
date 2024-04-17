<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\VouchersUsers;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function check(Request $request)
    {
        $voucher = Voucher::where('code', $request->code)->first();

        $voucher_max = VouchersUsers::where('voucher_id', $voucher->id)->count();
        $voucher_max_user = $voucher->users()->count();
        // dd($voucher_max);

        if ($voucher_max > $voucher->max_uses || $voucher_max_user > $voucher->max_uses_user) {
            return response()->json([
                'success' => false,
                'message'   => 'Voucher sudah habis pakai'
            ]);
        }

        if ($request->total <= $voucher->minimum_order) {
            return response()->json([
                'success' => false,
                'message'   => 'Minimal order Rp ' . number_format($voucher->minimum_order)
            ]);
        }

        $data['type_slug'] = $voucher->type->slug;
        $data['type_name'] = $voucher->type->name;
        $data['voucher_code'] = $voucher->code;
        $data['voucher_id'] = $voucher->id;
        $data['minimum_order'] = $voucher->minimum_order;

        if ($voucher->discount_nominal != NULL) {
            $data['price_disc'] = 'Rp. ' . number_format($voucher->discount_nominal);
        } elseif ($voucher->discount_percentage != NULL) {
            $data['price_disc'] = $voucher->discount_percentage . '%';
        }

        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'Voucher berhasil digunakan'
        ], 200);
    }
}
