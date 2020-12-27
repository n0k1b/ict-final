$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   
    fetch_content();
    
    
})

function fetch_content()
{
    
    var formdata = new FormData();
    formdata.append('topic_id',topic_id);

$.ajax({
    processData: false,
    contentType: false,
    type: 'post',
    data:formdata,
    url: 'get_content',
    success: function (data) {
      $("#all_content").html(data);
      // $('#topic').html(data);
  
        
    }
})
    

}

function add_content_modal(order_priority)
{

    $("#hidden_order_no").val(order_priority);
    $('#add_content_modal').modal('show');
}


function add_content_text()
{

    
    var content_text = document.getElementById("content_text").value.trim();
    var order_no = $("#hidden_order_no").val();
    
    var formdata = new FormData();
    formdata.append('topic_id',topic_id);
    formdata.append('content_text',content_text);
    formdata.append('order_no',order_no);

$.ajax({
    processData: false,
    contentType: false,
    type: 'post',
    data:formdata,
    url: 'add_content_text',
    success: function (data) {
      //$("#all_content").html(data);
      // $('#topic').html(data);
      $('#add_content_modal').modal('hide');
      fetch_content();
        
    }
})
}


function add_content_image()
{
     
  
    var order_no = $("#hidden_order_no").val();
    
    var formdata = new FormData();
    formdata.append('topic_id',topic_id);
    formdata.append('file', $('input[type=file]')[0].files[0]);
    formdata.append('order_no',order_no);
    console.log($("#image").find("input").val());


$.ajax({
    processData: false,
    
    contentType: false,
   
    type: 'post',
    data:formdata,
   
    url: 'add_content_image',
    success: function (data) {
       
      //$("#all_content").html(data);
      // $('#topic').html(data);
      $('#add_content_modal').modal('hide');
      fetch_content();
        
    }
})
}


function add_content_header()
{
    var content_header =$("#content_header").val() ;
    var order_no = $("#hidden_order_no").val();
    
    var formdata = new FormData();
    formdata.append('topic_id',topic_id);
    formdata.append('content_header',content_header);
    formdata.append('order_no',order_no);

$.ajax({
    processData: false,
    contentType: false,
    type: 'post',
    data:formdata,
    url: 'add_content_header',
    success: function (data) {
      //$("#all_content").html(data);
      // $('#topic').html(data);
      $('#add_content_modal').modal('hide');
      fetch_content();
        
    }
})
}

function edit_content_modal(id,type)
{
    alert(type);
    $("#hidden_content_id").val(id);
    if(type=='text')
    {
       
        $('#edit_content_modal_header').modal('show');
    }
    else if(type=="image")
    {
        $('#edit_content_modal_image').modal('show');
    }
    else if(type=='header')
    {
        $('#edit_content_modal_header').modal('show');
    }
}

function delete_content(id)
{ 
  
     var formdata = new FormData();
    formdata.append('topic_id',topic_id);
    formdata.append('id',id);
    
    var conf=confirm('Are you sure?');
    
    if(conf==true){
    $.ajax({
        processData: false,
        contentType: false,
        data:formdata,
        type: 'post',
        url: 'delete_content',
        success: function (data) {
           alert('Content Delete Successfully')
           fetch_content();
            
        }
    })
}
}