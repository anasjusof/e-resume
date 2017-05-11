@extends('layouts.master')

@section('head')

@stop

@section('title')
    Penyeliaan
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Penyeliaan</a>
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
	                <span class="caption-subject font-white sbold uppercase">Penyeliaan</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                <table class="table table-hover table-light">
	                    <thead>
	                        <tr class="uppercase">
	                        	<th> <input id="checkall-checkbox" type="checkbox"> </th>
	                            <th> # </th>
	                            <th> Nama </th>
	                            <th> No Matrik </th>
	                            <th> Tajuk </th>
	                            <th> Status </th>
	                            <th> Sem </th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbody">
							<?php $count = 1; ?>
	                        @foreach($penyeliaans as $penyeliaan)
	                        <?php $currentPageTotalNumber = ( $penyeliaans->currentPage() - 1) * 5; ?>
	                        <tr>
	                        	<td> <input class="single-checkbox" type="checkbox" name="penyeliaan_id[]" form="form_delete" value="{{ $penyeliaan->id }}"> </td>
	                            <td> {{ $count + $currentPageTotalNumber}} </td>
	                            <td> {{ $penyeliaan->nama }}</td>
	                            <td> {{ $penyeliaan->no_matrik }}</td>
	                            <td> {{ $penyeliaan->tajuk}}</td>
	                            <td> {{ $penyeliaan->status}}</td>
	                            <td> {{ $penyeliaan->sem}}</td>
	                            <td> <a href="" class="btn blue editBtn" data-toggle="modal" data-target="#editModal" data-id="{{ $penyeliaan->id }}" data-nama="{{ $penyeliaan->nama }}" data-no_matrik="{{ $penyeliaan->no_matrik }}"  data-tajuk="{{ $penyeliaan->tajuk }}"  data-status="{{ $penyeliaan->status }}"  data-sem="{{ $penyeliaan->sem }}">Edit</a>
	                        </tr>
	                        <?php $count++ ?>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>

	            <div class="row">
		        	<div class="col-md-6">
		        		{!! Form::open(['method'=>'DELETE', 'action'=>['PenyeliaanController@deletePenyeliaan'], 'id'=>'form_delete']) !!}
		        			<button type="submit" class="btn btn-sm btn-danger deleteBtn">Delete</button>
		        		{!! Form::close() !!}
		        	</div>
		        	<div class="col-md-6">
		        		<div class="pull-right">
		        			{{ $penyeliaans->render() }}
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
	                <span class="caption-subject font-white sbold uppercase">Tambah Penyeliaan</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                {!! Form::open(['method'=>'POST', 'action'=>'PenyeliaanController@createPenyeliaan']) !!}
	                	<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Nama</label>
				            <div class="col-md-8">
				                    <input type="text" name="nama" class="form-control input-line" id="" value="{{ old('nama') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">No Matrik</label>
				            <div class="col-md-8">
				                    <input type="text" name="no_matrik" class="form-control input-line" id="" value="{{ old('no_matrik') }}">
				            </div>
				        </div>
						<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Tajuk</label>
				            <div class="col-md-8">
				                    <input type="text" name="tajuk" class="form-control input-line" id="" value="{{ old('tajuk') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Status</label>
				            <div class="col-md-8">
				                    <input type="text" name="status" class="form-control input-line" id="" value="{{ old('status') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Sem</label>
				            <div class="col-md-8">
				                    <input type="text" name="sem" class="form-control input-line" id="" value="{{ old('sem') }}">
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
      	{!! Form::open(['method'=>'PATCH', 'action'=>'PenyeliaanController@updatePenyeliaan']) !!}
      		<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Nama</label>
	            <div class="col-md-8">
	                    <input type="text" name="nama" class="form-control input-line" id="m_nama">
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">No Matrik</label>
	            <div class="col-md-8">
	                    <input type="text" name="no_matrik" class="form-control input-line" id="m_no_matrik">
	            </div>
	        </div>
			<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Tajuk</label>
	            <div class="col-md-8">
	                    <input type="text" name="tajuk" class="form-control input-line" id="m_tajuk" >
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Status</label>
	            <div class="col-md-8">
	                    <input type="text" name="status" class="form-control input-line" id="m_status" >
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Sem</label>
	            <div class="col-md-8">
	                    <input type="text" name="sem" class="form-control input-line" id="m_sem" >
	            </div>
	        </div>
	        <input type="hidden" name="id" id="m_penyeliaan_id">	    
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
       		$("#m_penyeliaan_id").val($(this).data('id'));
		 	$("#m_nama").val($(this).data('nama'));
		 	$("#m_no_matrik").val($(this).data('no_matrik'));
		 	$("#m_tajuk").val($(this).data('tajuk'));
		 	$("#m_status").val($(this).data('status'));
		 	$("#m_sem").val($(this).data('sem'));
       });

    });
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop