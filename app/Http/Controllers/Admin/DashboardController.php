<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth\User\User;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = 0;
        $product_code = '';
        $product_coduni = '';
        $product_name ='';
        $vendor_code ='';
        $form_data = [$product_code, $product_coduni, $product_name, $vendor_code, $code];
        return view('home.index', compact('form_data'));
    }

    public function saveData(Request $request){

        $codpro = $request->input('codpro');
        $prod_name = $request->input('prod_name');
        $coduni = $request->input('coduni');
        $codprv = $request->input('codprv');

        $base_pro = 1;
        $umb = $request->input('umb');
        $ean = $request->input('ean');
        $net_weight_base_pro = $request->input('net_weight_base_pro');
        $gross_weight_base_pro = $request->input('gross_weight_base_pro');
        $long_base_pro = $request->input('long_base_pro');
        $width_base_pro = $request->input('width_base_pro');
        $height_base_pro = $request->input('height_base_pro');
        $volume_base_pro = $request->input('volume_base_pro');

        $manage_inner_pack = $request->input('manage_inner_pack') == 'on' ? 1 : 0;
        $umb_inner_pack = $request->input('umb_inner_pack');
        $dun_inner_pack = $request->input('dun_inner_pack');
        $net_weight_inner_pack = $request->input('net_weight_inner_pack');
        $gross_weight_inner_pack = $request->input('gross_weight_inner_pack');
        $long_inner_pack = $request->input('long_inner_pack');
        $width_inner_pack = $request->input('width_inner_pack');
        $height_inner_pack = $request->input('height_inner_pack');
        $volume_inner_pack = $request->input('volume_inner_pack');

        $handle_master_box = $request->input('handle_master_box') == 'on' ? 1 : 0;
        $umb_manage_box = $request->input('umb_manage_box');
        $dun_manage_box = $request->input('dun_manage_box');
        $net_weight_manage_box = $request->input('net_weight_manage_box');
        $gross_weight_manage_box = $request->input('gross_weight_manage_box');
        $long_manage_box = $request->input('long_manage_box');
        $width_manage_box = $request->input('width_manage_box');
        $height_manage_box = $request->input('height_manage_box');
        $volume_manage_box = $request->input('volume_manage_box');

        $handle_layer = $request->input('handle_layer') == 'on' ? 1 : 0;
        $umb_layer = $request->input('umb_layer');
        $dun_layer = $request->input('dun_layer');
        $net_weight_layer = $request->input('net_weight_layer');
        $gross_weight_layer = $request->input('gross_weight_layer');
        $long_layer = $request->input('long_layer');
        $width_layer = $request->input('width_layer');
        $height_layer = $request->input('height_layer');
        $volume_layer = $request->input('volume_layer');

        $handle_pallet = $request->input('handle_pallet') == 'on' ? 1 : 0;
        $umb_pallet = $request->input('umb_pallet');
        $dun_pallet = $request->input('dun_pallet');
        $net_weight_pallet = $request->input('net_weight_pallet');
        $gross_weight_pallet = $request->input('gross_weight_pallet');
        $long_pallet = $request->input('long_pallet');
        $width_pallet = $request->input('width_pallet');
        $height_pallet = $request->input('height_pallet');
        $volume_pallet = $request->input('volume_pallet');

        $ump = $request->input('ump');
        $transport_group = $request->input('transport_group');
        $lead_time = $request->input('lead_time');
        $main_supplier = $request->input('main_supplier');
        $workweek = $request->input('workweek');

        $product_with_expiration = $request->input('product_with_expiration') == 'on' ? 1 : 0;
        $special_storage_of_product = $request->input('special_storage_of_product');
        $sun_exposure = $request->input('sun_exposure') == 'on' ? 1 : 0;
        $temperature = $request->input('temperature');
        $humidity = $request->input('humidity') == 'on' ? 1 : 0;
        $lifetime_product_base = $request->input('lifetime_product_base');


        $product = Product::where('codpro', '=', $codpro)->first();

        if ($product == NULL) {
            $product = new Product();
        }

        $product->codpro = $codpro;
        $product->prod_name = $prod_name;
        $product->coduni = $coduni;
        $product->codprv = $codprv;

        $product->base_pro = $base_pro;
        $product->umb = $umb;
        $product->ean13 = $ean;
        $product->net_weight_base_pro = $net_weight_base_pro;
        $product->gross_weight_base_pro = $gross_weight_base_pro;
        $product->long_base_pro = $long_base_pro;
        $product->width_base_pro = $width_base_pro;
        $product->height_base_pro = $height_base_pro;
        $product->volume_base_pro = $volume_base_pro;

        $product->manage_inner_pack = $manage_inner_pack;
        $product->umb_inner_pack = $umb_inner_pack;
        $product->dun_inner_pack = $dun_inner_pack;
        $product->net_weight_inner_pack = $net_weight_inner_pack;
        $product->gross_weight_inner_pack = $gross_weight_inner_pack;
        $product->long_inner_pack = $long_inner_pack;
        $product->width_inner_pack = $width_inner_pack;
        $product->height_inner_pack = $height_inner_pack;
        $product->volume_inner_pack = $volume_inner_pack;

        $product->handle_master_box = $handle_master_box;
        $product->umb_manage_box = $umb_manage_box;
        $product->dun_manage_box = $dun_manage_box;
        $product->net_weight_manage_box = $net_weight_manage_box;
        $product->gross_weight_manage_box = $gross_weight_manage_box;
        $product->long_manage_box = $long_manage_box;
        $product->width_manage_box = $width_manage_box;
        $product->height_manage_box = $height_manage_box;
        $product->volume_manage_box = $volume_manage_box;

        $product->handle_layer = $handle_layer;
        $product->umb_layer = $umb_layer;
        $product->dun_layer = $dun_layer;
        $product->net_weight_layer = $net_weight_layer;
        $product->gross_weight_layer = $gross_weight_layer;
        $product->long_layer = $long_layer;
        $product->width_layer = $width_layer;
        $product->height_layer = $height_layer;
        $product->volume_layer = $volume_layer;

        $product->handle_pallet = $handle_pallet;
        $product->umb_pallet = $umb_pallet;
        $product->dun_pallet = $dun_pallet;
        $product->net_weight_pallet = $net_weight_pallet;
        $product->gross_weight_pallet = $gross_weight_pallet;
        $product->long_pallet = $long_pallet;
        $product->width_pallet = $width_pallet;
        $product->height_pallet = $height_pallet;
        $product->volume_pallet = $volume_pallet;

        $product->ump = $ump;
        $product->transport_group = $transport_group;
        $product->lead_time = $lead_time;
        $product->main_supplier = $main_supplier;
        $product->workweek = $workweek;

        $product->product_with_expiration = $product_with_expiration;
        $product->special_storage_of_product = $special_storage_of_product;
        $product->sun_exposure = $sun_exposure;
        $product->temperature = $temperature;
        $product->humidity = $humidity;
        $product->lifetime_product_base = $lifetime_product_base;
        
        $product->save();
        return redirect('admin')->with('message', 'Successfully Saved');

    }

    public function searchable_api(Request $request) {
        $api_filter_field = '';
        $api_filter_val = '';
        $user_rut = $request->input('rut');
        if ($request->input('codpro') != null) {
            $api_filter_field = 'codpro';
            $api_filter_val = $request->input('codpro');
        };
        if ($request->input('coduni') != null) {
            $api_filter_field = 'coduni';
            $api_filter_val = $request->input('coduni');
        };
        if ($request->input('codprv') != null) {
            $api_filter_field = 'codprv';
            $api_filter_val = $request->input('codprv');
        };
        $baseurl = "http://api.dimerc.cl/portal_bi/public/publicas/verifyProductByProviderRut/";
        $url = $baseurl.$user_rut.'/'.$api_filter_val.'/'.$api_filter_field;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // Set so curl_exec returns the result instead of outputting it.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Get the response and close the channel.
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);
        if ($data->code == '200') {
            $code = $data->code;
            $product_code = $data->response[0]->product_code;
            $product_coduni = $data->response[0]->product_coduni;
            $product_name = $data->response[0]->product_name;
            $vendor_code = $data->response[0]->vendor_code;

            $form_data = [$product_code, $product_coduni, $product_name, $vendor_code, $code];
            $product = Product::where('codpro', '=', $product_code)->first();
            // var_dump($product);
            // exit();
            // if (!$product) {
            //     return redirect('home.index', compact('form_data', 'product'));
            // }
            // else{

                return view('home.index', compact('form_data', 'product'));
            //}
        }
       
    }
}
