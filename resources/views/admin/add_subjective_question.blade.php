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

.tab-content > div:nth-last-child(-n+1) {
  display:none;
}
  



</style>
@endsection
@section('content')
<div class="container-fluid">
				
				<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Content</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Homepage Content</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Content</a></li>
                        </ol>
                    </div>
                </div>
                <ul class="tab-group">
                        <li class="tab tab_li active"><a href="#text">Text</a></li>
                        <li class="tab tab_li"><a href="#image">Image</a></li>
                        
                    </ul>


				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                    <div class="tab-content">
                        <div id="text">
                           
							<div class="card-body">
                                <form action="{{route('add_subjective_question_text')}}" method="post" enctype="multipart/form-data">
                                @csrf
									<div class="row"> 
										

								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
                                        <label>Select chapter:</label>
                                            <select class="form-control chapter">
                                               
                                            </select>
                                    </div>
								</div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
                                     <label>Select Topic:</label>
                                            <select class="form-control topic" name="topic_id">
                                                <option>Select Chapter First</option>
                                            </select>
                                    </div>
								</div>
								

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Paragraph</label>
                                                <textarea class="form-control" rows="6" name="paragraph"></textarea>
											</div>
										</div>
										
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Question1</label>
												<input type="text" class="form-control" name="question1">
                                                <input type="hidden" class="form-control" name="paragraph_type" value="text">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Answer1</label>
												<input type="text" class="form-control" name="answer1">
                                               
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Question2</label>
												<input type="text" class="form-control" name="question2">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Answer2</label>
												<input type="text" class="form-control" name="answer2">
                                               
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Question3
                                                </label>
												<input type="text" class="form-control" name="question3">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Answer3</label>
												<input type="text" class="form-control" name="answer3">
                                               
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Question4</label>
												<input type="text" class="form-control" name="question4">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Answer4</label>
												<input type="text" class="form-control" name="answer4">
                                               
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Tag</label>
												<input type="text" class="form-control" name="tag">
											</div>
										</div>
									
								
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" class="btn btn-primary">Submit</button>
											<button type="submit" class="btn btn-light">Cencel</button>
										</div>
									</div>
								</form>
                            </div>
                        </div>


                        <div id="image">
                           
							<div class="card-body">
                                <form action="{{route('add_subjective_question_image')}}" method="post" enctype="multipart/form-data">
                                @csrf
									<div class="row"> 
										

								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
                                        <label>Select chapter:</label>
                                            <select class="form-control chapter">
                                               
                                            </select>
                                    </div>
								</div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
                                     <label>Select Topic:</label>
                                            <select class="form-control topic" name="topic_id">
                                                <option>Select Chapter First</option>
                                            </select>
                                    </div>
								</div>
								

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Paragraph Image: </label><br>
                                                <input type="file" name="image"  class="dropify" data-default-file=""  accept="image/*" multiple required>
											</div>
										</div>
										
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Question1</label>
												<input type="text" class="form-control" name="question1">
                                                <input type="hidden" class="form-control" name="paragraph_type" value="image">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Answer1</label>
												<input type="text" class="form-control" name="answer1">
                                               
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Question2</label>
												<input type="text" class="form-control" name="question2">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Answer2</label>
												<input type="text" class="form-control" name="answer2">
                                             
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Question3
                                                </label>
												<input type="text" class="form-control" name="question3">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Answer3</label>
												<input type="text" class="form-control" name="answer3">
                                               
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Question4</label>
												<input type="text" class="form-control" name="question4">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Answer1</label>
												<input type="text" class="form-control" name="answer4">
                                                
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Tag</label>
												<input type="text" class="form-control" name="tag">
											</div>
										</div>
									
								
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" class="btn btn-primary">Submit</button>
											<button type="submit" class="btn btn-light">Cencel</button>
										</div>
									</div>
								</form>
                            </div>
                        </div>
                    </div>



                        </div>
                    </div>
				</div>
            
                
            </div>
@endsection
@section('page_js')
<script src="{{asset('assets')}}/admin/js/subjective_question.js?{{time()}}"></script>
<script>



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