@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('styles')
    <!-- Datatables -->
    
    <link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('admin-content')



<!-- Table start -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Building <small> details</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>All Units</h2>
            <p class="float-right mb-2">
              <a href="#" class="btn btn-primary addModelbtn" id="#addModel"><span class="fa fa-plus"></span> Add</a>
            </p>
            <div class="clearfix"></div>
              <div class="alert alert-danger alert-styled-left" style="display: none;" id="delete">
                   <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                   <p class="delete"></p>
              </div>

              <div class="alert alert-success alert-styled-left" style="display: none;" id="success">
                   <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                   <p class="success"></p>
              </div> 
            @include('backend.layouts.partials.messages')
            
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action" id="table_data">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Building ID </th>
                    <th class="column-title">Building Name </th>
                    <th class="column-title">Location Details </th>
                    <th class="column-title">Consumption of Electricity </th>
                    <th class="column-title">Building Image </th>
                    <th class="column-title">Created At </th>
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
                    
                
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Table end -->

<!--Modal -->
<div class="modal fade bs-example-modal-md" tabindex="-1" id="addModel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Building Detail Form</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
        <form action="{{route('admin.building.store')}}" class="form" id="add_form" method="POST">
              <div class="modal-body">
                @csrf                          
                <label>Building Name</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="edit_building_name" name="building_name" placeholder="Building Name" autocomplete="off" value="{{ old('building_name') }}" require >
                    <span class="text-red">
                              <strong class="building_name"></strong>
                    </span>
                </div>

                <label>Location Details</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="edit_location_detail" name="location_detail" placeholder="Location Details" autocomplete="off" value="{{ old('location_detail') }}" require >
                    <span class="text-red">
                              <strong class="location_detail"></strong>
                    </span>
                </div>

                <label>Monthly Consumption of Electricity</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="edit_electricity_consunption" name="electricity_consunption" placeholder="Monthly Consumption of Electricity" autocomplete="off" value="{{ old('electricity_consunption') }}" require >
                    <span class="text-red">
                              <strong class="electricity_consunption"></strong>
                    </span>
                </div>

                <label>Image</label>
                <div class="form-group">
                    <input type="file" class="form-control" id="edit_image" name="image" autocomplete="off" value="{{ old('image') }}" require >
                    <span class="text-red">
                              <strong class="image"></strong>
                    </span>
                </div>
                     
                <input type="hidden" name="edit_id" id="edit_id" value="">
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" id="add_form_btn">Submit</button>
            </div>
        </form>    

    </div>
  </div>
</div>
<!--Update Modal end-->
      <!-- /.row -->  

@endsection
@section('scripts')
<!-- Datatables -->
    <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{ asset('script/app.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  var dataTableRoute = "{{ route('admin.building.fetch') }}";
  var editRoute = "{{route('admin.building.edit')}}";
  var disableRoute = "{{route('admin.building.delete')}}";
  var token = '{{csrf_token()}}';
  var data = [
                { "data": "id" },
                { "data": "building_name" },
                { "data": "location_detail" },
                { "data": "electricity_consunption" },
                { "data": "image" },
                { "data": "created_at" },
                { "data": "options" ,"orderable":false},
            ]
$( document ).ready(function() {

  InitTable();
});
</script> 
@endsection