<div class="modal fade bs-example-modal-md" tabindex="-1" id="addModel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Account information</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
        <form action="{{route('admin.account.store')}}" class="form" id="add_account_form" method="POST">
              <div class="modal-body">
                @csrf 
                <div class="col-md-6 col-sm-6 form-group has-feedback">
                  <label>Account Type</label>
                    <select class="form-control" id="edit_accout_type" required="required" name="accout_type">
                    <option>Select</option>
                    <option value="Income">Income</option>
                    <option value="Expense">Expense</option>
                  </select>
                    <span class="text-red">
                        <strong class="accout_type" style="color:red;"></strong>
                    </span>
                </div>
                <div class="col-md-6 col-sm-6 form-group has-feedback">
                <label>Name *</label>
                    <input type="text" class="form-control" id="edit_name" name="name" autocomplete="off" value="{{ old('name') }}" require >
                    <span class="text-red">
                              <strong class="name" style="color:red"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">
                  <label>Detail Type</label>
                    <select class="form-control" id="edit_detail_type" required="required" name="detail_type">
                    <option>Select</option>
                    <option value="Discounts/Refunds Given">Discounts/Refunds Given</option>
                    <option value="Non-Profit Income">Non-Profit Income</option>
                    <option value="Other Primary Income">Other Primary Income</option>
                  </select>
                    <span class="text-red">
                        <strong class="detail_type" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">
                <label>Number</label>
                    <input type="text" class="form-control" id="edit_number" name="number" autocomplete="off" value="{{ old('number') }}" require >
                    <span class="text-red">
                        <strong class="number" style="color:red;"></strong>
                    </span>
                </div>
                
                <div class="col-md-6 col-sm-6 form-group has-feedback">
                      <textarea class="form-control" id="edit_detail_description" name="detail_description">
                       </textarea> 
                      <span class="text-red">
                          <strong class="detail_description" style="color:red"></strong>
                      </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">
                <label>Description</label>
                    <input type="text" class="form-control" id="edit_description" name="description" autocomplete="off" value="{{ old('description') }}" require >
                    <span class="text-red">
                              <strong class="description" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback"> 
                    <input type="checkbox" id="edit_is_sub_account" name="is_sub_account" value="Yes" require >
                    <label style="margin-top:30px">Is a sub-account</label>
                    <span class="text-red">
                              <strong class="is_sub_account" style="color:red;"></strong>
                    </span>
                </div>

                  <div class="col-md-6 col-sm-6 form-group has-feedback">
                    <label>Parent Account</label>
                      <select class="form-control" id="edit_parent_id" required="required" name="parent_id">
                      <option>select</option>
                      <option>Account</option>
                    </select>
                      <span class="text-red">
                                <strong class="parent_id" style="color:red;"></strong>
                      </span>
                  </div>

                  <div class="col-md-6 col-sm-6 form-group has-feedback">
                  <label>Default VAT Code</label>
                      <select class="form-control" id="edit_vat_code" required="required" name="vat_code">
                        <option>Choose Option</option>
                        <option>Exempt</option>
                        <option>20%</option>
                      </select>
                      <span class="text-red">
                        <strong class="vat_code" style="color:red;"></strong>
                      </span>
                  </div>

                  <div class="col-md-6 col-sm-6 form-group has-feedback">
                  </div>  
                     <div class="clearfix"></div>
                <input type="hidden" name="edit_id" id="edit_id" value="">
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" id="add_account_form_btn">Submit</button>
            </div>
        </form>    

    </div>
  </div>
</div>
@section('customerscript')
<script type="text/javascript">




</script>
@endsection

