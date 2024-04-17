<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Controllers\Api\BaseController;

class CheckoutController extends BaseController
{
    public function index()
    {
        $cart = Cart::all();
        return $this->sendResponse(CartResource::collection($cart), 'Cart retrieved successfully');
    }
}
