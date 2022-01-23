<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceTempRequest;
use App\Http\Requests\StoreServiceTempRequest;
use App\Models\ServiceTemp;
use Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceTempController extends Controller
{
    public function store(Request $request)
    {
        $orderList = '';
        $total = 0;
        try {
            $serviceTemp = ServiceTemp::create($request->all());
            if($serviceTemp){
                $order = ServiceTemp::where('order_code','=',$request->order_code)->get();
            }
        } catch (\Throwable $th) {
            Log::info($th);
        }
        if($order){
            foreach ($order as $service) {
            $orderList .= '<li class="list-group-item d-flex justify-content-between lh-condensed"><div><h6 class="my-0">'.$service->service_name.'</h6></div> <span class="text-muted">Rp. '.number_format($service->price).'</span></li>';
            }
        }
        $total = ServiceTemp::where('order_code','=',$request->order_code)->sum('price');

       
        return response()->json([
            'orderList' => $orderList,
            'totalBayar' => ($total !== 0 ) ? number_format($total) : 0,
            'priceCount' => $total
        ]);
    }

    public function destroy(Request $request)
    {
        $orderList = '';
        $total = 0;
        try {
            $serviceTemp = ServiceTemp::where('ids','=',$request->ids)->delete();
            if($serviceTemp){
                $order = ServiceTemp::where('order_code','=',$request->order_code)->get();
            }
        } catch (\Throwable $th) {
            Log::info($th);
        }
        if($order){
            foreach ($order as $service) {
                $orderList .= '<li class="list-group-item d-flex justify-content-between lh-condensed"><div><h6 class="my-0">'.$service->service_name.'</h6></div> <span class="text-muted">Rp. '.number_format($service->price).'</span></li>';
            }
        }
       
        $total = ServiceTemp::where('order_code','=',$request->order_code)->sum('price');

       
        return response()->json([
            'orderList' => $orderList,
            'totalBayar' => ($total !== 0 ) ? number_format($total) : 0,
            'priceCount' => $total
        ]);
    }

    public function delete(Request $request)
    {
        $res = ServiceTemp::where('order_code','=',$request->order_code)->delete();
        return response()->json($res, 200);
    }
}