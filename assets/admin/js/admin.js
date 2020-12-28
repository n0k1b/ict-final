$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    
})

function home_page_content_active_status(id)
{
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'home_page_content_active_status_update/'+id,
        success: function (data) {
           
            
        }
    })
}

function home_page_content_delete(id)
{

    var conf=confirm('Are you sure?');
    
    if(conf==true){
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'home_page_content_delete/'+id,
        success: function (data) {
           alert('Content Delete Successfully')
           location.reload();
            
        }
    })
}
}

function chapter_content_active_status(id)
{
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'chapter_content_active_status_update/'+id,
        success: function (data) {
           
            
        }
    })
}

function chapter_content_delete(id)
{

    var conf=confirm('Are you sure?');
    
    if(conf==true){
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'chapter_content_delete/'+id,
        success: function (data) {
           alert('Content Delete Successfully')
           location.reload();
            
        }
    })
}
}

function topic_content_active_status(id)
{
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'topic_content_active_status_update/'+id,
        success: function (data) {
           
            
        }
    })
}

function topic_content_delete(id)
{

    var conf=confirm('Are you sure?');
    
    if(conf==true){
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'topic_content_delete/'+id,
        success: function (data) {
           alert('Content Delete Successfully')
           location.reload();
            
        }
    })
}
}

function topic_priority_edit(id)
{
   
   $('#content_id').val(id); 
   $('.modal').modal('show');
}

function save_order_priority()
{
    var id =  $('#content_id').val();
    var order_no = $("#order_no").val();
    var formdata = new FormData();
    formdata.append('id',id);
    formdata.append('order_no',order_no);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'post',
        data:formdata,
        url: 'save_order_priority',
        success: function (data) {
           alert('Order Priority Updated');
           location.reload();
            
        }
    })

    

}

function subjective_question_delete(id)
{
    var conf=confirm('Are you sure?');
    
    if(conf==true){
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'subjective_question_delete/'+id,
        success: function (data) {
           alert('Content Delete Successfully')
           location.reload();
            
        }
    })
}
}

function objective_question_delete(id)
{
    var conf=confirm('Are you sure?');
    
    if(conf==true){
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'objective_question_delete/'+id,
        success: function (data) {
           alert('Content Delete Successfully')
           location.reload();
            
        }
    })
}
}


