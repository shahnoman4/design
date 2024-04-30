<?php

namespace App\Http\Controllers\Backend;

use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\Address;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DataTables;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use URL;

class CustomerController extends Controller
{
    public $user;

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    
    public function create(CustomerRequest $request)
    {
           $customer = new Customer;
           $customer->title = $request->title;
           $customer->first_name = $request->first_name;
           $customer->middle_name = $request->middle_name;
           $customer->last_name = $request->last_name;
           $customer->suffix = $request->suffix;
           $customer->company_name = $request->company_name;
           $customer->customer_display_name = $request->customer_display_name;
           $customer->email = $request->email;
           $customer->phone_no = $request->phone_no;
           $customer->mobile_no = $request->mobile_no;
           $customer->fax = $request->fax;
           $customer->other = $request->other;
           $customer->website = $request->website;
           $customer->is_sub_customer = $request->is_sub_customer;
           if($request->is_sub_customer=='Yes'){
             $customer->parent_id = $request->parent_id;
             $customer->bill_for_parent = 'Yes';
           }
           $customer->notes = $request->notes;
           $customer->attachment = $request->attachment;
           $customer->payment_method_id = $request->payment_method_id;
           $customer->payment_terms = $request->payment_terms;
           $customer->sales_delivery_option = $request->sales_delivery_option;
           $customer->use_language = $request->use_language;
           $customer->vat_reg_no = $request->vat_reg_no;
           $customer->utr_no = $request->utr_no;
           $customer->opening_no = $request->opening_no;
           $customer->ask_of_date = $request->ask_of_date;
           $customer->save();
           if($customer){
               $billing = new Address;
               $billing->customer_id = $customer->id;
               $billing->street_address = $request->street_address;
               $billing->city = $request->city;
               $billing->county = $request->county;
               $billing->post_code = $request->post_code;
               $billing->country = $request->country;
               $billing->address_type = "Billing";
               $billing->save();
                if($request->same_as_billing=="Yes"){
                   $shipping = new Address;
                   $shipping->customer_id = $customer->id;
                   $shipping->street_address = $request->street_address;
                   $shipping->city = $request->city;
                   $shipping->county = $request->county;
                   $shipping->post_code = $request->post_code;
                   $shipping->country = $request->country;
                   $shipping->address_type = "Shipping";
                   $shipping->save();  
                }else{
                   $shipping = new Address;
                   $shipping->customer_id = $customer->id;
                   $shipping->street_address = $request->shipping_street_address;
                   $shipping->city = $request->shipping_city;
                   $shipping->county = $request->shipping_county;
                   $shipping->post_code = $request->shipping_post_code;
                   $shipping->country = $request->shipping_country;
                   $shipping->address_type = "Shipping";
                   $shipping->save();
                }   
           }
           $data['success'] = 'Customer has been created.';
           $data['customer'] = Customer::WithAddress()->findOrFail($customer->id);
           return response()->json($data);
    }

    public function getCustomer(Request $request)
    {
        $data = Customer::WithAddress()->get();
        return response()->json($data); 
    }

    public function customerById(Request $request)
    {
        $data = Customer::WithAddress()->findOrFail($request->id);
        return response()->json($data); 
    }
   
}
