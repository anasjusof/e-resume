@extends('layouts.master')

@section('head')

@stop

@section('title')
    Penilai Akademik
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Penilai Akademik</a>
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
	                <span class="caption-subject font-white sbold uppercase">Penilai Akademik</span>
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
	                            <th> Tajuk Projek </th>
	                            <th> Tahun </th>
	                            <th> Peringkat </th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbody">
							<?php $count = 1; ?>
	                        @foreach($penilaiakademiks as $penilaiakademik)
	                        <?php $currentPageTotalNumber = ( $penilaiakademiks->currentPage() - 1) * 5; ?>
	                        <tr>
	                        	<td> <input class="single-checkbox" type="checkbox" name="kajiandanpenyelidikan_id[]" form="form_delete" value="{{ $penilaiakademik->id }}"> </td>
	                            <td> {{ $count + $currentPageTotalNumber}} </td>
	                            <td> {{ $penilaiakademik->nama }}</td>
	                            <td> {{ $penilaiakademik->tajuk_projek }}</td>
	                            <td> {{ $penilaiakademik->tahun}}</td>
	                            <td> {{ $penilaiakademik->peringkat}}</td>
	                            <td> <a href="" class="btn blue editBtn" data-toggle="modal" data-target="#editModal" data-id="{{ $penilaiakademik->id }}" data-nama="{{ $penilaiakademik->nama }}" data-tajuk_projek="{{ $penilaiakademik->tajuk_projek }}"  data-tahun="{{ $penilaiakademik->tahun }}"  data-peringkat="{{ $penilaiakademik->peringkat }}">Edit</a>
	                        </tr>
	                        <?php $count++ ?>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>

	            <div class="row">
		        	<div class="col-md-6">
		        		{!! Form::open(['method'=>'DELETE', 'action'=>['PenilaiAkademikController@deletePenilaiAkademik'], 'id'=>'form_delete']) !!}
		        			<button type="submit" class="btn btn-sm btn-danger deleteBtn">Delete</button>
		        		{!! Form::close() !!}
		        	</div>
		        	<div class="col-md-6">
		        		<div class="pull-right">
		        			{{ $penilaiakademiks->render() }}
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
	                <span class="caption-subject font-white sbold uppercase">Tambah Penilai Akademik</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                {!! Form::open(['method'=>'POST', 'action'=>'PenilaiAkademikController@createPenilaiAkademik']) !!}
	                	<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Nama</label>
				            <div class="col-md-8">
				                    <input type="text" name="nama" class="form-control input-line" id="" value="{{ old('nama') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Tajuk Projek</label>
				            <div class="col-md-8">
				                    <input type="text" name="tajuk_projek" class="form-control input-line" id="" value="{{ old('tajuk_projek') }}">
				            </div>
				        </div>
						<div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Tahun</label>
				            <div class="col-md-8">
				                    <input type="text" name="tahun" class="form-control input-line" id="" value="{{ old('tahun') }}">
				            </div>
				        </div>
				        <div class="form-group col-md-12">
				            <label for="inputPassword1" class="col-md-4 control-label">Peringkat</label>
				            <div class="col-md-8">
				                    <input type="text" name="peringkat" class="form-control input-line" id="" value="{{ old('peringkat') }}">
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
      	{!! Form::open(['method'=>'PATCH', 'action'=>'PenilaiAkademikController@updatePenilaiAkademik']) !!}
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Nama</label>
	            <div class="col-md-8">
	                    <input type="text" name="nama" class="form-control input-line" id="m_nama">
	            </div>
	        </div>
			<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Tajuk Projek</label>
	            <div class="col-md-8">
	                    <input type="text" name="tajuk_projek" class="form-control input-line" id="m_tajuk_projek" >
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Tahun</label>
	            <div class="col-md-8">
	                    <input type="text" name="tahun" class="form-control input-line" id="m_tahun" >
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Peringkat</label>
	            <div class="col-md-8">
	                    <input type="text" name="peringkat" class="form-control input-line" id="m_peringkat" >
	            </div>
	        </div>
	        <input type="hidden" name="id" id="m_penilaiakademik_id">
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
       		$("#m_penilaiakademik_id").val($(this).data('id'));
                $("#m_nama").val($(this).data('nama'));
                $("#m_tajuk_projek").val($(this).data('tajuk_projek'));
                $("#m_tahun").val($(this).data('tahun'));
                $("#m_peringkat").val($(this).data('peringkat'));
       });

    });
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop