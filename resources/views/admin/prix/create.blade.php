@extends('layouts.app')

@section('content')
    <h3 class="page-title">Prix</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.prix.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
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
			</div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                        {!! Form::label('timing_id', 'Timing*', ['class' => 'control-label']) !!}
                        <select id="timing_id" name="timing_id" class="form-control select2" required>
                            <option value="">Choisir</option>
                            @foreach($timings as $timing)
                            <option value="{{ $timing->id }}" {{ (old("timing_id") == $timing->id ? "selected":"") }}>{{ $timing->titre }}</option>
                            @endforeach
                        </select>
                        <p class="help-block"></p>
                        @if($errors->has('timing_id'))
                            <p class="help-block">
                                {{ $errors->first('timing_id') }}
                            </p>
                        @endif
                </div>
			</div>
			
            <div class="row">
                <div class="col-xs-12 form-group">
                        {!! Form::label('type_id', 'Type*', ['class' => 'control-label']) !!}
                        <select id="type_id" name="type_id" class="form-control select2" required>
                            <option value="">Choisir</option>
                            @foreach($type_entreprises as $type)
                            <option value="{{ $type->id }}" {{ (old("type_id") == $type->id ? "selected":"") }}>{{ $type->titre}}</option>
                            @endforeach
                        </select>
                        <p class="help-block"></p>
                        @if($errors->has('type_id'))
                            <p class="help-block">
                                {{ $errors->first('type_id') }}
                            </p>
                        @endif
                </div>
			</div> 
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('prix', 'Prix*', ['class' => 'control-label']) !!}
                    {!! Form::text('prix', old('prix'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prix'))
                        <p class="help-block">
                            {{ $errors->first('prix') }}
                        </p>
                    @endif
                </div>
			</div>                     
			<hr />
            
        </div>
    </div>

    {!! Form::submit(trans('Enregistrer'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

