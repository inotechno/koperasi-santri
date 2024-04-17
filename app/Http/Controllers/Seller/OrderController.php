<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Order;
use App\Models\Store;

class OrderController extends Controller
{
    public function index()
    {
        return view('seller.order.index', [
            'title' => 'Daftar Transaksi'
        ]);
    }

    public function pending(Request $request)
    {
        if ($request->ajax()) {
            // $store = Store::where('user_id', auth()->user()->id)->first();

            $order = Order::whereHas('paymentdetail', function ($query) {
                return $query->where('expiration_date', '>=', date('Y-m-d H:i:s'))->where('status_code', 201);
            })
                ->whereHas('store', function ($query) {
                    return $query->where('user_id', auth()->user()->id);
                })
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('user')
                ->where('cancel_time', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('customer_name', function (Order $order) {
                    return $order->user->name;
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

    public function terbayar(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::whereHas('paymentdetail', function ($query) {
                return $query->where('status_code', 200);
            })
                ->whereHas('store', function ($query) {
                    return $query->where('user_id', auth()->user()->id);
                })
                ->with('paymentdetail')
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('user')
                ->where('process_time', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('paid_date', function (Order $order) {
                    return $order->paymentdetail->paid_date;
                })
                ->addColumn('customer_name', function (Order $order) {
                    return $order->user->name;
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
            $order = Order::whereHas('store', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })
                ->with('paymentdetail')
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('user')
                ->where('process_time', '!=', NULL)
                ->where('shipping_time', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('customer_name', function (Order $order) {
                    return $order->user->name;
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
            $order = Order::whereHas('store', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })
                ->with('paymentdetail')
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('user')
                ->where('shipping_time', '!=', NULL)
                ->where('accepted_time', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('customer_name', function (Order $order) {
                    return $order->user->name;
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
                ->whereHas('store', function ($query) {
                    return $query->where('user_id', auth()->user()->id);
                })
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('user')
                ->where('accepted_time', '!=', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('customer_name', function (Order $order) {
                    return $order->user->name;
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
            // $store = Store::where('user_id', auth()->user()->id)->first();

            $order = Order::whereHas('paymentdetail', function ($query) {
                return $query->where('expiration_date', '<=', date('Y-m-d H:i:s'))->where('status_code', 201);
            })
                ->whereHas('store', function ($query) {
                    return $query->where('user_id', auth()->user()->id);
                })
                ->with('deliverydetail')
                ->with('deliverydetail.to')
                ->with('deliverydetail.from')
                ->with('orderitem')
                ->with('orderitem.product')
                ->with('user')
                ->orWhere('cancel_time', '!=', NULL);

            // dd($order);
            return DataTables::eloquent($order)
                ->addIndexColumn()
                ->addColumn('customer_name', function (Order $order) {
                    return $order->user->name;
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

    public function process(Request $request)
    {
        $order = Order::whereHas('store', function ($query) {
            return $query->where('user_id', auth()->user()->id);
        })->where('id', $request->id)->first();

        if ($order != null) {
            $order->process_time = date('Y-m-d H:i:s');
            $order->save();

            $request->session()->flash('success', 'Transaksi berhasil diproses !');
        } else {
            $request->session()->flash('error', 'Transaksi gagal diproses, silahkan coba kembali !');
        }

        return back();
    }

    public function cancel(Request $request)
    {
        $order = Order::whereHas('store', function ($query) {
            return $query->where('user_id', auth()->user()->id);
        })->where('id', $request->id)->first();

        if ($order != null) {
            $order->cancel_time = date('Y-m-d H:i:s');
            $order->save();

            $request->session()->flash('success', 'Transaksi berhasil dibatalkan !');
        } else {
            $request->session()->flash('error', 'Transaksi gagal dibatalkan, silahkan coba kembali !');
        }

        return back();
    }

    public function sending(Request $request)
    {
        $validatedData = $request->validate([
            'resi_number' => 'required|max:25|min:5'
        ]);

        $order = Order::with('deliverydetail')->find($request->id);
        // dd($order);
        try {
            $order->shipping_time = date('Y-m-d H:i:s');
            $order->save();

            if (!empty($request->expedition)) {
                $validatedData['expedition'] = $request->expedition;
                $validatedData['expedition_service'] = $request->expedition_service;
            }

            $order->deliverydetail()->update($validatedData);

            $request->session()->flash('success', 'Pesanan berhasil diubah !');
        } catch (\Throwable $th) {
            $request->session()->flash('error', 'Pesanan gagal diubah !');
        }

        return back();
    }

    public function countTransaction()
    {
        $data = [];

        try {
            $data['pending'] = Order::whereHas('store', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })->whereHas('paymentdetail', function ($q) {
                return $q->where('expiration_date', '>=', date('Y-m-d H:i:s'))->where('status_code', 201);
            })->where('cancel_time', NULL)->count();

            $data['settlement'] = Order::whereHas('store', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 200);
            })->where('process_time', NULL)->count();

            $data['process'] = Order::whereHas('store', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 200);
            })->where('process_time', '!=', NULL)->where('shipping_time', NULL)->count();

            $data['sending'] = Order::whereHas('store', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 200);
            })->where('shipping_time', '!=', NULL)->where('accepted_time', NULL)->count();

            $data['finish'] = Order::whereHas('store', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })->whereHas('paymentdetail', function ($q) {
                return $q->where('status_code', 200);
            })->where('accepted_time', '!=', NULL)->count();

            $data['cancel'] = Order::whereHas('store', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })->whereHas('paymentdetail', function ($q) {
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
