@extends('admin.layout.app')

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
                

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                   
                  
                           
							<div class="card-body">
                                <form action="{{route('add_objective_question_text')}}" method="post" enctype="multipart/form-data">
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
												<label class="form-label">Question</label>
                                                <textarea class="form-control" rows="4" name="question"></textarea>
											</div>
										</div>
										
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Option 1</label>
												<input type="text" class="form-control" name="option1">
                                               
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Option2</label>
												<input type="text" class="form-control" name="option2">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Option3
                                                </label>
												<input type="text" class="form-control" name="option3">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Option4</label>
												<input type="text" class="form-control" name="option4">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Correct Answer(1,2,3,4)</label>
												<input type="text" class="form-control" name="correct_answer">
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