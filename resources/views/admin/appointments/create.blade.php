@extends('layouts.app')

@section('content')
    <h3 class="page-title">Réservations</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.appointments.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Ajouter une réservation
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
					{!! Form::label('salle_id', 'Salle*', ['class' => 'control-label']) !!}
                    <select id="salle_id" name="salle_id" class="form-control select2" required>
						<option value="">Choisir</option>
						@foreach($salles as $salle)
						<option value="{{ $salle->id }}" {{ (old("salle_id") == $salle->id ? "selected":"") }}>{{ $salle->nom }}</option>
						@endforeach
					</select> 
                    <p class="help-block"></p>
                    @if($errors->has('salle_id'))
                        <p class="help-block">
                            {{ $errors->first('salle_id') }}
                        </p>
                    @endif
                </div>
			
			
			
                <div class="col-xs-6 form-group">
					{!! Form::label('user_id', 'Entreprise*', ['class' => 'control-label']) !!}
                    <select id="user_id" name="user_id" class="form-control select2" required>
						<option value="">Choisir</option>
						<option value="{{ Auth::user()->id }}" {{ (old("user_id") ==  Auth::user()->id ? "selected":"") }}>{{ Auth::user()->name }}</option>
						
					</select>
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
			</div>
			
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('start_time', 'Date début*', ['class' => 'control-label']) !!}
                    {!! Form::text('start_time', old('start_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }} 
                        </p>
                    @endif
                </div>
			 
			
                <div class="col-xs-6 form-group">
                    {!! Form::label('finish_time', 'Date fin*', ['class' => 'control-label']) !!}
                    {!! Form::text('finish_time', old('finish_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('finish_time'))
                        <p class="help-block">
                            {{ $errors->first('finish_time') }}
                        </p>
                    @endif
                </div>
			</div>                     
			<hr />
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comments', 'Commentaires', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comments', old('comments'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('comments'))
                        <p class="help-block">
                            {{ $errors->first('comments') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('Enregistrer'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>   
    <script>
        
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss",
            minDate: 0,
            
        });
    </script>
	<script>
	$('.date').datepicker({
		autoclose: true,
		dateFormat: "{{ config('app.date_format_js') }}"
	}).datepicker("setDate", "0");
    </script>
	
@stop