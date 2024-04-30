<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use App\Models\ServicePurchasing;
use App\Models\Address;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DataTables;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use URL;

class ServiceController extends Controller
{
    public $user;

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    
    public function create(ServiceRequest $request)
    {
           $service = new Service;
           $service->service_type = $request->service_type;
           $service->name = $request->name;
           $service->service_code = $request->service_code;
           $service->category_id = $request->category_id;
           $service->description = $request->description;
           $service->sales_price = $request->sales_price;
           $service->account_type_id = $request->account_type_id;
           $service->inclusive_of_vat = $request->inclusive_of_vat;
           $service->vat = $request->vat;
           $service->purchasing_information = $request->purchasing_information;
           $service->image = $request->image;
           $service->save();
           if($service){
               $purchasing = new ServicePurchasing;
               $purchasing->service_id = $service->id;
               $purchasing->description = $request->description;
               $purchasing->cost = $request->cost;
               $purchasing->account_type_id = $request->account_type_id;
               $purchasing->inclusive_tax = $request->inclusive_tax;
               $purchasing->purchase_tax = $request->purchase_tax;
               $purchasing->supplier_id = $request->supplier_id;
               $purchasing->save();
           }
           $data['success'] = 'Service has been created.';
           $data['service'] = $service;
           return response()->json($data);
    }

    public function getservice(Request $request)
    {
        $data = Service::all();
        return response()->json($data); 
    }
   
}
