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