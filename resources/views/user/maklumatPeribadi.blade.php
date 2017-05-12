@extends('layouts.master')

@section('head')

@stop

@section('title')
    Maklumat Peribadi
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Maklumat Peribadi</a>
    </li>
@stop

@section('content')
<div class="row">
	<div class="col-md-3">
		@if($user->image == '')
			<img src="https://dummyimage.com/300" class="img-responsive">
		@else
			<img src="images/{{$user->image}}" class="img-responsive">
		@endif
	</div>
	<div class="col-md-9">
		<!-- BEGIN BORDERED TABLE PORTLET-->
	    <div class="portlet box blue-dark">
	        <div class="portlet-title">
	            <div class="caption">
	                <i class="icon-calendar font-white"></i>
	                <span class="caption-subject font-white sbold uppercase">Maklumat Peribadi</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	        	<div class="table-scrollable table-scrollable-borderless">
	                {!! Form::open(['method'=>'PATCH', 'action'=>'UserController@updateMaklumatPeribadi', 'files'=>true]) !!}
	                	<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Nama</label>
				            <div class="col-md-8">
				                    <input type="text" name="name" class="form-control input-line" id="username" value="{{ $user->name }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Jawatan</label>
				            <div class="col-md-8">
				                    <input type="text" name="jawatan" class="form-control input-line" id="username" value="{{ $user->jawatan }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Fakulti</label>
				            <div class="col-md-8">
				                    <input type="text" name="fakulti" class="form-control input-line" id="username" value="{{ $user->fakulti }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Jabatan</label>
				            <div class="col-md-8">
				                    <input type="text" name="jabatan" class="form-control input-line" id="username" value="{{ $user->jabatan }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">No Telefon</label>
				            <div class="col-md-8">
				                    <input type="text" name="phone" class="form-control input-line" id="username" value="{{ $user->phone }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Gambar</label>
				            <div class="col-md-8">
				                    <input class="form-control input-line" type="file" name="image" id="fileToUpload">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				        	<div class="col-md-8 col-md-offset-4">
				            	<button class="btn btn-transparent blue active"> Kemaskini </button>
				            </div>
				        </div>

				        <input type="hidden" name="id" value="{{ $user->id }}">
				    {!! Form::close() !!}
	            </div>
	        </div>
	    </div>
	    <!-- END BORDERED TABLE PORTLET-->
	    <div class="row">
        	
        </div>
	</div>

    
</div>
@stop

@section('script')

<script src="../../assets/global/plugins/icheck/icheck.min.js"></script>

<script src="../../assets/admin/pages/scripts/form-icheck.js"></script>

<script> FormiCheck.init();  </script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop