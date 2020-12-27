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
                            <div class="card-header">
								<h5 class="card-title">Basic Info</h5>
							</div>
							<div class="card-body">
                                <form action="{{route('add_topic_content')}}" method="post" enctype="multipart/form-data">
                                @csrf
									<div class="row"> 
										

								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
                                            <label>Chapter</label>
                                            <select class="form-control" id="sel1" name="chapter_id">
												@foreach($contents as $content)
                                                <option value="{{$content->id}}">{{$content->chapter_name}}</option>
                                               @endforeach
                                            </select>
                                        </div>
									</div>
										

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Topic Name</label>
												<input type="text" class="form-control" name="topic_name">
											</div>
										</div>
										
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Description</label>
												<input type="text" class="form-control" name="topic_description">
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