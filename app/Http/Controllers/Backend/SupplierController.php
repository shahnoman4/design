<?php

namespace App\Http\Controllers\Backend;

use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DataTables;
use Auth;

class SupplierController extends Controller
{
    public $user;

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (is_null($this->user) || !$this->user->can('customer.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to access this page!');
        // }
        $suppliers = Customer::all();
        return view('backend.pages.suppliers.index', compact('suppliers'));
    }

   

    public function fetch(){
       // if (is_null($this->user) || !$this->user->can('customer.view')) {
       //      abort(403, 'Sorry !! You are Unauthorized to access this page!');
       //  }
        $data = Customer::where('customer_type','Supplier')->orderBy('id','desc')->get();
        return DataTables::of($data)
        ->addColumn('created_at',function($data){
            return $data->created_at->format('Y-m-d');
        })
        ->addColumn('options',function($data){
             return "&emsp;<a class='edit_model'
                                     href='#' data-id='".$data->id."'><i class='fa fa-pencil-square-o'></i></a>
                                     <a data-toggle='tooltip' data-placement='bottom' title='Disable' class='disable' data-original-title='Disable' href='#' data-id='".$data->id."'><i class='fa fa-trash-o'></i></a>
                                     ";
                                  
        })
     
        ->rawColumns(['created_at','options'])
        ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
           $customer = new Customer;
           $customer->customer_type = "Supplier";
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
           
           $customer->notes = $request->notes;
           $customer->attachment = $request->attachment;
           $customer->billing_rate = $request->billing_rate;
           $customer->payment_terms = $request->payment_terms;
           $customer->account_no = $request->account_no;
           $customer->expense_category = $request->expense_category;
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
           }
           $data['success'] = 'Customer has been created.';
           return response()->json($data);
    }

    
    public function edit(Request $request)
    {
      // if (is_null($this->user) || !$this->user->can('customer.edit')) {
      //       abort(403, 'Sorry !! You are Unauthorized to access this page!');
      //   }  
      $data = Customer::findOrFail($request->id);
      return response()->json($data);

    }
     

    public function delete(Request $request)
    {
      if (is_null($this->user) || !$this->user->can('customer.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to access this page!');
        }  
      $data = Customer::findOrFail($request->id);
      $data->delete();
      $message = 'Successfully Deleted.';
      return response()->json($message);

    }

   
}
