<?php

namespace App\Http\Controllers\Backend;

use App\Models\Building;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DataTables;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use URL;

class BuildingController extends Controller
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
        // if (is_null($this->user) || !$this->user->can('building.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to access this page!');
        // }
        $buildings = Building::all();
        return view('backend.pages.buildings.index', compact('buildings'));
    }

   

    public function fetch(){
        // if (is_null($this->user) || !$this->user->can('building.edit')) {
        //     abort(403, 'Sorry !! You are Unauthorized to access this page!');
        // }

        $data = Building::orderBy('id','desc');
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
        // if (is_null($this->user) || !$this->user->can('building.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized to access this page!');
        // }
        $rules = array(
            'building_name' => 'required',
            'location_detail' => 'required',
            'electricity_consunption' => 'required',
        );

        $data = [
            'building_name' => trim($request->get('building_name')),
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
            
            $data = Building::findOrFail($request->edit_id);
            $data->building_name     = $request->building_name;
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
            $success = 'Building has been updated.';
            return response()->json($success);
            }else{

            $data = New Building;
            $data->building_name     = $request->building_name;
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
            $success = 'Building has been created.';
            return response()->json($success);
           }
        }
    
    }

    
    public function edit(Request $request)
    {
      // if (is_null($this->user) || !$this->user->can('building.edit')) {
      //       abort(403, 'Sorry !! You are Unauthorized to access this page!');
      //   }  
      $data = Building::findOrFail($request->id);
      return response()->json($data);

    }
     

    public function delete(Request $request)
    {
      // if (is_null($this->user) || !$this->user->can('building.delete')) {
      //       abort(403, 'Sorry !! You are Unauthorized to access this page!');
      //   }  
      $data = Building::findOrFail($request->id);
      $data->delete();
      $message = 'Successfully Deleted.';
      return response()->json($message);

    }

   
}
