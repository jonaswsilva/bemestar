<?php $menu_open = 'active open'; $nav_prof = 'active'; ?>

@extends('layout/layout')

@section('content')


<div class="row">

				<div class="col-xs-12">
					<h2 class="header smaller lighter green">Profissionais</h2>

					<div class="pull-left">
						<a class="btn btn-default" href="{{ URL::to('professionals/create') }}"><i class="ace-icon fa fa-user-md"></i>Novo Profissional</a>
					</div>

					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>

					@if (Session::has('message'))
						<div class="alert alert-{{ @$alert }}">{{ Session::get('message') }}</div>
					@endif
					@include('flash::message')
					<div class="table-header">
						Resultado para Profissionais
					</div>

					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th>Cód.</th>
									<th>Nome</th>
									<th>Cpf</th>
									<th><i class="ace-icon fa fa-mobile bigger-110 hidden-48" aria-hidden="true"></i> Celular</th>
									<th><i class="fa fa-envelope" aria-hidden="true"></i> E-mail</th>

									<th></th>
								</tr>
							</thead>

							<tbody>
								@foreach ($professionals as $professional)
								<tr>

									<td></td>
									<td class="center">{{ $professional->id }}</td>
									<td>{{ $professional->person->name.' '.$professional->person->lastname }}</td>
									<td class="cpf">{{ $professional->person->cpf }}</td>
									<td class="phone">{{ $professional->person->phone }}</td>
									<td>{{ $professional->person->email }}</td>

									<td>
										<div class="hidden-sm hidden-xs btn-group">
											{!! Form::open(['url'=>'professionals/'.$professional->id,'method'=>'post','class'=>'delete']) !!}
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
											<a class="btn btn-xs btn-success" href="{{ URL::to('professionals/'.$professional->id) }}">
												<i class="ace-icon fa fa-check bigger-120"></i>
											</a>

											<a class="btn btn-xs btn-info" href="{{ URL::to('professionals/'. $professional->id .'/edit') }}">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</a>

											<button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="bottom" title="Excluir Consulta" ><i class="ace-icon fa fa-trash-o bigger-120"></i></button>

										{!! Form::close() !!}
										</div>



										<div class="hidden-md hidden-lg">
											<div class="inline pos-rel">
												<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
													<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
												</button>

												<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
													<li>
														<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
															<span class="blue">
																<i class="ace-icon fa fa-search-plus bigger-120"></i>
															</span>
														</a>
													</li>

													<li>
														<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
															<span class="green">
																<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
															</span>
														</a>
													</li>

													<li>
														<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
															<span class="red">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</td>
								</tr>


								@endforeach
							</tbody>
						</table>
						{{ Form::open(array('url' => 'professionals/' . @$professional->id, 'id' => 'form-delete')) }}
							{{ Form::hidden('_method', 'DELETE') }}

						{{ Form::close() }}
					</div>
				</div>
			</div>


@stop

@push('page-script')

<script type="text/javascript">

