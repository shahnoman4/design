
//for dataTable data
var InitTable = function(){
    $('#table_data').DataTable({
      "bDestroy": true,
      "processing":true,
      "serverSide":true,
      "ajax"   : dataTableRoute,
      "columns": data
    });
  }

// for Form insert data

$('#add-form-btn').on('click', function(e) {
  //var data = $('#add-form').serializeArray();
  var data = $('#add-form')[0];
  var formData = new FormData(data);
  event.preventDefault();
  $.ajax({
      data: formData,
      type: $('#add-form').attr('method'),
      url: $('#add-form').attr('action'),
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
      var success = $("."+index);
      scrollTo(success,-100);
      }
      else
      {

      InitTable();
      $('.success').html(response);
      $('#success').show();
      $('#add-form')[0].reset();
      var succ = $('.success');
      scrollTo(succ,-100);

      }
      }
      });
});


// for edit form
$(document).on('click', '.edit', function()
{
    var id = $(this).attr('data-id');
    $.ajax({
        "url": editRoute,
        type: "POST",
        data: {'id': id,_token: token},
        dataType : "json",
        success: function(data)
        {
          $.each(data, function( index, value ) {
          $('#edit_'+index).val(value);
          
          });
                                
          var success = $('#add-form');
          scrollTo(success,-100);
        },
          error: function(){},          
      });
});

// code for add form modal show
$(document).on('click', '.addModelbtn', function()
{
    $('#addModel').modal('show');
    $('#edit_id').val('');
    $('#add_form')[0].reset();

});
// code for add form
$('#add_form_btn').on('click', function(e) {
  //var data = $('#add_form').serializeArray();
  e.preventDefault();
  var data = $('#add_form')[0];
  var formData = new FormData(data);
  $.ajax({
  data: formData,
  type: $('#add_form').attr('method'),
  url: $('#add_form').attr('action'),
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
    //swal("Success",response, "success");
    InitTable();
    //$('.success').html(response);
   // $('#success').show();
    new PNotify({
                title: 'Success',
                text: response,
                type: 'success',
                hide: true,
                styling: 'bootstrap3'
            });
    $('#add_form')[0].reset();
    $('#addModel').modal('hide');
  }
  }
  });
});


$(document).on('click', '.edit_model', function()
{

var id = $(this).attr('data-id');
$.ajax({
  "url": editRoute,
  type: "POST",
  data: {'id': id,_token: token},
  dataType : "json",
  success: function(data)
  {

    $.each(data, function( index, value ) {
     if(index!="image"){
       $('#edit_'+index).val(value);
     } 
    
    });

    $('#addModel').modal('show');
  },
    error: function(){},          
});

});


$(document).on('click', '.show_model', function()
{

var id = $(this).attr('data-id');
$.ajax({
  "url": showRoute,
  type: "POST",
  data: {'id': id,_token: token},
  dataType : "json",
  success: function(data)
  {

    $.each(data, function( index, value ) {
    $('#show_'+index).html(value);
    });

    
    if(data.customer){

        var customerHtml = data.customer.city+', '+data.customer.state+'<br>'+data.customer.country+'<br>Phone: '+data.customer.mobile_no+'<br>Email: '+data.customer.email;
        $('#show_customer_detail').html(customerHtml);
    }

    if(data.vessel){

        var vesselHtml = '<b>Vessel Name: </b>'+data.vessel.vessel_name+'<br><b>Vessel Arrival Date:</b> '+data.vessel.arrival_at+'<br><b>Vessel Completion Date:</b> '+data.vessel.completion_at+'<br>';
        $('#show_vessel_detail').html(vesselHtml);
    }


    if(data.revenue_item && data.type=="Indirect"){

        var cardHtml;
        $.each(data.revenue_item, function(key,value) {


        var tier ="";
        var rate =""; 
        var weight="";
        var extended_price="";
       $.each(value.tierArray, function(index,row) {
               tier += row.lastTierDays+'</br>'; 
               rate += row.item_rate+ '</br>';
               weight += row.weight+ '</br>';
               extended_price += row.extended_price+ '</br>';
       });



          cardHtml += '<tr><td>'+value.item.item_code+'-'+value.item.item_name+'-'+value.item.service_type.name+'</td><td>'+tier+'</td><td>'+rate+'</td><td>'+weight+'</td><td>'+extended_price+'</td>';
        });
       cardHtml += '<tr><td colspan="4"></td><td>Total:   '+data.basic_amount+'</td></tr>';
       $('#cardItem').html(cardHtml);

      var totalWithTax = '<tr><th>Total:</th><td> '+data.basic_amount+'</td></tr><tr><th>NHIL('+nhil_tax+'%):</th><td> '+data.nhil_tax+'</td></tr><tr><th>GeTFund('+gfund_tax+'%):</th><td> '+data.gfund_tax+'</td></tr><tr><th>Covid Levy('+covid_levy_tax+'%):</th><td> '+data.covid_levy_tax+'</td></tr><tr><th>Sub Total:</th><td> '+data.sub_total+'</td></tr><tr><th>VAT('+vat_tax+'%):</th><td> '+data.vat_tax+'</td></tr><tr><th>Total Payable:</th><td> '+data.total_amount+'</td></tr>';
      $('#TotalWithTax').html(totalWithTax);

      
    }

    if(data.revenue_item && data.type=="Direct"){

        var cardHtml;
        $.each(data.revenue_item, function(key,value) {

            cardHtml += '<tr><td>'+value.item.item_code+ '-' +value.item.item_name+ '-'+ value.item.service_type.name+'</td><td>'+value.rate+'</td><td>'+value.weight+'</td><td>'+value.sub_total+'</td>';
        });
       cardHtml += '<tr><td colspan="3"></td><td>Total:   '+data.basic_amount+'</td></tr>';
       $('#cardItem').html(cardHtml);

      var totalWithTax = '<tr><th>Total:</th><td> '+data.basic_amount+'</td></tr><tr><th>NHIL('+nhil_tax+'%):</th><td> '+data.nhil_tax+'</td></tr><tr><th>GeTFund('+gfund_tax+'%):</th><td> '+data.gfund_tax+'</td></tr><tr><th>Covid Levy('+covid_levy_tax+'%):</th><td> '+data.covid_levy_tax+'</td></tr><tr><th>Sub Total:</th><td> '+data.sub_total+'</td></tr><tr><th>VAT('+vat_tax+'%):</th><td> '+data.vat_tax+'</td></tr><tr><th>Total Payable:</th><td> '+data.total_amount+'</td></tr>';
      $('#TotalWithTax').html(totalWithTax);

    }
    
    $('#showModel').modal('show');
  },
    error: function(){},          
});

});

