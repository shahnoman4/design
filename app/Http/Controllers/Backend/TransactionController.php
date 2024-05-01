<?php

namespace App\Http\Controllers\Backend;

use App\Models\TransactionDetail;
use App\Models\PaymentMethod;
use App\Models\Accounts;
use App\Models\Customer;
use App\Models\Group;
use App\Models\Tag;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use DataTables;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use URL;

class TransactionController extends Controller
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
        // if (is_null($this->user) || !$this->user->can('TransactionDetail.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to access this page!');
        // }
        $data['transaction'] = TransactionDetail::all();
        $data['paymentMethod'] = PaymentMethod::all();
        $data['expense'] = Accounts::where('accout_type','Expense')->get();
        $data['categories'] = Category::get();
        $data['income'] = Accounts::where('accout_type','Income')->get();
        $data['supplier'] = Customer::where('customer_type','Supplier')->get();
        return view('backend.pages.transactionDetail.estimate', compact('data'));
    }

   

    public function fetch(){
        // if (is_null($this->user) || !$this->user->can('TransactionDetail.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized to access this page!');
        // }

        $data = TransactionDetail::orderBy('id','desc');
        return DataTables::of($data)
        ->addColumn('created_at',function($data){
            return $data->created_at->format('Y-m-d');
        })
        ->addColumn('image', function($data) {

            $image=URL::to('/').Storage::disk('local')->url('public/documents/'.$data->image);
           return '<img src="'.$image.'" width="95px"/>';
        })
        ->addColumn('options',function($data){
             return "&emsp;<a class='edit_model'
                                     href='#' data-id='".$data->id."'><i class='fa fa-pencil-square-o'></i></a>
                                     <a data-toggle='tooltip' data-placement='bottom' title='Disable' class='disable' data-original-title='Disable' href='#' data-id='".$data->id."'><i class='fa fa-trash-o'></i></a>
                                     ";
                                  
        })
     
        ->rawColumns(['image','created_at','options'])
        ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('TransactionDetail.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized to access this page!');
        // }
        $rules = array(
            'TransactionDetail_name' => 'required',
            'location_detail' => 'required',
            'electricity_consunption' => 'required',
        );

        $data = [
            'TransactionDetail_name' => trim($request->get('TransactionDetail_name')),
            'location_detail' => trim($request->get('location_detail')),
            'electricity_consunption' => trim($request->get('electricity_consunption')),
            ];
        $validator = Validator::make($data,$rules);
     
    if($validator->fails())
       {
        return  response()->json(['errors'=>$validator->errors()]);
       }else
       {
         
            if(isset($request->edit_id) && ($request->edit_id !="") )
            {
            
            $data = TransactionDetail::findOrFail($request->edit_id);
            $data->TransactionDetail_name     = $request->TransactionDetail_name;
            $data->location_detail     = $request->location_detail;
            $data->electricity_consunption     = $request->electricity_consunption;
            if($request->hasfile('image'))
             {
                $file = $request->file('image');
                $image=$file->getClientOriginalName();
                Storage::disk('local')->put('/public/documents/'.$image, File::get($file));
                $data->image     = $image;
             }
            $data->save(); 
            $success = 'TransactionDetail has been updated.';
            return response()->json($success);
            }else{

            $data = New TransactionDetail;
            $data->TransactionDetail_name     = $request->TransactionDetail_name;
            $data->location_detail     = $request->location_detail;
            $data->electricity_consunption     = $request->electricity_consunption;
            if($request->hasfile('image'))
             {
                $file = $request->file('image');
                $image=$file->getClientOriginalName();
                Storage::disk('local')->put('/public/documents/'.$image, File::get($file));
                $data->image     = $image;
             }
            $data->save();
            $success = 'TransactionDetail has been created.';
            return response()->json($success);
           }
        }
    
    }

    
    public function edit(Request $request)
    {
      // if (is_null($this->user) || !$this->user->can('TransactionDetail.edit')) {
      //       abort(403, 'Sorry !! You are Unauthorized to access this page!');
      //   }  
      $data = TransactionDetail::findOrFail($request->id);
      return response()->json($data);

    }
     

    public function delete(Request $request)
    {
      // if (is_null($this->user) || !$this->user->can('TransactionDetail.delete')) {
      //       abort(403, 'Sorry !! You are Unauthorized to access this page!');
      //   }  
      $data = TransactionDetail::findOrFail($request->id);
      $data->delete();
      $message = 'Successfully Deleted.';
      return response()->json($message);

    }



    public function paymentMethod(Request $request)
    {
      $rules = array(
            'name' => 'required',
            'is_credit_or_debit_card' => 'required',
        );

        $data = [
            'name' => trim($request->get('name')),
            'is_credit_or_debit_card' => trim($request->get('is_credit_or_debit_card')),
            ];
        $validator = Validator::make($data,$rules);
     
       if($validator->fails())
       {
        return  response()->json(['errors'=>$validator->errors()]);
       }else
       {
           $method = new PaymentMethod;
           $method->name = $request->name;
           $method->is_credit_or_debit_card = $request->is_credit_or_debit_card;
           $method->save();
           $data['success'] = 'Payment Method has been created.';
           $data['id'] = $method->id;
           return response()->json($data);
       }

    }

    public function getPaymentMethod(Request $request)
    {
       $data = PaymentMethod::all();
        return response()->json($data); 
    }

    public function tag(Request $request)
    {
      $rules = array(
            'tag_name' => 'required',
            'group_id' => 'required',
        );

        $data = [
            'tag_name' => trim($request->get('tag_name')),
            'group_id' => trim($request->get('group_id')),
            ];
        $validator = Validator::make($data,$rules);
     
       if($validator->fails())
       {
        return  response()->json(['errors'=>$validator->errors()]);
       }else
       {
           if(isset($request->edit_tag_id) && ($request->edit_tag_id !="") )
            {
               $tag = Tag::findOrFail($request->edit_tag_id);
               $tag->tag_name = $request->tag_name;
               $tag->group_id = $request->group_id;
               $tag->save();
               $data['success'] = 'Tag has been updated.';
               $data['id'] = $tag->id;
               return response()->json($data);
           }else{
               $tag = new Tag;
               $tag->tag_name = $request->tag_name;
               $tag->group_id = $request->group_id;
               $tag->save();
               $data['success'] = 'Tag has been created.';
               $data['id'] = $tag->id;
               return response()->json($data);
           }
       }

    }

    public function fetchTag(){

        $data = Tag::orderBy('id','desc');
        return DataTables::of($data)
        ->addColumn('created_at',function($data){
            return $data->created_at->format('Y-m-d');
        })
        ->addColumn('group_name',function($data){
            return $data->group->group_name;
        })
        
        ->addColumn('options',function($data){
             return "&emsp;<a class='edit_tag_model'
                                     href='#' data-id='".$data->id."'><i class='fa fa-pencil-square-o'></i></a>
                                     ";
                                  
        })
     
        ->rawColumns(['created_at','group_name','options'])
        ->make(true);
    }

    public function editTag(Request $request)
    {
       
      $data = Tag::findOrFail($request->id);
      return response()->json($data);

    }

    public function getTag(Request $request)
    {
       $data = Tag::all();
        return response()->json($data); 
    }

    public function group(Request $request)
    {
      $rules = array(
            'group_name' => 'required',
        );

        $data = [
            'group_name' => trim($request->get('group_name')),
            ];
        $validator = Validator::make($data,$rules);
     
       if($validator->fails())
       {
        return  response()->json(['errors'=>$validator->errors()]);
       }else
       {

           if(isset($request->edit_group_id) && ($request->edit_group_id !="") )
            {
               $group = Group::findOrFail($request->edit_group_id);
               $group->group_name = $request->group_name;
               $group->save();
               $data['success'] = 'Group has been updated.';
               $data['id'] = $group->id;
               return response()->json($data);
           }else{
               $group = new Group;
               $group->group_name = $request->group_name;
               $group->save();
               $data['success'] = 'Group has been created.';
               $data['id'] = $group->id;
               return response()->json($data);
           }
           
       }

    }

    public function getGroup(Request $request)
    {
       $data = Group::all();
        return response()->json($data); 
    }

    public function fetchGroup(){

        $data = Group::orderBy('id','desc');
        return DataTables::of($data)
        
        ->addColumn('options',function($data){
             return "&emsp;<a class='edit_group_model'
                                     href='#' data-id='".$data->id."'><i class='fa fa-pencil-square-o'></i></a>
                                     ";
                                  
        })
     
        ->rawColumns(['options'])
        ->make(true);
    }

    public function editGroup(Request $request)
    {
       
      $data = Group::findOrFail($request->id);
      return response()->json($data);

    }

    

    
   
}
