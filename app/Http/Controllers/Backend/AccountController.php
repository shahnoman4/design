<?php

namespace App\Http\Controllers\Backend;

use App\Models\Accounts;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DataTables;
use Auth;

class AccountController extends Controller
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
        return view('backend.pages.accounts.index');
    }

   

    public function fetch(){
       // if (is_null($this->user) || !$this->user->can('customer.view')) {
       //      abort(403, 'Sorry !! You are Unauthorized to access this page!');
       //  }
        $data = Accounts::orderBy('id','desc')->get();
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
    public function store(AccountRequest $request)
    {
           $account = new Accounts;
           $account->accout_type = $request->accout_type;
           $account->detail_type = $request->detail_type;
           $account->detail_description = $request->detail_description;
           $account->name = $request->name;
           $account->number = $request->number;
           $account->description = $request->description;
           $account->is_sub_account = $request->is_sub_account;
           $account->parent_id = $request->parent_id;
           $account->vat_code = $request->vat_code;
           $account->save();
           
           $data['success'] = 'Account has been created.';
           return response()->json($data);
    }

    
    public function edit(Request $request)
    {
      // if (is_null($this->user) || !$this->user->can('customer.edit')) {
      //       abort(403, 'Sorry !! You are Unauthorized to access this page!');
      //   }  
      $data = Accounts::findOrFail($request->id);
      return response()->json($data);

    }
     

    public function delete(Request $request)
    {
      if (is_null($this->user) || !$this->user->can('customer.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to access this page!');
        }  
      $data = Accounts::findOrFail($request->id);
      $data->delete();
      $message = 'Successfully Deleted.';
      return response()->json($message);

    }

   
}
