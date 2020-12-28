@extends('admin.layout.app')
@section('content')



<div class="container-fluid">
@if(Session::has('success'))
    <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-success" >

        {{Session::get('success')}}

        </div>
    @endif

    @if ($errors->any())
            <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-danger" >
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
	 @endif                    
                                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Order Priority</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
												<div class="form-group">
												<label class="form-label">Order No</label>
												<input type="number" class="form-control" name="order_priority" id="order_no">
												<input type="hidden"  id="content_id">
											</div>
												</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="save_order_priority()">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
				<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>All Content</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                         
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Homepage Content</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title"></h4>
										<a href="{{route('add_subjective_question_interface')}}" class="btn btn-primary">+ Add new</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 845px;font-size:12px">
												<thead>
													<tr>
														<th>#</th>
														<th>Chapter Name</th>
                                                        <th>Topic Name</th>
                                                        <th>Paragraph</th>
														<th>Question1</th>
                                                        <th>Answer1</th>
                                                        <th>Question2</th>
                                                        <th>Answer2</th>
                                                        <th>Question3</th>
                                                        <th>Answer3</th>
                                                        <th>Question4</th>
                                                        <th>Answer4</th>
                                                        <th>tag</th>
	
                                                        <th>Action</th>
                                                        
													</tr>
												</thead>
												<tbody>
                                                    
                                                    @foreach($contents as $content)
													<tr>
													<?php
													$checked = $content->status=='1'?'checked':'';
													?>
														<td><strong>{{$content->sl_no}}</strong></td>
														<td>{{$content->topic->chapter->chapter_name}}</td>
                                                        <td>{{$content->topic->topic_name}}</td>
                                                        @if($content->paragraph_type=='text')
														<td>{{$content->paragraph}}</td>
                                                        @else
                    
                                                            <td><img  src="../{{$content->paragraph}}" width="200px" height="150px" ></td>
                                                        
                                                        @endif
                                                        <td>{{$content->question1}}</td>
                                                        <td>{{$content->answer1}}</td>
                                                        <td>{{$content->question2}}</td>
                                                        <td>{{$content->answer2}}</td>
                                                        <td>{{$content->question3}}</td>
                                                        <td>{{$content->answer3}}</td>
                                                        <td>{{$content->question4}}</td>
                                                        <td>{{$content->answer4}}</td>
                                                        <td>{{$content->tag}}</td>
													
														<td>
															<a href="edit_topic_content/{{$content->id}}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
															<a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="subjective_question_delete({{$content->id}})"><i class="la la-trash-o"></i></a>
                                                        </td>
                                                       										
													</tr>
												
												@endforeach
													
													
												</tbody>
											</table>
										</div>
									</div>
                                </div>
                            </div>
							
						</div>
					</div>
				</div>
			   
            </div>
 
@endsection
@section('page_js')
<script src="{{asset('assets')}}/admin/js/admin.js?{{time()}}"></script>
@endsection