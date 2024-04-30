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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style type="text/css">

.modal-lg, .modal-xl {
    max-width: 900px;
}

#table_tag_data {
  width: 100% ! important; 
}
#table_group_data {
  width: 100% ! important; 
}

</style>    
@endsection

@section('admin-content')

<style type="text/css">
  .input-group-btn {
    position: relative;
    font-size: 0;
    white-space: nowrap;
    width: 1%;
}

.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}

.btn-default {
    background-color: #f4f4f4;
    color: #444;
    border-color: #ddd !important;
}

.bg-white {
    background-color: #fff;
}
</style>

<!-- Table start -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Transaction <small> details</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Create Estimate</h2>
        
            <div class="clearfix"></div>
             
            @include('backend.layouts.partials.messages')
            
          </div>

          <div class="x_content">
            <form action="" class="form-horizontal form-label-left" id="revenue_add_form" method="POST" enctype="multipart/form-data">

              @csrf
                
                <div class="col-md-3 col-sm-3 form-group has-feedback">
                  </br>
                  <label>Customer:*</label>
                      <select class="form-control" id="edit_customer_id" required="required" name="customer_id">
                        <!-- <option value="1">fadfadfadf</option>
                        <option value="2">mememe</option> -->
                      </select>
                   <span class="text-red">
                      <strong class="customer_id"></strong>
                    </span>
                </div>
                <div class="col-md-1 col-sm-1">
                  </br>
                  </br>
                  
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default bg-white btn-flat add_new_customer" style="margin-top:8px;margin-left:-21px;" data-name=""><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
                  </span>
                </div>
                <div class="col-md-4 col-sm-4 form-group has-feedback">
                  </br>
                  <label>Email:*</label>
                  <input type="text" class="form-control" name="email" id="edit_email" placeholder="Email" required> 
                    <span class="text-red">
                      <strong class="email"></strong>
                    </span>
                </div>
                 <div class="col-md-12"></div>

                <div class="col-md-4 col-sm-4 form-group has-feedback">
                  <label>Estimate Status</label>
                  <select class="form-control" id="edit_status" required="required" name="status">
                    <option>Pending</option>
                    <option>Accepted</option>
                    <option>Closed  </option>
                    <option>Rejected</option>
                  </select>
                   <span class="text-red">
                          <strong class="status"></strong>
                    </span>
                </div>
                <div class="col-md-4 col-sm-4 form-group has-feedback">
                  <input type="checkbox" name="send_later" id="edit_send_later">
                  <label style="margin-top:40px;">Email Send later</label> 
                    <span class="text-red">
                      <strong class="send_later"></strong>
                    </span>
                </div>
                <div class="col-md-12"></div>
                <div id="status" style="display:none;">
                  <div class="col-md-4 col-sm-4 form-group has-feedback">                         
                    <label>Status By</label>
                      <input type="text" class="form-control" name="status_by" id="edit_status_by"> 
                      <span class="text-red">
                                <strong class="status_by" style="color:red;"></strong>
                      </span>
                  </div>
                  <div class="col-md-4 col-sm-4 form-group has-feedback">
                      <label>Status Date</label> 
                      <input type="date" class="form-control" name="status_date" id="edit_status_date"> 
                      <span class="text-red">
                          <strong class="status_date" style="color:red;"></strong>
                      </span>
                  </div>
                </div>
                <div class="col-md-12"></div>

                <div class="col-md-3 col-sm-3 form-group has-feedback">
                  <label>Billing address:*</label>
                  <input type="text" class="form-control" name="billing_address" id="edit_billing_address"  required>
                    <span class="text-red">
                      <strong class="billing_address"></strong>
                    </span>
                </div>

                <div class="col-md-3 col-sm-3 form-group has-feedback">
                  <label>Estimate date:*</label>
                  <input type="date" class="form-control" name="invoice_no" id="edit_invoice_no" placeholder="Estimate date" required> 
                    <span class="text-red">
                      <strong class="invoice_no"></strong>
                    </span>
                </div>

                <div class="col-md-3 col-sm-3 form-group has-feedback">
                  <label>Expiration date:*</label>
                  <input type="date" class="form-control" name="invoice_no" id="edit_invoice_no" placeholder="Expiration date" required> 
                    <span class="text-red">
                      <strong class="invoice_no"></strong>
                    </span>
                </div>

                <div class="col-md-12"></div>

                <div class="col-md-3 col-sm-3 form-group has-feedback">
                  <label>Shipping to:*</label>
                  <input type="text" class="form-control" name="shipping_address" id="edit_shipping_address"  required>
                    <span class="text-red">
                      <strong class="shipping_address"></strong>
                    </span>
                </div>

                <div class="col-md-3 col-sm-3 form-group has-feedback">
                  <label>Ship via:*</label>
                  <input type="text" class="form-control" name="invoice_no" id="edit_invoice_no" placeholder="Ship via" required> 
                    <span class="text-red">
                      <strong class="invoice_no"></strong>
                    </span>
                </div>

                <div class="col-md-3 col-sm-3 form-group has-feedback">
                  <label>Shipping date:*</label>
                  <input type="date" class="form-control" name="invoice_no" id="edit_invoice_no" placeholder="Shipping date" required> 
                    <span class="text-red">
                      <strong class="invoice_no"></strong>
                    </span>
                </div>

                <div class="col-md-2 col-sm-2 form-group has-feedback">
                  <label>Tracking no:*</label>
                  <input type="number" class="form-control" name="invoice_no" id="edit_invoice_no" placeholder="Tracking no" required> 
                    <span class="text-red">
                      <strong class="invoice_no"></strong>
                    </span>
                </div>
                
                <div class="col-md-10 col-sm-10 form-group has-feedback">
                  </br>
                  <p class="float-right mb-2">
                    <a href="#" class="addTagModel" style="color:blue;"> Manage Tags</a>
                  </p>
                  <label>Tags:*</label>
                  <select class="form-control" id="edit_main_tag_id" required="required" name="main_tag_id" multiple>
                    
                  </select>
                   <span class="text-red">
                              <strong class="main_tag_id"></strong>
                    </span>
                </div>
                
                <br>
                <div class="col-md-12">
                  </br>
                  <p class="float-right mb-2">
                    <a href="#" class="btn btn-default bg-white btn-flat add_new_service" style="color:blue;"> <i class="fa fa-plus-circle text-primary fa-lg"></i> Add Services</a>
                  </p>
                  <table id="myTable" class="table table-striped bulk_action table-responsive">
                    <thead>
                      <tr class="headings">
                        <th class="column-title">Action</th>
                        <th class="column-title">SERVICE DATE</th>
                        <th class="column-title">PRODUCT/SERVICE</th>
                        <th class="column-title">ITEM/SERVICE CODE</th>
                        <th class="column-title">DESCRIPTION</th>
                        <th class="column-title">QTY</th>
                        <th class="column-title">RATE</th>
                        <th class="column-title">AMOUNT</th>
                        <th class="column-title">VAT</th>
                      </tr>
                    </thead>
                    <tbody id="cardItem">
                      
                           <tr><td><a  class="removeRowBtn" href="#" data-id="'+value.item_id+'"><i class="fa fa-trash-o"></i></a></td><td><input type="date" class="form-control" name="service_date" id="edit_service_date" required></td><td><select type="text" class="form-control" name="service_id" id="edit_service_id"></select>
                            </td>

                            <td><input type="text" class="form-control" name="invoice_no" id="edit_invoice_no" required></td><td><input type="number" class="form-control" name="invoice_no" id="edit_invoice_no" required></td><td><input type="number" class="form-control" name="invoice_no" id="edit_invoice_no" required></td><td><input type="number" class="form-control" name="invoice_no" id="edit_invoice_no" required></td><td><input type="number" class="form-control" name="invoice_no" id="edit_invoice_no" required></td><td><input type="number" class="form-control" name="invoice_no" id="edit_invoice_no" required></td></tr>
                    </tbody>
                  </table>
                  <button type="button" class="btn btn-round btn-primary" id="addRowBtn">Add Line</button>
                  <button type="button" class="btn btn-round btn-danger" id="removeRowBtn">Clear Line</button>
                </div>
                <div class="col-md-12">
                  <table id="TotalWithTax" style="float: right;">
                          <tr>
                            <th colspan="2">Sub Total:</th>
                            <td> £0.00</td>
                          </tr>
                          <tr>
                            <th colspan="1"><select class="form-control"><option>Discount percent</option><option>Discount value</option></select>
                            </th>
                            <td><input type="number" class="form-control" name="invoice_no" id="edit_invoice_no" required style="width:100px;"></td>
                            <td> £0.00</td>
                          </tr>
                          <tr>
                            <th>Shipping:</th>
                            <td><select class="form-control"><option>Exempt</option><option>20%</option></select>
                            </td>
                            <td> £0.00</td>
                          </tr>
                          <tr>
                            <th colspan="2">Total:</th>
                            <td> £0.00</td>
                          </tr>
                          <tr>
                            <th colspan="2" style="color:#212529;font-size:18px;">Estimate Total:</th>
                            <th style="color:#212529;font-size:18px;">£0.00</th>
                          </tr>
                  </table>
                </div>
                <div class="col-md-8 col-sm-8 form-group has-feedback">
                  <label>Message displayed on estimate:*</label>
                  <textarea name="revenue_note" class="form-control" id="edit_revenue_note" required style="width: 400px;height: 100px;"> 
                  </textarea>  
                    <span class="text-red">
                      <strong class="revenue_note"></strong>
                    </span>
                </div>

                <div class="col-md-8 col-sm-8 form-group has-feedback">
                  <label>Message displayed on statement:*</label>
                  <textarea name="revenue_note" class="form-control" id="edit_revenue_note" required style="width: 400px;height: 100px;"> 
                  </textarea>  
                    <span class="text-red">
                      <strong class="revenue_note"></strong>
                    </span>
                </div>


                
              
                <input type="hidden" name="edit_id" id="edit_id" value=""> 
                <div class="col-md-12"><hr></div>
                <div class="ln_solid"></div>
                <div class="col-md-6 col-sm-6 offset-md-3 form-group">
                  <div class="">
                    <button type="button" class="btn btn-primary">Cancel</button>
                    <button type="submit" class="btn btn-success" id="revenue_add_form_btn">Submit</button>
                  </div>
                </div>     
            </form>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Table end --> 

<!-- add customer Modal -->
@include('backend.pages.transactionDetail.modals._addCustomers')
<!-- add customer Modal end-->

<!-- add service Modal -->
@include('backend.pages.transactionDetail.modals._addServices')
<!-- add service Modal end-->

<!--Tags Modal -->
@include('backend.pages.transactionDetail.modals._addTags')
<!--Tags Model end-->


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
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
var token = '{{csrf_token()}}';


$( document ).ready(function() { 

$("#edit_status").on("change", function(){
  var status = $("#edit_status").val();
  if(status=="Pending"){
    $('#status').hide();
  }else{
    $('#status').show();
  }
});

function GetServices(){
    $.ajax({
        "url": "{{route('get.service')}}",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);
           $('.edit_service_id').empty();
           var option = '<option value="">Choose option</option>';
            $.each(data, function(key, value) {
              option +='<option value="'+value.id+'">'+value.name+'</option>';
            });
            $('.edit_service_id').append(option);
            $('.edit_service_id').select2();
        }
    });

  }


  // Add Row
  $("#addRowBtn").on("click", function() {
    var newRow = $("<tr>");
    var columns =   ['<td><a  class="removeRowBtn" href=""><i class="fa fa-trash-o"></i></a></td>','<td><input type="date" class="form-control" name="service_date" id="edit_service_date" required></td>','<td><select type="text" class="form-control edit_service_id" name="service_id" id="edit_service_id" ></select></td>','<td><input type="number" class="form-control" name="service_code" id="edit_service_code" readonly></td>','<td><input type="text" class="form-control" name="service_description" id="edit_service_description" required></td>','<td><input type="number" class="form-control" name="qty" id="edit_qty" required></td>','<td><input type="number" class="form-control" name="rate" id="edit_rate" required></td>','<td><input type="number" class="form-control" name="amount" id="edit_amount" required></td>','<td><input type="number" class="form-control" name="vat" id="edit_vat" required></td>'];
    newRow.append(columns);
    $("#myTable tbody").append(newRow);
    GetServices();
  });

  // Remove Row
  $("#myTable").on("click", ".removeRowBtn", function() {
    $(this).closest("tr").remove();
  });

  // Remove Last Row
  $("#removeRowBtn").on("click", function() {
    $("#myTable tbody tr:last").remove();
  });
  
 

});
</script> 
@yield('customerscript')
@yield('tagscript')
@yield('servicescript')
@endsection