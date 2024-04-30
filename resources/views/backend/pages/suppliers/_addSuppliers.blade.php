<div class="modal fade bs-example-modal-lg" tabindex="-1" id="addModel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Supplier</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
        <form action="{{route('admin.supplier.store')}}" class="form" id="add_supplier_form" method="POST">
              <div class="modal-body">
                @csrf 
                <h4>Name and contacts</h4>
                <div class="col-md-2 col-sm-2 form-group has-feedback">                         
                <label>Title</label>
                    <input type="text" class="form-control" id="edit_title" name="title" autocomplete="off" value="{{ old('title') }}" require >
                    <span class="text-red">
                              <strong class="title" style="color:red"></strong>
                    </span>
                </div>
                <div class="col-md-3 col-sm-3 form-group has-feedback">                         
                <label>First Name</label>
                    <input type="text" class="form-control" id="edit_first_name" name="first_name" autocomplete="off" value="{{ old('first_name') }}" require >
                    <span class="text-red">
                              <strong class="first_name" style="color:red"></strong>
                    </span>
                </div>
                <div class="col-md-2 col-sm-2 form-group has-feedback">                         
                <label>Middle Name</label>
                    <input type="text" class="form-control" id="edit_middle_name" name="middle_name" autocomplete="off" value="{{ old('middle_name') }}" require >
                    <span class="text-red">
                              <strong class="middle_name" style="color:red"></strong>
                    </span>
                </div>
                <div class="col-md-3 col-sm-3 form-group has-feedback">                         
                <label>Last Name</label>
                    <input type="text" class="form-control" id="edit_last_name" name="last_name" autocomplete="off" value="{{ old('last_name') }}" require >
                    <span class="text-red">
                              <strong class="last_name" style="color:red"></strong>
                    </span>
                </div>

                <div class="col-md-2 col-sm-2 form-group has-feedback">                         
                <label>Suffix</label>
                    <input type="text" class="form-control" id="edit_suffix" name="suffix" autocomplete="off" value="{{ old('suffix') }}" require >
                    <span class="text-red">
                              <strong class="suffix" style="color:red"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Company name</label>
                    <input type="text" class="form-control" id="edit_company_name" name="company_name" autocomplete="off" value="{{ old('company_name') }}" require >
                    <span class="text-red">
                              <strong class="company_name" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Supplier display name</label>
                    <input type="text" class="form-control" id="edit_supplier_display_name" name="customer_display_name" autocomplete="off" value="{{ old('customer_display_name') }}" require >
                    <span class="text-red">
                              <strong class="customer_display_name" style="color:red;"></strong>
                    </span>
                </div>
                
                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Email</label>
                    <input type="text" class="form-control" id="edit_email" name="email" autocomplete="off" value="{{ old('email') }}" require >
                    <span class="text-red">
                              <strong class="email" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Phone No</label>
                    <input type="text" class="form-control" id="edit_phone_no" name="phone_no" autocomplete="off" value="{{ old('phone_no') }}" require >
                    <span class="text-red">
                              <strong class="phone_no" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Mobile No</label>
                    <input type="text" class="form-control" id="edit_mobile_no" name="mobile_no" autocomplete="off" value="{{ old('mobile_no') }}" require >
                    <span class="text-red">
                              <strong class="mobile_no" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Fax</label>
                    <input type="text" class="form-control" id="edit_fax" name="fax" autocomplete="off" value="{{ old('fax') }}" require >
                    <span class="text-red">
                              <strong class="fax" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Other</label>
                    <input type="text" class="form-control" id="edit_other" name="other" autocomplete="off" value="{{ old('other') }}" require >
                    <span class="text-red">
                              <strong class="other" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Website</label>
                    <input type="text" class="form-control" id="edit_website" name="website" autocomplete="off" value="{{ old('website') }}" require >
                    <span class="text-red">
                              <strong class="website" style="color:red;"></strong>
                    </span>
                </div>

                
                <h4>Address</h4>
                
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                  <label>Street address</label>
                    <textarea type="text" class="form-control" id="edit_street_address" name="street_address" require ></textarea>
                    <span class="text-red">
                              <strong class="street_address" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                  <label>City</label>
                    <input type="text" class="form-control" id="edit_city" name="city" autocomplete="off" value="{{ old('city') }}" require >
                    <span class="text-red">
                              <strong class="city" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                  <label>County</label>
                    <input type="text" class="form-control" id="edit_county" name="county" autocomplete="off" value="{{ old('county') }}" require >
                    <span class="text-red">
                              <strong class="county" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                  <label>Post Code</label>
                    <input type="text" class="form-control" id="edit_post_code" name="post_code" autocomplete="off" value="{{ old('post_code') }}" require >
                    <span class="text-red">
                              <strong class="post_code" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                  <label>Country</label>
                    <input type="text" class="form-control" id="edit_country" name="country" autocomplete="off" value="{{ old('country') }}" require >
                    <span class="text-red">
                              <strong class="country" style="color:red;"></strong>
                    </span>
                </div>

              
                <h4>Notes and Attachements</h4>
                <div class="col-md-12 col-sm-12 form-group has-feedback">                         
                <label>notes</label>
                    <textarea type="text" class="form-control" id="edit_notes" name="notes" require ></textarea>
                    <span class="text-red">
                              <strong class="notes" style="color:red;"></strong>
                    </span>
                </div>

                <div class="col-md-12 col-sm-12 form-group has-feedback">
                  <label>Attachment</label>
                    <input type="file" class="form-control" id="edit_attachment" name="attachment" autocomplete="off" value="{{ old('attachment') }}" require >
                    <span class="text-red">
                      <strong class="attachment" style="color:red;"></strong>
                    </span>
                </div>

                <h4>Additional Info</h4>

                <p>Expense rates</p>
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                  <label>Billing rate (/hr)</label>
                    <input type="text" class="form-control" id="edit_billing_rate" name="billing_rate" >
                    <span class="text-red">
                        <strong class="billing_rate" style="color:red;"></strong>
                    </span>
                </div>

                <p>Payments</p>
                <div class="col-md-6 col-sm-6 form-group has-feedback">              
                  <label>Terms</label>
                    <select class="form-control" id="edit_payment_terms" required="required" name="payment_terms">
                    <option>Due on receipt</option>
                    <option>Net 15</option>
                    <option>Net 28</option>
                    <option>Net 30</option>
                    <option>Net 60</option>
                  </select>
                    <span class="text-red">
                              <strong class="payment_terms" style="color:red;"></strong>
                    </span>
                </div>
                <div class="col-md-6 col-sm-6 form-group has-feedback">
                  <label>Account no</label>
                    <input type="text" class="form-control" id="edit_account_no" name="account_no" >
                    <span class="text-red">
                        <strong class="account_no" style="color:red;"></strong>
                    </span>
                </div>

                <p>Accounting</p>
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                  <label>Default expense category</label>
                    <select class="form-control" id="edit_expense_category" required="required" name="expense_category">
                    <option>Choose Account</option>
                    <option>Advertising</option>
                    <option>Bank Charges</option>
                  </select>
                    <span class="text-red">
                        <strong class="expense_category" style="color:red;"></strong>
                    </span>
                </div>                
                
               <p>Opening balance (?)</p> 
                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Opening balance</label>
                    <input type="text" class="form-control" id="edit_opening_no" name="opening_no" autocomplete="off" value="{{ old('opening_no') }}" require >
                    <span class="text-red">
                      <strong class="opening_no" style="color:red;"></strong>
                    </span>
                </div>
                <div class="col-md-6 col-sm-6 form-group has-feedback">                         
                <label>Ask of</label>
                    <input type="date" class="form-control" id="edit_ask_of_date" name="ask_of_date" autocomplete="off" value="{{ old('ask_of_date') }}" require >
                    <span class="text-red">
                        <strong class="ask_of_date" style="color:red;"></strong>
                    </span>
                </div>
                
                     
                <input type="hidden" name="edit_id" id="edit_id" value="">
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" id="add_supplier_form_btn">Submit</button>
            </div>
        </form>    

    </div>
  </div>
</div>
@section('customerscript')
<script type="text/javascript">




</script>
@endsection

