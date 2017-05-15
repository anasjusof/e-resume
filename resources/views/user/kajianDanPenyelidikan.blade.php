@extends('layouts.master')

@section('head')

@stop

@section('title')
    Kajian Dan Penyelidikan
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Kajian Dan Penyelidikan</a>
    </li>
@stop

@section('content')
<div class="row">
	<div class="col-md-6">
		<!-- BEGIN BORDERED TABLE PORTLET-->
	    <div class="portlet box blue-dark">
	        <div class="portlet-title">
	            <div class="caption">
	                <i class="icon-calendar font-white"></i>
	                <span class="caption-subject font-white sbold uppercase">Kajian Dan Penyelidikan</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                <table class="table table-hover table-light">
	                    <thead>
	                        <tr class="uppercase">
	                        	<th> <input id="checkall-checkbox" type="checkbox"> </th>
	                            <th> # </th>
	                            <th> Tajuk </th>
	                            <th> Senarai Penyelidik </th>
	                            <th> Tahun Geran </th>
	                            <th> Sumber </th>
	                            <th> Status </th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbody">
							<?php $count = 1; ?>
	                        @foreach($kajiandanpenyelidikans as $kajiandanpenyelidikan)
	                        <?php $currentPageTotalNumber = ( $kajiandanpenyelidikans->currentPage() - 1) * 5; ?>
	                        <tr>
	                        	<td> <input class="single-checkbox" type="checkbox" name="kajiandanpenyelidikan_id[]" form="form_delete" value="{{ $kajiandanpenyelidikan->id }}"> </td>
	                            <td> {{ $count + $currentPageTotalNumber}} </td>
	                            <td> {{ $kajiandanpenyelidikan->tajuk }}</td>
	                            <td> {{ $kajiandanpenyelidikan->senarai_penyelidik }}</td>
	                            <td> {{ $kajiandanpenyelidikan->tahun_geran}}</td>
	                            <td> {{ $kajiandanpenyelidikan->sumber}}</td>
	                            <td> {{ $kajiandanpenyelidikan->status}}</td>
	                            <td> <a href="" class="btn blue editBtn" data-toggle="modal" data-target="#editModal" data-id="{{ $kajiandanpenyelidikan->id }}" data-tajuk="{{ $kajiandanpenyelidikan->tajuk }}" data-senarai_penyelidik="{{ $kajiandanpenyelidikan->senarai_penyelidik }}"  data-tahun_geran="{{ $kajiandanpenyelidikan->tahun_geran }}"  data-sumber="{{ $kajiandanpenyelidikan->sumber }}"  data-status="{{ $kajiandanpenyelidikan->status }}">Edit</a>
	                        </tr>
	                        <?php $count++ ?>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>

	            <div class="row">
		        	<div class="col-md-6">
		        		{!! Form::open(['method'=>'DELETE', 'action'=>['KajianDanPenyelidikanController@deleteKajianDanPenyelidikan'], 'id'=>'form_delete']) !!}
		        			<button type="submit" class="btn btn-sm btn-danger deleteBtn">Delete</button>
		        		{!! Form::close() !!}
		        	</div>
		        	<div class="col-md-6">
		        		<div class="pull-right">
		        			{{ $kajiandanpenyelidikans->render() }}
		        		</div>
		        	</div>
		        </div>
	        </div>
	    </div>
	    <!-- END BORDERED TABLE PORTLET-->
	</div>
	

    <div class="col-md-6">
    	<!-- BEGIN BORDERED TABLE PORTLET-->
	    <div class="portlet box blue-dark">
	        <div class="portlet-title">
	            <div class="caption">
	                <i class="icon-calendar font-white"></i>
	                <span class="caption-subject font-white sbold uppercase">Tambah Kajian Dan Penyelidikan</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                {!! Form::open(['method'=>'POST', 'action'=>'KajianDanPenyelidikanController@createKajianDanPenyelidikan']) !!}
	                	<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Tajuk</label>
				            <div class="col-md-8">
				                    <input type="text" name="tajuk" class="form-control input-line" id="" value="{{ old('tajuk') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Senarai Penyelidik</label>
				            <div class="col-md-8">
				                    <input type="text" name="senarai_penyelidik" class="form-control input-line" id="" value="{{ old('senarai_penyelidik') }}">
				            </div>
				        </div>
						<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Tahun Geran</label>
				            <div class="col-md-8">
				                    <input type="text" name="tahun_geran" class="form-control input-line" id="" value="{{ old('tahun_geran') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Sumber</label>
				            <div class="col-md-8">
				                    <input type="text" name="sumber" class="form-control input-line" id="" value="{{ old('sumber') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Status</label>
				            <div class="col-md-8">
				                    <input type="text" name="status" class="form-control input-line" id="" value="{{ old('status') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <button class="btn btn-primary"> Tambah </button>
				        </div>

				        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
				    {!! Form::close() !!}
	            </div>
	        </div>
	    </div>
	    <!-- END BORDERED TABLE PORTLET-->
    </div>
    
</div>

<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kemaskini Maklumat</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	{!! Form::open(['method'=>'PATCH', 'action'=>'KajianDanPenyelidikanController@updateKajianDanPenyelidikan']) !!}
      		<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Tajuk</label>
	            <div class="col-md-8">
	                    <input type="text" name="tajuk" class="form-control input-line" id="m_tajuk">
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Senarai Penyelidik</label>
	            <div class="col-md-8">
	                    <input type="text" name="senarai_penyelidik" class="form-control input-line" id="m_senarai_penyelidik">
	            </div>
	        </div>
			<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Tahun Geran</label>
	            <div class="col-md-8">
	                    <input type="text" name="tahun_geran" class="form-control input-line" id="m_tahun_geran" >
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Sumber</label>
	            <div class="col-md-8">
	                    <input type="text" name="sumber" class="form-control input-line" id="m_sumber" >
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Status</label>
	            <div class="col-md-8">
	                    <input type="text" name="status" class="form-control input-line" id="m_status" >
	            </div>
	        </div>
	        <input type="hidden" name="id" id="m_kajiandanpenyelidikan_id">	    
	  	</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>
@stop

@section('script')

<script src="../../assets/global/plugins/icheck/icheck.min.js"></script>

<script src="../../assets/admin/pages/scripts/form-icheck.js"></script>

<script> FormiCheck.init();  </script>

<script>
	$(document).ready(function(){
       $('#checkall-checkbox').click(function(){
            if(this.checked){
                $('.checker').find('span').addClass('checked');
                $("input.single-checkbox").prop('checked', true).show();
            }
            else{
                $('.checker').find('span').removeClass('checked');
                $("input.single-checkbox").prop('checked', false);
            }
       });

       $('.editBtn').click(function(){
       		$("#m_kajiandanpenyelidikan_id").val($(this).data('id'));
		 	$("#m_tajuk").val($(this).data('tajuk'));
		 	$("#m_senarai_penyelidik").val($(this).data('senarai_penyelidik'));
		 	$("#m_tahun_geran").val($(this).data('tahun_geran'));
		 	$("#m_sumber").val($(this).data('sumber'));
		 	$("#m_status").val($(this).data('status'));
       });

    });
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop