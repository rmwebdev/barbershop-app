<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barbershop;
use App\Models\Stylist;
use App\Models\Service;
use App\Models\Setting;
use App\Models\ServiceBooking;
use App\Models\ServiceTemp;
use Log;
use App\Http\Requests\StoreServiceBookingRequest;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = null;

        $data = Setting::find(1);
        if($data){
            $setting = $data;
        }
        $barbershops = Barbershop::orderBy('created_at', 'desc')->take(3)->get();
        $stylists = Stylist::orderBy('created_at', 'desc')->take(4)->get();
        $services = Service::orderBy('created_at', 'desc')->take(8)->get();
        return view('frontend.index',compact(['barbershops','services', 'stylists','setting']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function geraiBarber()
    {

        $barbershops = Barbershop::with(['services', 'media'])->paginate(3);       
        return view('frontend.gerai', compact('barbershops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function geraiSingle($slug)
    {
        $barbershop = Barbershop::where('slug','=', $slug)->first();
        $barbershop->load('services');
        
        $stylists = Stylist::where('barbershop_id','=', $barbershop['id'])->get();

        return view('frontend.gerai-detail', compact(['barbershop', 'stylists']));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function services()
    {
        $services = Service::with(['media'])->paginate(4);
        return view('frontend.services', compact('services'));
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicesSingle($slug)
    {
        
        $service = Service::where('slug','=' ,$slug)->first();
        $barbershops = $service->barbershops()->wherePivot('service_id', $service->id)
              ->get();
        return view('frontend.service-detail', compact(['service', 'barbershops']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderNow()
    {
        $barbershops = Barbershop::all()->pluck('name', 'id')->prepend('Pilih Barbershop', '');
        $stylists = [];
        $services = [];
        return view('frontend.order-form', compact([
            'barbershops',
            'stylists',
            'services'
        ]));
    }

    public function orderDetail(Request $request){

        $email = ServiceBooking::where('email', '=', $request->email)->where('status', '=', 'Proses')->first();
        
        
        $request->request->add(['status' => 'Proses']);
        if(!$email){
            try {
                $serviceBooking = ServiceBooking::create($request->all());
                $serviceBooking->services()->sync($request->input('services', []));
    
                Log::info($serviceBooking);
    
                ServiceTemp::where('order_code','=',$request->order_code)->delete();
                $notification = array(
                    'message' => 'Data order anda sudah terkirim, tunggu konfirmasi dari kami!',
                    'alert-type' => 'success'
                );
    
            } catch (\Exception $e){
                // do task when error
                // echo $e->getMessage();
                ServiceTemp::where('order_code','=',$request->order_code)->delete();
                $notification = array(
                    'message' => 'Error saat mengirim data, coba lagi nanti!',
                    'alert-type' => 'error'
                );
            }
            return redirect()->route('welcome')->with($notification);;
        } else{
            $notification = array(
                'message' => 'Anda sudah order tunggu konfirmasi dari kami!',
                'alert-type' => 'warning'
            );
            return redirect()->route('welcome')->with($notification);;
        }
        

    }

    public function dataFormOrder(Request $request){
        if (!$request->barbershop_id) {
            $stylists = '<option value=""> Pilih Tukang Cukur</option>';
            $services = '<label class="check"> <input type="checkbox" checked> <span>Tidak Ada service</span></label>';
        } else {
            $stylists = '';
            $stylistsData = Stylist::where('barbershop_id','=', $request->barbershop_id)->get();
            foreach ($stylistsData as $stylist) {
                $stylists .= '<option value="'.$stylist->id.'">'.$stylist->name.'</option>';
            }
            $services = '';
            $barbershop = Barbershop::where('id','=', $request->barbershop_id)->first();
            $barbershop->load('services');
            foreach ($barbershop->services as $service) {
                $services .= '<label class="check mr-2"><input class="serviceCheck" type="checkbox" onClick="checkService('. $service->id .','. $service->price .')" name="services[]" id="services_'.$service->id.'" value="'.$service->id.'"><span id="span_'.$service->id.'">'.$service->name.'</span></label>';
            }
        }
    
        return response()->json([
            'stylists' => $stylists,'services' => $services,
        ]);
    }
   
}
