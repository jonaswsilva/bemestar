<?php $nav_proc = 'active'; $menuc_open = 'active open';?>
@extends('layout/layout')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <h2 class="header smaller lighter purple">Procedimentos</h2>

    <div class="pull-left">
      <a class="btn btn-default" href="{{ URL::to('procedures/create') }}"><i class="ace-icon fa fa-file"></i>Novo Procedimento</a>
    </div>

    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>
    @include('flash::message')
    @if (Session::has('message'))
      <div class="alert alert-{{ @$alert }}">{{ Session::get('message') }}</div>
    @endif

    <div class="table-header">
      Resultado para Procedimentos
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="center">Id</th>
            <th><i class="fa fa-wheelchair"></i>Paciente</th>
            <th><i class="fa fa-user-md"></i>Profissional</th>
            <th><i class="ace-icon fa fa-calendar bigger-110 hidden-480"></i>Data</th>
            <th><i class=""></i>Tipo</th>

            <th></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($procedures as $procedure)
          <tr>

            <td class="center">{{ $procedure->id }}</td>
            <td>{{ $procedure->patient->person->name }}</td>
            <td>{{ $procedure->professional->person->name }}</td>
            <td>{{ $procedure->date_mu->format('d/m/Y') }}</td>
            <td>{{ $procedure->type_procedures->name }}</td>

            <td>
              <div class="hidden-sm hidden-xs btn-group">

                <a class="btn btn-xs btn-success" href="{{ URL::to('procedures/'.$procedure->id) }}">
                  <i class="ace-icon fa fa-check bigger-120"></i>
                </a>

                <a class="btn btn-xs btn-info" href="{{ URL::to('procedures/'. $procedure->id .'/edit') }}" data-toggle="modal">
                  <i class="ace-icon fa fa-pencil bigger-120"></i>
                </a>


                <a class="btn btn-xs btn-danger btn-delete" href="#">
                  <i class="ace-icon fa fa-trash-o bigger-120"></i>
                </a>

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
      {{ Form::open(array('url' => 'procedures/' . @$procedure->id, 'id' => 'form-delete')) }}
        {{ Form::hidden('_method', 'DELETE') }}

      {{ Form::close() }}
    {{ $procedures->render() }}
    </div>
  </div>
</div>

@stop

@push('page-script')

<script type="text/javascript">

jQuery(function($) {

$('.btn-delete').click(function(e){
    e.preventDefault();
    // confirmo que quiere borrar el cliente!
    var deleteClient = confirm('Deseja mesmo excluir esta sessão?');
    if (deleteClient === true) {
        var row = $(this).closest('tr');
        //var id = row.attr('data-id');
        // non funka!: var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID', id);
        var data = form.serialize();
        // enfoque optimista (antes de borrar oculto la fila
        row.fadeOut(function () {
            $.post(url, data, function (result) {
                alert(result);
            }).fail(function () {
                alert('Procedimento não foi escluído!');
                row.show();
            });
        });
    }
    else {
        return false;
    }
})
})


</script>

@endpush
