<?php

namespace App\Http\Controllers;

use Balance;
use App\Models\Order;
use App\Models\Rating;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Royryando\Duitku\Facades\Duitku;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index', [
            'title' => 'Daftar Transaksi'
        ]);
    }

    public function detail($order_id)
    {
        $order = Order::with('paymentdetail')
            ->with('deliverydetail')
            ->with('deliverydetail.to')
            ->with('deliverydetail.from')
            ->with('orderitem')
            ->with('orderitem.product')
            ->with('store')
            ->where('order_number', $order_id)->first();

        // dd($order);
        if ($order != NULL) {

            $order->duitku = Duitku::checkInvoiceStatus($order_id);

            return view('order.order-detail', [
                'title' => 'Order Detail #' . $order_id,
                'order' => $order
            ]);
        }

        return redirect('/');

        // dd($order);
    }

    public function pending(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::whereHas('paymentdetail', function ($query) {
                return $query->where('expiration_date', '>=', date('Y-m-d H:i:s'))->where('status_code', 201);
            })
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('store')
                ->where('user_id', auth()->user()->id)
                ->where('cancel_time', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('store_name', function (Order $order) {
                    return $order->store->name;
                })
                ->addColumn('bank', function (Order $order) {
                    return $order->paymentdetail->payment_name;
                })
                ->addColumn('va_number', function (Order $order) {
                    return $order->paymentdetail->va_number;
                })
                ->addColumn('link', function ($row) {
                    return '<a href="' . route('order.detail', $row->order_number) . '">#' . $row->order_number . '</a>';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Cancel
                                            </a>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection', 'link'])
                ->make(true);
        } else {
            return view('order.order-pending', [
                'title' => 'Menunggu Pembayaran'
            ]);
        }
    }

    public function terbayar(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::whereHas('paymentdetail', function ($query) {
                return $query->where('status_code', 200);
            })
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('store')
                ->where('user_id', auth()->user()->id)
                ->where('process_time', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('paid_date', function (Order $order) {
                    return $order->paymentdetail->paid_date;
                })
                ->addColumn('store_name', function (Order $order) {
                    return $order->store->name;
                })
                ->addColumn('bank', function (Order $order) {
                    return $order->paymentdetail->payment_name;
                })
                ->addColumn('va_number', function (Order $order) {
                    return $order->paymentdetail->va_number;
                })
                ->addColumn('link', function ($row) {
                    return '<a href="' . route('order.detail', $row->order_number) . '">#' . $row->order_number . '</a>';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Cancel
                                            </a>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection', 'link'])
                ->make(true);
        }
    }

    public function diproses(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::whereHas('paymentdetail', function ($query) {
                return $query->where('status_code', 200);
            })
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('store')
                ->where('user_id', auth()->user()->id)
                ->where('process_time', '!=', NULL)
                ->where('shipping_time', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('store_name', function (Order $order) {
                    return $order->store->name;
                })
                ->addColumn('bank', function (Order $order) {
                    return $order->paymentdetail->payment_name;
                })
                ->addColumn('va_number', function (Order $order) {
                    return $order->paymentdetail->va_number;
                })
                ->addColumn('link', function ($row) {
                    return '<a href="' . route('order.detail', $row->order_number) . '">#' . $row->order_number . '</a>';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Cancel
                                            </a>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection', 'link'])
                ->make(true);
        }
    }

    public function dikirim(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::whereHas('paymentdetail', function ($query) {
                return $query->where('status_code', 200);
            })
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('store')
                ->where('user_id', auth()->user()->id)
                ->where('shipping_time', '!=', NULL)
                ->where('accepted_time', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('store_name', function (Order $order) {
                    return $order->store->name;
                })
                ->addColumn('bank', function (Order $order) {
                    return $order->paymentdetail->payment_name;
                })
                ->addColumn('va_number', function (Order $order) {
                    return $order->paymentdetail->va_number;
                })
                ->addColumn('link', function ($row) {
                    return '<a href="' . route('order.detail', $row->order_number) . '">#' . $row->order_number . '</a>';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Cancel
                                            </a>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection', 'link'])
                ->make(true);
        }
    }

    public function selesai(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::whereHas('paymentdetail', function ($query) {
                return $query->where('status_code', 200);
            })
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('store')
                ->where('user_id', auth()->user()->id)
                ->where('accepted_time', '!=', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('store_name', function (Order $order) {
                    return $order->store->name;
                })
                ->addColumn('bank', function (Order $order) {
                    return $order->paymentdetail->payment_name;
                })
                ->addColumn('va_number', function (Order $order) {
                    return $order->paymentdetail->va_number;
                })
                ->addColumn('link', function ($row) {
                    return '<a href="' . route('order.detail', $row->order_number) . '">#' . $row->order_number . '</a>';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Cancel
                                            </a>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection', 'link'])
                ->make(true);
        }
    }

    public function batal(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::whereHas('paymentdetail', function ($query) {
                return $query->where('status_code', 201)->where('expiration_date', '<=', date('Y-m-d H:i:s'));
            })
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('store')
                ->where('user_id', auth()->user()->id)
                ->orWhere('cancel_time', '!=', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('store_name', function (Order $order) {
                    return $order->store->name;
                })
                ->addColumn('bank', function (Order $order) {
                    return $order->paymentdetail->payment_name;
                })
                ->addColumn('va_number', function (Order $order) {
                    return $order->paymentdetail->va_number;
                })
                ->addColumn('link', function ($row) {
                    return '<a href="' . route('order.detail', $row->order_number) . '">#' . $row->order_number . '</a>';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Cancel
                                            </a>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection', 'link'])
                ->make(true);
        } else {
            return view('order.order-pending', [
                'title' => 'Menunggu Pembayaran'
            ]);
        }
    }

    public function diterima(Request $request)
    {
        // dd($request);
        $order = Order::with('paymentdetail')->where('id', $request->id)->first();
        // dd($order->grand_total . ' - ' . $order->paymentdetail->fee . ' - ' . $order->ppn);
        if ($order != null) {
            try {
                Balance::insert($order->store_id, $order->grand_total, 'debit', 'Pesanan dari order <a href="' . route('order.detail', $order->order_number) . '">#' . $order->order_number . '</a>');
                Balance::insert($order->store_id, $order->paymentdetail->fee, 'credit', 'Admin fee <a href="">#' . $order->order_number . '</a>');
                Balance::insert($order->store_id, $order->ppn, 'credit', 'PPN dari order <a href="' . route('order.detail', $order->order_number) . '">#' . $order->order_number . '</a>');
                Balance::insert($order->store_id, $order->disc, 'debit', 'Debit from discount voucher <a href="' . route('order.detail', $order->order_number) . '">#' . $order->order_number . '</a>');
                // dd($insertFee);

                foreach ($request->product_id as $key => $value) {
                    $rating = [
                        'order_id' => $order->id,
                        'product_id' => $request->product_id[$key],
                        'nilai' => $request->nilai[$key],
                        'catatan' => $request->catatan[$key]
                    ];

                    $rating = Rating::create($rating);
                }

                // dd($rating);
                $order->accepted_time = date('Y-m-d H:i:s');
                $order->save();
            } catch (\Throwable $th) {
                $request->session()->flash('error', $th);
            }

            $request->session()->flash('success', 'Pesanan berhasil diterima !');
        } else {
            $request->session()->flash('error', 'Pesanan gagal diterima, silahkan coba kembali !');
        }

        return back();
    }

    public function checkResi($resi = null, $expedition = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => 'waybill=' . $resi . '&courier=' . $expedition,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . env('RAJAONGKIR_API_KEY')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function countPending()
    {
        try {
            $order = Order::where('user_id', Auth::id())->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 201)->where('expiration_date', '>=', date('Y-m-d H:i:s'));
            })->count();

            // dd($order);
            return response()->json([
                'success' => true,
                'data'  => $order
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data'  => $e->getMessage()
            ]);
        }
    }

    public function countTransaction()
    {
        $data = [];

        try {
            $data['settlement'] = Order::where('user_id', Auth::id())->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 200);
            })->where('process_time', NULL)->count();

            $data['process'] = Order::where('user_id', Auth::id())->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 200);
            })->where('process_time', '!=', NULL)->where('shipping_time', NULL)->count();

            $data['sending'] = Order::where('user_id', Auth::id())->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 200);
            })->where('shipping_time', '!=', NULL)->where('accepted_time', NULL)->count();

            $data['finish'] = Order::where('user_id', Auth::id())->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 200);
            })->where('accepted_time', '!=', NULL)->count();

            $data['cancel'] = Order::where('user_id', Auth::id())->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 201)->where('expiration_date', '<=', date('Y-m-d H:i:s'));
            })->orWhere('cancel_time', '!=', NULL)->count();

            // dd($data);
            return response()->json([
                'success' => true,
                'data'  => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data'  => $e->getMessage()
            ]);
        }
    }
}
