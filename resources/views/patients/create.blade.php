<?php $menu_open = 'active open'; $nav_pat = 'active'; ?>
@extends('layout/layout')

@section('content')
<div class="page-header">
	<h1>
		Cadastro
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			pacientes
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row">
	@if($errors->any())
	<div class="alert alert-danger">Existem dados incorretos no formulário!</div>
	@endif
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		{{ Form::open(array('route' => 'patients.store', 'class' => 'form-horizontal')) }}

		@include('patients/_form')

		{!! Form::close() !!}

	</div>
</div>

@stop
