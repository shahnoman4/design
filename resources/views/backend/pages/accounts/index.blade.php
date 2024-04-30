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
<style type="text/css">

.modal-lg, .modal-xl {
    max-width: 900px;
}
</style>    
@endsection

@section('admin-content')



<!-- Table start -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Accounts</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>All Account</h2>
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
                    <th class="column-title">ID </th>
                    <th class="column-title">Accout Type </th>
                    <th class="column-title">Detail Type</th>
                    <th class="column-title">Name</th>
                    <th class="column-title">Number</th>
                    <th class="column-title">VAT Code </th>
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

<!-- add customer Modal -->
@include('backend.pages.accounts._addAccounts')
<!-- add customer Modal end-->
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
  var dataTableRoute = "{{ route('admin.account.fetch') }}";
  var editRoute = "{{route('admin.account.edit')}}";
  var disableRoute = "{{route('admin.account.delete')}}";
  var token = '{{csrf_token()}}';
  var data = [
                { "data": "id" },
                { "data": "accout_type" },
                { "data": "detail_type" },
                { "data": "name" },
                { "data": "number" },
                { "data": "vat_code" },
                { "data": "options" ,"orderable":false},
            ]
$( document ).ready(function() {

  InitTable();

  $('#add_account_form_btn').on('click', function(e) {
    e.preventDefault();
    var data = $('#add_account_form')[0];
    var formData = new FormData(data);
    $.ajax({
    data: formData,
    type: $('#add_account_form').attr('method'),
    url: $('#add_account_form').attr('action'),
    processData: false,
    contentType: false,
    success: function(response)
    {
      new PNotify({
                  title: 'Success',
                  text: response['success'],
                  type: 'success',
                  hide: true,
                  styling: 'bootstrap3'
              });
      $('#addModel').modal('hide');
      InitTable();

    },
    error: function(xhr) {
      if (xhr.status === 422) {
          var errors = xhr.responseJSON.errors;
          console.log(errors);
          if(errors)
          {
          $.each(errors, function( index, value ) {
            $("."+index).html(value);
            $("."+index).fadeIn('slow', function(){
              $("."+index).delay(4000).fadeOut(); 
            });
          });

          }
      } else {
          console.log('Unexpected error occurred.');
      }
    }

    });
  });


});
</script> 
@endsection