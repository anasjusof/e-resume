@extends('layouts.master')

@section('head')

@stop

@section('title')
    Pengajaran
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Pengajaran</a>
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
	                <span class="caption-subject font-white sbold uppercase">Pengajaran</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                <table class="table table-hover table-light">
	                    <thead>
	                        <tr class="uppercase">
	                        	<th> <input id="checkall-checkbox" type="checkbox"> </th>
	                            <th> # </th>
	                            <th> Kod Kursus </th>
	                            <th> Nama Kursus </th>
	                            <th> Sem </th>
	                            <th> Bil Pelajar </th>
	                            <th> Tahap </th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbody">
							<?php $count = 1; ?>
	                        @foreach($pengajarans as $pengajaran)
	                        <?php $currentPageTotalNumber = ( $pengajarans->currentPage() - 1) * 5; ?>
	                        <tr>
	                        	<td> <input class="single-checkbox" type="checkbox" name="pengajaran_id[]" form="form_delete" value="{{ $pengajaran->id }}"> </td>
	                            <td> {{ $count + $currentPageTotalNumber}} </td>
	                            <td> {{ $pengajaran->kod_kursus }}</td>
	                            <td> {{ $pengajaran->nama_kursus }}</td>
	                            <td> {{ $pengajaran->sem}}</td>
	                            <td> {{ $pengajaran->bil_pelajar}}</td>
	                            <td> {{ $pengajaran->tahap}}</td>
	                            <td> <a href="" class="btn blue editBtn" data-toggle="modal" data-target="#editModal" data-id="{{ $pengajaran->id }}" data-kod_kursus="{{ $pengajaran->kod_kursus }}" data-nama_kursus="{{ $pengajaran->nama_kursus }}"  data-sem="{{ $pengajaran->sem }}"  data-bil_pelajar="{{ $pengajaran->bil_pelajar }}"  data-tahap="{{ $pengajaran->tahap }}">Edit</a>
	                        </tr>
	                        <?php $count++ ?>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>

	            <div class="row">
		        	<div class="col-md-6">
		        		{!! Form::open(['method'=>'DELETE', 'action'=>['PengajaranController@deletePengajaran'], 'id'=>'form_delete']) !!}
		        			<button type="submit" class="btn btn-sm btn-danger deleteBtn">Delete</button>
		        		{!! Form::close() !!}
		        	</div>
		        	<div class="col-md-6">
		        		<div class="pull-right">
		        			{{ $pengajarans->render() }}
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
	                <span class="caption-subject font-white sbold uppercase">Tambah Pengajaran</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                {!! Form::open(['method'=>'POST', 'action'=>'PengajaranController@createPengajaran']) !!}
	                	<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Kod Kursus</label>
				            <div class="col-md-8">
				                    <input type="text" name="kod_kursus" class="form-control input-line" id="" value="{{ old('kod_kursus') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Nama Kursus</label>
				            <div class="col-md-8">
				                    <input type="text" name="nama_kursus" class="form-control input-line" id="" value="{{ old('nama_kursus') }}">
				            </div>
				        </div>
						<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Sem</label>
				            <div class="col-md-8">
				                    <input type="text" name="sem" class="form-control input-line" id="" value="{{ old('sem') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Bil Pelajar</label>
				            <div class="col-md-8">
				                    <input type="text" name="bil_pelajar" class="form-control input-line" id="" value="{{ old('bil_pelajar') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Tahap</label>
				            <div class="col-md-8">
				                    <input type="text" name="tahap" class="form-control input-line" id="" value="{{ old('tahap') }}">
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
      	{!! Form::open(['method'=>'PATCH', 'action'=>'PengajaranController@updatePengajaran']) !!}
      		<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Kod Kursus</label>
	            <div class="col-md-8">
	                    <input type="text" name="kod_kursus" class="form-control input-line" id="m_kod_kursus">
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Nama Kursus</label>
	            <div class="col-md-8">
	                    <input type="text" name="nama_kursus" class="form-control input-line" id="m_nama_kursus">
	            </div>
	        </div>
			<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Sem</label>
	            <div class="col-md-8">
	                    <input type="text" name="sem" class="form-control input-line" id="m_sem" >
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Bil Pelajar</label>
	            <div class="col-md-8">
	                    <input type="text" name="bil_pelajar" class="form-control input-line" id="m_bil_pelajar" >
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Tahap</label>
	            <div class="col-md-8">
	                    <input type="text" name="tahap" class="form-control input-line" id="m_tahap" >
	            </div>
	        </div>
	        <input type="hidden" name="id" id="m_pengajaran_id">	    
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
       		$("#m_pengajaran_id").val($(this).data('id'));
		 	$("#m_kod_kursus").val($(this).data('kod_kursus'));
		 	$("#m_nama_kursus").val($(this).data('nama_kursus'));
		 	$("#m_sem").val($(this).data('sem'));
		 	$("#m_bil_pelajar").val($(this).data('bil_pelajar'));
		 	$("#m_tahap").val($(this).data('tahap'));
       });

    });
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop