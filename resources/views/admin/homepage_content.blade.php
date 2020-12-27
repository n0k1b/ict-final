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
										<a href="{{route('add_homepage_content_interface')}}" class="btn btn-primary">+ Add new</a>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>#</th>
														<th>Content Name</th>
														<th>Description</th>
														<th>Button Text</th>
														<th>Image</th>
														<th>Active Status</th>
					
                                                        <th>Content Edit</th>
                                                        <th>Image Edit</th>
													</tr>
												</thead>
												<tbody>
                                                    
                                                    @foreach($contents as $content)
													<tr>
													<?php
													$checked = $content->status=='1'?'checked':'';
													?>
														<td><strong>{{$content->sl_no}}</strong></td>
														<td>{{$content->main_topic_name}}</td>
														<td>{{$content->main_topic_description}}</td>
													
														<td>{{$content->main_topic_button_text}}</td>
                                                        <td><img  width="100" src="../{{$content->main_topic_image}}"  alt=""></td>
														<td> <label class="switch">
															<input type="checkbox"  onclick="home_page_content_active_status({{$content->id}})" {{$checked}}>
																<span class="slider round"></span>
															</label></td>
														<td>
															<a href="edit_homepage_content/{{$content->id}}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
															<a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="home_page_content_delete({{$content->id}})"><i class="la la-trash-o"></i></a>
                                                        </td>
                                                        <td>
															<a href="edit_homepage_image/{{$content->id}}" class="btn btn-sm btn-info"><i class="la la-pencil"></i></a>
									
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