jQuery(function($) {


	/***************/
	$('.show-details-btn').on('click', function(e) {
		e.preventDefault();
		$(this).closest('tr').next().toggleClass('open');
		$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
	});
	/***************/

	//initiate dataTables plugin
	var myTable =
	$('#dynamic-table')
	//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
	.DataTable( {
		"language": {
			"lengthMenu": "Mostrar _MENU_ registros por página",
			"info": "Mostrando pág. _PAGE_ de _PAGES_",
			"sInfoEmpty": "Sem registros",
			"infoFiltered": "(filtrado do total de _MAX_ registros)",
			"search": "Buscar: ",
			"sZeroRecords": "Não há profissionais cadastrados",
			"snext":"Próximo",
			"previous":"Anterior"
				},
		bAutoWidth: false,
		info: false,
		"aoColumns": [
			{ "orderable": false, "className":'details-control', "data": null, "defaultContent": '' },
			null, null,null, null, null,
			{ "bSortable": false }
		],

		"aaSorting": [],


		//"bProcessing": true,
				//"bServerSide": true,
				//"sAjaxSource": "http://127.0.0.1/table.php"	,

		//,
		//"sScrollY": "200px",
		//"bPaginate": false,

		//"sScrollX": "100%",
		//"sScrollXInner": "120%",
		//"bScrollCollapse": true,
		//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
		//you may want to wrap the table inside a "div.dataTables_borderWrap" element

		//"iDisplayLength": 50


		select: {
			style: 'multi'
		}
		} );

		function format (  ) {
    // `d` is the original data object for the row
    return '<div class="table-detail">'+
								'<div class="row">'+
									'<div class="col-xs-12 col-sm-2">'+
										'<div class="text-center">'+
											'<img height="150" class="thumbnail inline no-margin-bottom" src="/assets/images/avatars/{{ @$professional->avatar }}" />'+
											'<br />'+
											'<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">'+
												'<div class="inline position-relative">'+
													'<a class="user-title-label" href="{{ URL::to("professionals/".$professional->id) }}">'+
														'<span class="white">{{ @$professional->person->name }}</span>'+
													'</a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+

									'<div class="col-xs-12 col-sm-7">'+
										'<div class="space visible-xs"></div>'+

										'<div class="profile-user-info profile-user-info-striped">'+

												'<div class="profile-info-row">'+
													'<div class="profile-info-name"> Nome </div>'+

													'<div class="profile-info-value">'+
														'<span>{{ @$professional->person->name }}</span>'+
													'</div>'+
												'</div>'+

												'<div class="profile-info-row">'+
													'<div class="profile-info-name"> Especialidade: </div>'+

													'<div class="profile-info-value">'+
														'<span>{{ @$professional->especialitie->name }}</span>'+
													'</div>'+
												'</div>'+

												'<div class="profile-info-row">'+
													'<div class="profile-info-name"> Endereço </div>'+

													'<div class="profile-info-value">'+
														'<i class="fa fa-map-marker light-orange bigger-110"></i>'+
														'<span>{{ @$professional->address->street }}</span>'+
													'</div>'+
												'</div>'+

												'<div class="profile-info-row">'+
													'<div class="profile-info-name"> Celular </div>'+

													'<div class="profile-info-value">'+
														'<span class="phone">{{ @$professional->person->phone }}</span>'+
													'</div>'+
												'</div>'+

												'<div class="profile-info-row">'+
													'<div class="profile-info-name">Cpf</div>'+

													'<div class="profile-info-value">'+
														'<span class="cpf">{{ @$professional->person->cpf }}</span>'+
													'</div>'+
												'</div>'+

												'<div class="profile-info-row">'+
													'<div class="profile-info-name"> CRM </div>'+

													'<div class="profile-info-value">'+
														'<span>{{ @$professional->crm }}</span>'+
													'</div>'+
												'</div>'+

											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';

	}

	// Add event listener for opening and closing details
	 $('#dynamic-table tbody').on('click', 'td.details-control', function () {
			 var tr = $(this).closest('tr');
			 var row = myTable.row( tr );

			 if ( row.child.isShown() ) {
					 // This row is already open - close it
					 row.child.hide();
					 tr.removeClass('details');
			 }
			 else {
					 // Open this row
					 row.child( format(row) ).show();
					 tr.addClass('details');
			 }
	 } );


	$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

	new $.fn.dataTable.Buttons( myTable, {
		buttons: [
			{
			"extend": "colvis",
			"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Mostrar/ocultar colunas</span>",
			"className": "btn btn-white btn-primary btn-bold",
			columns: ':not(:first):not(:last)'
			},
			// {
			// "extend": "copy",
			// "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copiar</span>",
			// "className": "btn btn-white btn-primary btn-bold"
			// },
			{
			"extend": "csv",
			"text": "<i class='fa fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Exportar para Excel</span>",
			"className": "btn btn-white btn-primary btn-bold"
			},
			// {
			// "extend": "excel",
			// "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Exportar para Excel</span>",
			// "className": "btn btn-white btn-primary btn-bold"
			// },
			// {
			// "extend": "pdf",
			// "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Exportar para PDF</span>",
			// "className": "btn btn-white btn-primary btn-bold"
			// },
			{
			"extend": "print",
			"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Imprimir</span>",
			"className": "btn btn-white btn-primary btn-bold",
			autoPrint: false,
			message: 'Clínica Bem Estar'
			}
		]
	} );
	myTable.buttons().container().appendTo( $('.tableTools-container') );

	//style the message box
	var defaultCopyAction = myTable.button(1).action();
	myTable.button(1).action(function (e, dt, button, config) {
		defaultCopyAction(e, dt, button, config);
		$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
	});


	var defaultColvisAction = myTable.button(0).action();
	myTable.button(0).action(function (e, dt, button, config) {

		defaultColvisAction(e, dt, button, config);


		if($('.dt-button-collection > .dropdown-menu').length == 0) {
			$('.dt-button-collection')
			.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
			.find('a').attr('href', '#').wrap("<li />")
		}
		$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
	});

	////

	setTimeout(function() {
		$($('.tableTools-container')).find('a.dt-button').each(function() {
			var div = $(this).find(' > div').first();
			if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
			else $(this).tooltip({container: 'body', title: $(this).text()});
		});
	}, 500);





	myTable.on( 'select', function ( e, dt, type, index ) {
		if ( type === 'row' ) {
			$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
		}
	} );
	myTable.on( 'deselect', function ( e, dt, type, index ) {
		if ( type === 'row' ) {
			$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
		}
	} );




	/////////////////////////////////
	//table checkboxes
	$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

	//select/deselect all rows according to table header checkbox
	$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
		var th_checked = this.checked;//checkbox inside "TH" table header

		$('#dynamic-table').find('tbody > tr').each(function(){
			var row = this;
			if(th_checked) myTable.row(row).select();
			else  myTable.row(row).deselect();
		});
	});

	//select/deselect a row when the checkbox is checked/unchecked
	$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
		var row = $(this).closest('tr').get(0);
		if(this.checked) myTable.row(row).deselect();
		else myTable.row(row).select();
	});



	$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
		e.stopImmediatePropagation();
		e.stopPropagation();
		e.preventDefault();
	});



	//And for the first simple table, which doesn't have TableTools or dataTables
	//select/deselect all rows according to table header checkbox
	var active_class = 'active';
	$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
		var th_checked = this.checked;//checkbox inside "TH" table header

		$(this).closest('table').find('tbody > tr').each(function(){
			var row = this;
			if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
			else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
		});
	});

	//select/deselect a row when the checkbox is checked/unchecked
	$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
		var $row = $(this).closest('tr');
		if($row.is('.detail-row ')) return;
		if(this.checked) $row.addClass(active_class);
		else $row.removeClass(active_class);
	});



	/********************************/
	//add tooltip for small view action buttons in dropdown menu
	$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

	//tooltip placement on right or left
	function tooltip_placement(context, source) {
		var $source = $(source);
		var $parent = $source.closest('table')
		var off1 = $parent.offset();
		var w1 = $parent.width();

		var off2 = $source.offset();
		//var w2 = $source.width();

		if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
		return 'left';
	}










	/**
	//add horizontal scrollbars to a simple table
	$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
		{
		horizontal: true,
		styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
		size: 2000,
		mouseWheelLock: true
		}
	).css('padding-top', '12px');
	*/


})


</script>

@endpush
