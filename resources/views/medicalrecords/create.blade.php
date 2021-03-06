<?php $nav_session = 'active'; ?>
@extends('layout/layout')

@section('content')
<div class="page-header">
	<h1>
		Cadastro
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Sessão
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row">
	@include('flash::message')
	@if($errors->any())
	<div class="alert alert-danger">Existem dados incorretos no formulário!</div>
	@endif
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		{{ Form::open(array('route' => 'medicalrecords.store', 'class' => 'form-horizontal')) }}

		@include('medicalrecords/_form')

		{!! Form::close() !!}

	</div>
</div>

@stop

@push('page-script')
<script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/js/spinbox.min.js') }}"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript">
$(function(){

	$('#spinner1').ace_spinner({value:1,min:1,max:200,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
	.closest('.ace-spinner')
	.on('changed.fu.spinbox', function(){
		//console.log($('#spinner1').val())
	});

	$(document).ready(function(){
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#datePicker').val(today);
  })

});



</script>
@endpush
