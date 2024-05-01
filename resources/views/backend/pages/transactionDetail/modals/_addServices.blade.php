<div class="modal fade bs-example-modal-lg" tabindex="-1" id="addServiceModel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Product/Service information</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
        <form action="{{route('service.create')}}" class="form" id="add_service_form" method="POST">
              <div class="modal-body">
                @csrf 
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                  <label>Service Type</label>
                    <select class="form-control" id="edit_service_type" required="required" name="service_type">
                    <option>select</option>
                    <option value="Non-stock">Non-stock</option>
                    <option value="Service">Service</option>
                    <option value="Bundle">Bundle</option>
                  </select>
                    <span class="text-red">
                        <strong class="service_type" style="color:red;"></strong>
                    </span>
                </div>
                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Name *</label>
                    <textarea class="form-control" id="edit_name" name="name">
                     </textarea> 
                    <span class="text-red">
                              <strong class="name" style="color:red"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Image</label>
                    <input type="file" class="form-control" id="edit_image" name="image" autocomplete="off" value="{{ old('image') }}" require >
                    <span class="text-red">
                              <strong class="image" style="color:red"></strong>
                    </span>
                </div>

                <div class="col-md-12 col-sm-12 form-group has-feedback">
                <label>Item/Service code</label>
                    <input type="text" class="form-control" id="edit_service_code" name="service_code" autocomplete="off" value="{{ old('service_code') }}" require >
                    <span class="text-red">
                        <strong class="service_code" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-10 col-sm-10 form-group has-feedback">
                <label>Category</label>
                    <select class="form-control" id="edit_category_id" required="required" name="category_id">
                      <option>Choose Category</option>
                      @foreach ($data['categories'] as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                    <span class="text-red">
                      <strong class="category_id" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-2 col-sm-2 form-group has-feedback">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default bg-white btn-flat add_new_category" style="margin-top:27px;margin-left:-22px;" data-name=""><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
                    </span>
                </div>

                <div class="col-md-12 col-sm-12 category" style="display:none;"> 
                  <div class="col-md-6 col-sm-6"> 
                      <label>Category Name</label>
                        <input type="text" class="form-control" id="edit_category_name" name="category_name" autocomplete="off" value="{{ old('category_name') }}" require >
                        <span class="text-red">
                            <strong class="category_name" style="color:red;"></strong>
                        </span>
                  </div>
                  <div class="col-md-6 col-sm-6" style="margin-top:28px;">       
                      <button type="button" class="btn btn-success" id="add_category">Save</button>
                      <button type="button" class="btn btn-primary" id="close_category">Close</button>
                  </div>    
                </div>
                
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                  <label>Description *</label>
                      <textarea class="form-control" id="edit_description" name="description">
                       </textarea> 
                      <span class="text-red">
                          <strong class="description" style="color:red"></strong>
                      </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">
                <label>Sales price/rate</label>
                    <input type="text" class="form-control" id="edit_sales_price" name="sales_price" autocomplete="off" value="{{ old('sales_price') }}" require >
                    <span class="text-red">
                              <strong class="sales_price" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">
                <label>Income account</label>
                    <select class="form-control" id="edit_account_id" required="required" name="account_type_id">
                      <option>Choose Account</option>
                      @foreach($data['income'] as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                    <span class="text-red">
                      <strong class="account_type_id" style="color:red;"></strong>
                    </span>
                </div>


                <div class="col-md-12 col-sm-12 form-group has-feedback"> 
                    <input type="checkbox" id="edit_inclusive_of_vat" name="inclusive_of_vat" value="Yes" require >
                    <label style="margin-top:30px">Inclusive of VAT</label>
                    <span class="text-red">
                              <strong class="inclusive_of_vat" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">
                <label>VAT</label>
                    <select class="form-control" id="edit_vat" required="required" name="vat">
                      <option>Choose Option</option>
                      <option>Exempt</option>
                      <option>20%</option>
                    </select>
                    <span class="text-red">
                      <strong class="vat" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-12 col-sm-12 form-group has-feedback"> 
                  <label>Purchasing information</label>
                </br>
                    <input type="checkbox" id="edit_purchasing_information" name="purchasing_information" value="Yes" require >
                    <label>I purchase this product/service from a supplier.</label>
                    <span class="text-red">
                              <strong class="purchasing_information" style="color:red;"></strong>
                    </span>
                </div> 

                <div class="supplier_detail" style="display:none;">
                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                      <label>Description *</label>
                          <textarea class="form-control" id="edit_purchase_description" name="purchase_description">
                           </textarea> 
                          <span class="text-red">
                              <strong class="purchase_description" style="color:red"></strong>
                          </span>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                    <label>Cost</label>
                        <input type="text" class="form-control" id="edit_cost" name="cost" autocomplete="off" value="{{ old('cost') }}" require >
                        <span class="text-red">
                                  <strong class="cost" style="color:red;"></strong>
                        </span>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                    <label>Expense account</label>
                        <select class="form-control" id="edit_expense_account_id" required="required" name="expense_account_id">
                          <option>Choose Account</option>
                          @foreach($data['expense'] as $row)
                          <option value="{{$row->id}}">{{$row->name}}</option>
                          @endforeach
                        </select>
                        <span class="text-red">
                          <strong class="expense_account_id" style="color:red;"></strong>
                        </span>
                    </div>

                    <div class="col-md-12 col-sm-12 form-group has-feedback"> 
                        <input type="checkbox" id="edit_inclusive_tax" name="inclusive_tax" value="Yes" require >
                        <label style="margin-top:30px">Inclusive of purchase tax</label>
                        <span class="text-red">
                                  <strong class="inclusive_tax" style="color:red;"></strong>
                        </span>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                    <label>Purchase tax</label>
                        <select class="form-control" id="edit_purchase_tax" required="required" name="purchase_tax">
                          <option>Choose Option</option>
                          <option>Exempt</option>
                          <option>20%</option>
                        </select>
                        <span class="text-red">
                          <strong class="purchase_tax" style="color:red;"></strong>
                        </span>
                    </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">
                  <label>Preferred Supplier</label>
                      <select class="form-control" id="edit_supplier_id" required="required" name="supplier_id">
                        <option>Choose Option</option>
                        @foreach($data['supplier'] as $row)
                          <option value="{{$row->id}}">{{$row->customer_display_name}}</option>
                        @endforeach
                      </select>
                      <span class="text-red">
                        <strong class="supplier_id" style="color:red;"></strong>
                      </span>
                  </div>
                </div>               
                     
                <input type="hidden" name="edit_id" id="edit_id" value="">
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" id="add_service_form_btn">Submit</button>
            </div>
        </form>    

    </div>
  </div>
</div>

@section('servicescript')
<script type="text/javascript">
   
  $( document ).ready(function() {  

    GetServices();

    $(document).on('click', '.add_new_service', function()
    {
      $('#addServiceModel').modal('show');
    });

    $(document).on('click', '.add_new_category', function()
    {
      $('.category').show();
    });

    $(document).on('click', '#close_category', function()
    {
      $('.category').hide();
    });

    $("#edit_purchasing_information").on("click", function(){

      if($(this).prop('checked')) {
        $('.supplier_detail').show();
      } else {
        $('.supplier_detail').hide();
      }

    });

  $('#add_service_form_btn').on('click', function(e) {
    e.preventDefault();
    var data = $('#add_service_form')[0];
    var formData = new FormData(data);
    $.ajax({
    data: formData,
    type: $('#add_service_form').attr('method'),
    url: $('#add_service_form').attr('action'),
    processData: false,
    contentType: false,
    success: function(response)
    {
      GetServices();
      new PNotify({
                  title: 'Success',
                  text: response['success'],
                  type: 'success',
                  hide: true,
                  styling: 'bootstrap3'
              });      
      $('#addServiceModel').modal('hide');
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

  function GetServices(){
    $.ajax({
        "url": "{{route('get.service')}}",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);
           $('#edit_service_id').empty();
           var option = '<option value="">Choose option</option>';
            $.each(data, function(key, value) {
              option +='<option value="'+value.id+'">'+value.name+'</option>';
            });
            $('#edit_service_id').append(option);
            $('#edit_service_id').select2();
        }
    });

  }



  }); 
</script>
@endsection