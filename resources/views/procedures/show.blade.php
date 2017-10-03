<?php $menu_open = 'active open'; $nav_pat = 'active'; ?>
@extends('layout/layout')

@section('content')

<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h3 class="header smaller lighter blue">Dados do procedimento</h3>
    </div>


    <div class="pull-right">

      <div class="btn-toolbar inline middle no-margin">
        <div data-toggle="buttons" class="btn-group no-margin">


        </div>
      </div>
    </div>
  </div>
</div>
<div class="hr dotted"></div>
  <div>
    <div id="user-profile-1" class="user-profile row">
      <div class="col-xs-12 col-sm-3 center">
        <div>
          <span class="profile-picture">
            <img id="avatar" class="editable img-responsive" src="{{ asset('assets/images/avatars/profile-pic.jpg') }}" />
          </span>



          <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
            <div class="inline position-relative">
              <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                <i class="ace-icon fa fa-circle light-green"></i>
                &nbsp;
                <span class="white">Teste</span>
              </a>
            </div>
          </div>
        </div>

        <div class="hr hr12 dotted"></div>

        <div class="clearfix">
          <div class="grid2">
            <a class="btn btn-warning" href="{{ URL::to('procedures') }}"><i class="ace-icon fa fa-undo bigger-110"></i>Voltar</a>
          </div>

          <div class="grid2">
            <a class="btn btn-primary" href="{{ URL::to('procedures/'. $procedure->id .'/edit') }}"><i class="ace-icon fa fa-pencil bigger-110"></i>Editar</a>
          </div>
        </div>


      </div>

      <div class="col-xs-12 col-sm-9">


        <div class="space-12"></div>

        <div class="profile-user-info profile-user-info-striped">
          <div class="profile-info-row">
            <div class="profile-info-name"> Id </div>

            <div class="profile-info-value">
              <span class="editable" id="username">{{ $procedure->id }}</span>
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name"> Paciente </div>

            <div class="profile-info-value">
              <span class="editable" id="username">{{ $procedure->patient->person->name }}</span>
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name"> Professional </div>

            <div class="profile-info-value">
              <span class="editable" id="username">{{ $procedure->professional->person->name }}</span>
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name"> Tipo do procedimento </div>

            <div class="profile-info-value">
              <span class="editable" id="username">{{ $procedure->type_procedures->name }}</span>
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name"> Preço </div>

            <div class="profile-info-value">
              <span class="editable" id="username">{{ $procedure->price }}</span>
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name"> Tipo de pagamento </div>

            <div class="profile-info-value">
              <span class="editable" id="username">{{ $procedure->type_payment }}</span>
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name"> Parcelas </div>

            <div class="profile-info-value">
              <span class="editable" id="username">{{ $procedure->plots }}</span>
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name"> Observação </div>

            <div class="profile-info-value">
              <span class="editable" id="username">{{ $procedure->observation }}</span>
            </div>
          </div>

        </div>

        <div class="space-20"></div>



        <div class="hr hr2 hr-double"></div>

        <div class="space-6"></div>


      </div>
    </div>
  </div>




</div>

@endsection