$(document).on('click', '.edit_diff_model', function()
{
  var id = $(this).attr('data-id');
  $.ajax({
  "url": editRoute,
  type: "POST",
  data: {'id': id,_token: token},
  dataType : "json",
  success: function(data)
  {

  $.each(data, function( index, value ) {
  $('#edit_'+index).val(value);
  });

  $('#edit_diff_model').modal('show');
  },
  error: function(){},          
  });
});

// code for add with different model form
function AddDifferentModel(AddDiffFormId, AddDiffFormModel){
var data = $(AddDiffFormId).serializeArray();
event.preventDefault();
$.ajax({
data: data,
type: $(AddDiffFormId).attr('method'),
url: $(AddDiffFormId).attr('action'),
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
    InitTable();
    swal("Success",response, "success");
    //$('.success').html(response);
   // $('#success').show();
    $(AddDiffFormId)[0].reset();
    $(AddDiffFormModel).modal('hide');
    
  }
}
});
}

// code for edit different model form
function EditDifferentModel(editDiffFormId, editDiffFormModel){
var data = $(editDiffFormId).serializeArray();
event.preventDefault();
$.ajax({
data: data,
type: $(editDiffFormId).attr('method'),
url: $(editDiffFormId).attr('action'),
success: function(response)
{
  if(response.errors)
  {
     $.each(response.errors, function( index, value ) {
      $(".edit_"+index).html(value);
      $(".edit_"+index).fadeIn('slow', function(){
        $(".edit_"+index).delay(3000).fadeOut(); 
      });
    });

  }
  else
  {
    InitTable();
    $('.success').html(response);
    $('#success').show();
    $(editDiffFormId)[0].reset();
    $(editDiffFormModel).modal('hide');
    
  }
}
});
}


// code for active and disable

// $(document).on('click', '.disable', function()
// {
    
//     var id = $(this).attr('data-id');
//     $.ajax({
//         "url": disableRoute,
//         type: "POST",
//         data: {'id': id,_token: token},
//         dataType : "json",
//         success: function(response)
//         {
//           InitTable();
//           swal("Success",response, "error");
//           //$('.delete').html(response);
//           //$('#delete').show();
//         },
//           error: function(){},          
//       });
// });

$(document).on('click', '.disable', function () {
    if (confirm('Are you sure you want to delete this?')) {
            var id = $(this).attr('data-id');
            $.ajax({
                "url": disableRoute,
                type: "POST",
                data: {'id': id, _token: token},
                dataType: "json",
                success: function (response) {
                    InitTable();
                  new PNotify({
                          title: 'Deleted',
                          text: response,
                          type: 'error',
                          hide: true,
                          styling: 'bootstrap3'
                      });  
                    //swal("Success",response, "error");
                    //$('.delete').html(response);
                    //$('#delete').show();
                },
                error: function () {
                },
            });
        }
    });

$(document).on('click', '.active', function()
{

    var id = $(this).attr('data-id');
    $.ajax({
        "url": activeRoute,
        type: "POST",
        data: {'id': id,_token: token},
        dataType : "json",
        success: function(response)
        {
          InitTable();
          swal("Success",response, "success");
         // $('.success').html(response);
         // $('#success').show();
        },
          error: function(){},          
      });
});