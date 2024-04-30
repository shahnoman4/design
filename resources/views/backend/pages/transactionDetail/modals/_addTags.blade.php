<div class="modal fade bs-example-modal-md" tabindex="-1" id="addTagModel" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content" style="width: 622px;">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Manage Your Tags</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      </br>
      <div class="tagsTable">
          <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>All Tags</h2>
                    <p class="float-right mb-2">
                      <a href="#" class="btn btn-info createGroupbtn"><span class="fa fa-plus"></span> Create Groups</a>
                    </p>
                    <p class="float-right mb-2">
                      <a href="#" class="btn btn-info createTagbtn"><span class="fa fa-plus"></span> Create Tags</a>
                    </p>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action" id="table_tag_data">
                      <thead>
                        <tr class="headings">
                          <th class="column-title">Tag ID </th>
                          <th class="column-title">Tag Name </th>
                          <th class="column-title">Group Name </th>
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
      <div class="tagForm" style="display:none;">
              <div class="x_title">
                <h2>Add Tag</h2>
                <p class="float-right mb-2">
                  <a href="#" class="btn btn-info Back_tag"><span class="fa fa-arrow"></span> Back</a>
                </p>
                <div class="clearfix"></div>
              </div>
          <form action="{{route('tag.create')}}" class="form" id="add_tag_form" method="POST">
                <div class="modal-body">
                  @csrf                          
                  <label>Tag Name</label>
                  <div class="form-group">
                      <input type="text" class="form-control" id="edit_tag_tag_name" name="tag_name"  autocomplete="off" value="{{ old('tag_name') }}" require >
                      <span class="text-red">
                                <strong class="tag_name"></strong>
                      </span>
                  </div>

                  <label>Group Name</label>
                  <div class="form-group">
                      <select type="text" class="form-control" id="edit_tag_group_id" name="group_id" require >
                      </select>  
                      <span class="text-red">
                                <strong class="group_id"></strong>
                      </span>
                  </div>

                       
                  <input type="hidden" name="edit_tag_id" id="edit_tag_id" value="">
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="add_tag_form_btn">Submit</button>
              </div>
          </form>    
      </div>
      <div class="groupForm" style="display:none;">
            <div class="x_title">
              <h2>Add Group</h2>
              <p class="float-right mb-2">
                <a href="#" class="btn btn-info Back_tag"><span class="fa fa-arrow"></span> Back</a>
              </p>
              <div class="clearfix"></div>
            </div>
          <form action="{{route('group.create')}}" class="form" id="add_group_form" method="POST">
                <div class="modal-body">
                  @csrf                          
                  <label>Group Name</label>
                  <div class="form-group">
                      <input type="text" class="form-control" id="edit_group_group_name" name="group_name" autocomplete="off" value="{{ old('group_name') }}" require >
                      <span class="text-red">
                                <strong class="group_name"></strong>
                      </span>
                  </div>
                       
                  <input type="hidden" name="edit_group_id" id="edit_group_id" value="">
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="add_group_form_btn">Submit</button>
              </div>
          </form> 

          <div class="clearfix"></div>
         <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action" id="table_group_data">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Group ID </th>
                    <th class="column-title">Group Name </th>
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
@section('tagscript')
<script type="text/javascript">
  function InitTagTable(){
      $('#table_tag_data').DataTable({
        "bDestroy": true,
        "processing":true,
        "serverSide":true,
        "ajax"   : "{{route('fetch.tag')}}",
        "columns": [
                  { "data": "id" },
                  { "data": "tag_name" },
                  { "data": "group_name" },
                  { "data": "options" ,"orderable":false},
              ]
      });
    }
  function InitGroupTable(){
      $('#table_group_data').DataTable({
        "bDestroy": true,
        "processing":true,
        "serverSide":true,
        "ajax"   : "{{route('fetch.group')}}",
        "columns": [
                  { "data": "id" },
                  { "data": "group_name" },
                  { "data": "options" ,"orderable":false},
              ]
      });
    }    
    $( document ).ready(function() {  
      
      InitTagTable();
      InitGroupTable();
      GetGroup();
      GetTag();

     
    $(document).on('click', '.addTagModel', function()
    {
        $('#addTagModel').modal('show');
    });

    $(".createGroupbtn").on("click", function(){

          $('.groupForm').show();
          $('.tagForm').hide();
          $('.tagsTable').hide();
    });

    $(".createTagbtn").on("click", function(){

          $('.groupForm').hide();
          $('.tagForm').show();
          $('.tagsTable').hide();
    });

    $(document).on('click', '.Back_tag', function()
    {
          $('.groupForm').hide();
          $('.tagForm').hide();
          $('.tagsTable').show();
    });


    $('#add_group_form_btn').on('click', function(e) {
        e.preventDefault();
        var data = $('#add_group_form')[0];
        var formData = new FormData(data);
        $.ajax({
        data: formData,
        type: $('#add_group_form').attr('method'),
        url: $('#add_group_form').attr('action'),
        processData: false,
        contentType: false,
        success: function(response)
        {
          if(response.errors)
            {
            $.each(response.errors, function( index, value ) {
              $("."+index).html(value);
              $("."+index).fadeIn('slow', function(){
                $("."+index).delay(3000).fadeOut(); 
              });
            });

            }
            else
            {
              new PNotify({
                          title: 'Success',
                          text: response['success'],
                          type: 'success',
                          hide: true,
                          styling: 'bootstrap3'
                      });
              $('#add_group_form')[0].reset();
              GetGroup(response['id']);
              InitGroupTable();
            }
        },
          error: function(){},          
      });

    });

    $(document).on('click', '.edit_group_model', function()
    {

    var id = $(this).attr('data-id');
    $.ajax({
      "url": "{{route('edit.group')}}",
      type: "POST",
      data: {'id': id,_token: token},
      dataType : "json",
      success: function(data)
      {

        $.each(data, function( index, value ) {
           $('#edit_group_'+index).val(value);    
        });

      },
        error: function(){},          
    });

    });


    $('#add_tag_form_btn').on('click', function(e) {
        e.preventDefault();
        var data = $('#add_tag_form')[0];
        var formData = new FormData(data);
        $.ajax({
        data: formData,
        type: $('#add_tag_form').attr('method'),
        url: $('#add_tag_form').attr('action'),
        processData: false,
        contentType: false,
        success: function(response)
        {
          if(response.errors)
            {
            $.each(response.errors, function( index, value ) {
              $("."+index).html(value);
              $("."+index).fadeIn('slow', function(){
                $("."+index).delay(3000).fadeOut(); 
              });
            });

            }
            else
            {
              new PNotify({
                          title: 'Success',
                          text: response['success'],
                          type: 'success',
                          hide: true,
                          styling: 'bootstrap3'
                      });
              $('#add_tag_form')[0].reset();
              InitTagTable();
              GetTag();
              $('.groupForm').hide();
              $('.tagForm').hide();
              $('.tagsTable').show();
            }
        },
          error: function(){},          
      });

    });


    $(document).on('click', '.edit_tag_model', function()
    {

    var id = $(this).attr('data-id');
    $.ajax({
      "url": "{{route('edit.tag')}}",
      type: "POST",
      data: {'id': id,_token: token},
      dataType : "json",
      success: function(data)
      {

        $.each(data, function( index, value ) {
           $('#edit_tag_'+index).val(value);    
        });

          $('.groupForm').hide();
          $('.tagForm').show();
          $('.tagsTable').hide();
      },
        error: function(){},          
    });

    });



    function GetTag(){
      $.ajax({
          "url": "{{route('get.tag')}}",
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            console.log(data);
             $('#edit_main_tag_id').empty();
             var option = '<option value="">Choose option</option>';
              $.each(data, function(key, value) {
                option +='<option value="'+value.id+'">'+value.tag_name+'</option>';
              });
              $('#edit_main_tag_id').append(option);
              $('#edit_main_tag_id').select2();
          }
      });

    }


    function GetGroup(id){
      $('#edit_tag_group_id').html("");
      $.ajax({
          "url": "{{route('get.group')}}",
          type: "GET",
          dataType : "json",
      success: function(response)
      {
        console.log(response);
        var group = $('#edit_tag_group_id');
             if (response) {
                group.prop('disabled', false);
                var option = '';
                response.forEach(function (row) {
                    if (row.id === id) {
                        option += '<option value="'+row.id+'" selected="selected">'+row.group_name+'</option>';
                    }else{
                        option += '<option value="'+row.id+'">'+row.group_name+'</option>';
                    }
                    
                });
                group.append(option);
            } else {
                group.prop('disabled', true);
            }
      }
      });
    }


    }); 
</script>
@endsection