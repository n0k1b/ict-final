@extends('admin.layout.app')
@section('page_css')
<style>
  
  .tab_li
{
   display:block;
   float:left;
   width:200px; /* adjust */
   height:50px; /* adjust */
   padding: 5px; /*adjust*/
}

  .tab-group {
  justify-content: center;
  display: flex;
  list-style:none;
  padding:0;
  margin:0 0 40px 0;
  &:after {
    content: "";
    display: table;
    clear: both;
  }
  }
  
  .active a {
    background:#ff8f16;
    color:white;
   
  }


  .tab-content > div:nth-last-child(-n+2) {
  display:none;
}



</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="add_content_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Content</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <ul class="tab-group">
                        <li class="tab tab_li active"><a href="#text">Text</a></li>
                        <li class="tab tab_li"><a href="#image">Image</a></li>
                        <li class="tab tab_li"><a href="#header">Header</a></li>
                    </ul>
                   <div class="tab-content">
                    <div id="text">
                        
                           
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="6" id="content_text"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="button" style="float:right" onclick="add_content_text()" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        
                    </div>
                    <div id="image">
                       
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <input type="file" id="image" name="image"  accept="image/*" multiple required />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="button" class="btn btn-primary"  onclick="add_content_image()"  style="float:right">Submit</button>
                                    
                                </div>
                            </div>
                      
                    </div>

                    <div id="header">
                        
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Header</label>
                                        <input type="text" class="form-control" id= "content_header"/>
                                        <input type="hidden" id="hidden_order_no">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="button" class="btn btn-primary"  onclick="add_content_header()"  style="float:right">Submit</button>
                                   
                                </div>
                            </div>
                        
                    </div>
                </div>
                </div>
               
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit_content_modal_text">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Content</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    
                
                    
                        
                           
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="6" id="content_text_for_update"></textarea>
                                        <input type="hidden" id="hidden_content_id">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="button" style="float:right" onclick="edit_content_text()" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        
                    
                   

                   
                
                </div>
               
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit_content_modal_image">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Content</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    
                
                    
                        
                           
                        <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <input type="file" id="image_for_update" name="image"  accept="image/*" multiple required />
                                        <input type="hidden" id="hidden_content_id">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="button" class="btn btn-primary"  onclick="edit_content_image()"  style="float:right">Submit</button>
                                    
                                </div>
                            </div>
                        
                    
                   

                   
                
                </div>
               
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit_content_modal_header">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Content</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    
                
                    
                        
                           
                        <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Header</label>
                                        <input type="text" class="form-control" id="content_header_for_update" />
                                        <input type="hidden" id="hidden_content_id">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="button" class="btn btn-primary"  onclick="edit_content_header()"  style="float:right">Submit</button>
                                   
                                </div>
                            </div>
                        
                    
                   

                   
                
                </div>
               
            </div>
        </div>
    </div>

    <div class="row" id="all_content"></div>
</div>


@endsection

@section('page_js')
<script src="{{asset('assets')}}/admin/js/content-main.js?{{time()}}"></script>
<script>

var topic_id = {!! $topic_id !!};

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
 </script>
@endsection