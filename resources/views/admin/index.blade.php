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
        <a href="#">Senarai Pensyarah</a>
    </li>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN BORDERED TABLE PORTLET-->
	    <div class="portlet box blue-dark">
	        <div class="portlet-title">
	            <div class="caption">
	                <i class="icon-calendar font-white"></i>
	                <span class="caption-subject font-white sbold uppercase">Senarai Pensyarah</span>
	            </div>
	        </div>
	        	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                <table class="table table-hover table-light">
	                    <thead>
	                        <tr class="uppercase">
	                            <th> # </th>
	                            <th> Nama </th>
	                            <th> Jawatan </th>
	                            <th> Fakulti </th>
	                            <th> Jabatan </th>
	                            <th> Email </th>
	                            <th> No. Tel </th>
	                            <th>  </th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbody">
							<?php $count = 1; ?>
	                        @foreach($users as $user)
	                        <?php $currentPageTotalNumber = ( $users->currentPage() - 1) * 5; ?>
	                        <tr>
	                            <td> {{ $count + $currentPageTotalNumber}} </td>
	                            <td> {{ $user->name }}</td>
	                            <td> {{ $user->jawatan }}</td>
	                            <td> {{ $user->fakulti}}</td>
	                            <td> {{ $user->jabatan}} </td>
	                            <td> {{ $user->email }}</td>
	                            <td> {{ $user->phone }}</td>
	                            <td> <button id="cetak" class="btn green">Cetak</button></td>
	                        </tr>
	                        <?php $count++ ?>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>

	            <div class="row">
		        	<div class="col-md-6">
		        		
		        	</div>
		        	<div class="col-md-6">
		        		<div class="pull-right">
		        			{{ $users->render() }}
		        		</div>
		        	</div>
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

<script>

$( "#cetak" ).click(function() {
  window.print();
});
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop