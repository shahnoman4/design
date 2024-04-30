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
        <h3>Manage customers</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>All Customers</h2>
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
                    <th class="column-title">Sl </th>
                    <th class="column-title">First Name </th>
                    <th class="column-title">Company Name </th>
                    <th class="column-title">Email</th>
                    <th class="column-title">Mobile No </th>
                    <th class="column-title">VAT No </th>
                    <th class="column-title">Opening Balance </th>
                    <th class="column-title">Pay Term </th>
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
@include('backend.pages.customers._addCustomers')
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
  var dataTableRoute = "{{ route('admin.customer.fetch') }}";
  var editRoute = "{{route('admin.customer.edit')}}";
  var disableRoute = "{{route('admin.customer.delete')}}";
  var token = '{{csrf_token()}}';
  var data = [
                { "data": "id" },
                { "data": "first_name" },
                { "data": "company_name" },
                { "data": "email" },
                { "data": "mobile_no" },
                { "data": "vat_reg_no" },
                { "data": "opening_no" },
                { "data": "payment_terms" },
                { "data": "options" ,"orderable":false},
            ]
$( document ).ready(function() {

  InitTable();

     PaymentMethods();


  $("#edit_is_sub_customer").on("click", function(){

      if($(this).prop('checked')) {
        $('#parent_customer').show();
      } else {
        $('#parent_customer').hide();
      }

  });

  $("#edit_same_as_billing").on("click", function(){

      if($(this).prop('checked')) {
        $('.shipping_address').hide();
      } else {
        $('.shipping_address').show();
      }

  });

  $("#edit_payment_method_id").on("change", function(){

    var method = $("#edit_payment_method_id").val();
    if(method=="add_new_payment_method"){
      $('.payment_method').show();
    }else{
      $('.payment_method').hide();
    }

  });

  $(document).on('click', '#add_payment_method', function()
  {
  var name = $('#edit_payment_method_name').val();
  var is_credit_or_debit_card = $('#edit_is_credit_or_debit_card').val();
    $.ajax({
      "url": "{{route('add.payment.method')}}",
      type: "POST",
      data: {'name': name,'is_credit_or_debit_card': is_credit_or_debit_card,_token: token},
      dataType : "json",
      success: function(response)
      {
         new PNotify({
                  title: 'Success',
                  text: response['success'],
                  type: 'success',
                  hide: true,
                  styling: 'bootstrap3'
              });
      $('#edit_payment_method_name').val("");
      $('#edit_is_credit_or_debit_card').val("");
      $('.payment_method').hide();
      PaymentMethods(response['id']);
      },
        error: function(){},          
    });

  });

  function PaymentMethods(id){
    $('#edit_payment_method_id').html("");
    $.ajax({
        "url": "{{route('get.payment.method')}}",
        type: "GET",
        dataType : "json",
    success: function(response)
    {
      console.log(response);
      var payment = $('#edit_payment_method_id');
           if (response) {
              payment.prop('disabled', false);
              var option = '<option>select</option><option style="color:#0077c5;" value="add_new_payment_method"><span class="fa fa-plus"></span>Add New</option>';
              response.forEach(function (paymentmethod) {
                  if (paymentmethod.id === id) {
                      option += '<option value="'+paymentmethod.id+'" selected="selected">'+paymentmethod.name+'</option>';
                  }else{
                      option += '<option value="'+paymentmethod.id+'">'+paymentmethod.name+'</option>';
                  }
                  
              });
              payment.append(option);
          } else {
              payment.prop('disabled', true);
          }
    }
    });
  }

  $('#add_customer_form_btn').on('click', function(e) {
    e.preventDefault();
    var data = $('#add_customer_form')[0];
    var formData = new FormData(data);
    $.ajax({
    data: formData,
    type: $('#add_customer_form').attr('method'),
    url: $('#add_customer_form').attr('action'),
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