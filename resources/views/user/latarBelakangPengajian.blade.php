@extends('layouts.master')

@section('head')

@stop

@section('title')
    Latar Belakang Pengajian
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Latar Belakang Pengajian</a>
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
	                <span class="caption-subject font-white sbold uppercase">Latar Belakang Pengajian</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                <table class="table table-hover table-light">
	                    <thead>
	                        <tr class="uppercase">
	                        	<th> <input id="checkall-checkbox" type="checkbox"> </th>
	                            <th> # </th>
	                            <th> Institusi </th>
	                            <th> Tahap Kelulusan </th>
	                            <th> Nama Kelulusan </th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbody">
							<?php $count = 1; ?>
	                        @foreach($latarBelakangPengajians as $latarBelakangPengajian)
	                        <?php $currentPageTotalNumber = ( $latarBelakangPengajians->currentPage() - 1) * 5; ?>
	                        <tr>
	                        	<td> <input class="single-checkbox" type="checkbox" name="latarBelakangPengajian_id[]" form="form_delete" value="{{ $latarBelakangPengajian->id }}"> </td>
	                            <td> {{ $count + $currentPageTotalNumber}} </td>
	                            <td> {{ $latarBelakangPengajian->institusi }}</td>
	                            <td> {{ $latarBelakangPengajian->tahap_kelulusan }}</td>
	                            <td> {{ $latarBelakangPengajian->nama_kelulusan}}</td>
	                            <td> <a href="" class="btn blue editBtn" data-toggle="modal" data-target="#editModal" data-id="{{ $latarBelakangPengajian->id }}" data-institusi="{{ $latarBelakangPengajian->institusi }}" data-tahap_kelulusan="{{ $latarBelakangPengajian->tahap_kelulusan }}"  data-nama_kelulusan="{{ $latarBelakangPengajian->nama_kelulusan }}">Edit</a>
	                        </tr>
	                        <?php $count++ ?>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>

	            <div class="row">
		        	<div class="col-md-6">
		        		{!! Form::open(['method'=>'DELETE', 'action'=>['latarBelakangPengajianController@deleteLatarBelakangPengajian'], 'id'=>'form_delete']) !!}
		        			<button type="submit" class="btn btn-sm btn-danger deleteBtn">Delete</button>
		        		{!! Form::close() !!}
		        	</div>
		        	<div class="col-md-6">
		        		<div class="pull-right">
		        			{{ $latarBelakangPengajians->render() }}
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
	                <span class="caption-subject font-white sbold uppercase">Tambah Latar Belakang Pengajian</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                {!! Form::open(['method'=>'POST', 'action'=>'latarBelakangPengajianController@createLatarBelakangPengajian']) !!}
	                	<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Institusi</label>
				            <div class="col-md-8">
				                    <input type="text" name="institusi" class="form-control input-line" id="" value="{{ old('institusi') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Tahap Kelulusan</label>
				            <div class="col-md-8">
				                    <input type="text" name="tahap_kelulusan" class="form-control input-line" id="" value="{{ old('tahap_kelulusan') }}">
				            </div>
				        </div>
						<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Nama Kelulusan</label>
				            <div class="col-md-8">
				                    <input type="text" name="nama_kelulusan" class="form-control input-line" id="" value="{{ old('nama_kelulusan') }}">
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
      	{!! Form::open(['method'=>'PATCH', 'action'=>'latarBelakangPengajianController@updateLatarBelakangPengajian']) !!}
      		<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Institusi</label>
	            <div class="col-md-8">
	                    <input type="text" name="institusi" class="form-control input-line" id="m_institusi">
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Tahap Kelulusan</label>
	            <div class="col-md-8">
	                    <input type="text" name="tahap_kelulusan" class="form-control input-line" id="m_tahap_kelulusan">
	            </div>
	        </div>
			<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Nama Kelulusan</label>
	            <div class="col-md-8">
	                    <input type="text" name="nama_kelulusan" class="form-control input-line" id="m_nama_kelulusan" >
	            </div>
	        </div>
	        <input type="hidden" name="id" id="m_latar_belakang_pengajian_id">	    
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
       		$("#m_latar_belakang_pengajian_id").val($(this).data('id'));
		 	$("#m_institusi").val($(this).data('institusi'));
		 	$("#m_tahap_kelulusan").val($(this).data('tahap_kelulusan'));
		 	$("#m_nama_kelulusan").val($(this).data('nama_kelulusan'));
       });

    });
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop