<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\ProductCategory;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        // Paginator::useBootstrapFive();
        // Paginator::useBootstrapFour();
        view()->composer('*', function ($view) {
            $_category = ProductCategory::all()->load('product_sub_category');

            if (Auth::check()) {
                $_cart = Cart::where('user_id', Auth::id())->where('checkout_at', null)->get();
                $_cart = $_cart->map(function ($cart) {
                    $cart->subdistrict = $cart->product->store->user->useraddress->where('store_address', "on")->map(function ($add) {
                        return $add;
                    });

                    return $cart;
                });
            } else {
                $_cart = null;
            }

            // dd($_cart);

            //...with this variable
            $view->with(['_cart' => $_cart, '_category' => $_category]);
        });
    }
}
