
			{{ Form::token() }}

			<div class="form-group">
			  {!!  Form::label('form-field-1', 'Paciente: ', ['class' => 'col-sm-3 control-label no-padding-right'])  !!}
			  <div class="col-sm-9">
					{!! Form::select('patient_id', $patients, @$medicalrecord->patient_id, ["class"=>"col-xs-10 col-sm-5" ,"id"=>"nameid","placeholder"=>"Selecione um paciente"]) !!}
					<a class="btn btn-primary btn-xs" href="{{ URL::to('patients/create') }}"><i class="ace-icon fa fa-user"></i> Novo Paciente</a>
					@if($errors->any())
				  <div class="red darken-4">&nbsp &nbsp{!! $errors->first('patient_id') !!}</div>
				  @endif
				</div>
			</div>

			{!! Form::hidden('professional_id', Auth::user()->id ) !!}

			<div class="form-group">
			  {!!  Form::label('form-field-1', 'Data: ', ['class' => 'col-sm-3 control-label no-padding-right'])  !!}
			  <div class="col-sm-9">
			  {!! Form::date('date', @$medicalrecord->date, ['class' => 'col-xs-10 col-sm-5',"id"=>"datePicker"]) !!}
			  @if($errors->any())
			  <div class="red darken-4">&nbsp &nbsp{!! $errors->first('date') !!}</div>
			  @endif
			</div>
			</div>

      <div class="form-group">
				{!!  Form::label('form-field-1', 'N° de sessões: ', ['class' => 'col-sm-3 control-label no-padding-right'])  !!}
				<div class="col-sm-9">
					{!! Form::text('number_of_sessions', @$medicalrecord->number_of_sessions, ['class' => 'col-xs-10 col-sm-5', 'id'=>'spinner1', 'placeholder' => 'N° de sessões...']) !!}
					@if($errors->any())
					<div class="red darken-4">&nbsp &nbsp{!! $errors->first('number_of_sessions') !!}</div>
					@endif
				</div>
			</div>

      <div class="form-group">
				{!!  Form::label('form-field-1', 'Descrição: ', ['class' => 'col-sm-3 control-label no-padding-right'])  !!}
				<div class="col-sm-9">
					{!! Form::textarea('description', @$medicalrecord->description, ['size' => '30x5','class' => 'col-xs-10 col-sm-8 description', 'placeholder' => 'Descrição...']) !!}
					@if($errors->any())
					<div class="red darken-4">&nbsp &nbsp{!! $errors->first('description') !!}</div>
					@endif
				</div>
			</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<a class="btn btn-warning" href="{{ URL::to('medicalrecords') }}"><i class="ace-icon fa fa-undo bigger-110"></i>Voltar</a>
					&nbsp; &nbsp; &nbsp;
					<button class="btn btn-primary" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						{{ $button }}
					</button>
					<div class="widget-title purple pull-right">
			      <h4>Profissional: {!! Auth::user()->name !!}</h4>
			    </div>
				</div>

			</div>
