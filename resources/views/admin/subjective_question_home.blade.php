@extends('admin.layout.app')

@section('content')
    <div class="container-fluid" style="margin:25%;margin-top:10%">

        <div class="row">
        <div class="col-xl-6 col-sm-6 col-xxl-6 col-lg-6" >
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{route('show_content')}}" method="post">
                                        @csrf
                                    <div class="form-group">
                                    <label>Select chapter:</label>
                                            <select class="form-control" id="chapter">
                                               
                                            </select>
                                    </div>

                                    <div class="form-group">
                                    <label>Select Topic:</label>
                                            <select class="form-control" id="topic" name="topic_id">
                                                <option>Select Chapter First</option>
                                            </select>
                                    </div>
                                 
											<button type="submit" style="float:right" class="btn btn-primary">Submit</button>
										
										
										
                                    
										
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
        </div>
    </div>
@endsection

@section('page_js')
<script src="{{asset('assets')}}/admin/js/content-home.js?{{time()}}"></script>
@endsection