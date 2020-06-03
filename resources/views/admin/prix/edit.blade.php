@extends('layouts.app')

@section('content')
    <h3 class="page-title">Prix</h3>
    
    {!! Form::model($prix, ['method' => 'PUT', 'route' => ['admin.prix.update', $prix->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Modifier
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('salle_id', 'salle*', ['class' => 'control-label']) !!}
                    {!! Form::select('salle_id', $salles, old('salle_id'), ['class' => 'form-control select2', 'required' => '']) !!}
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
                    {!! Form::select('timing_id', $timings, old('timing_id'), ['class' => 'form-control select2', 'required' => '']) !!}
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
                        {!! Form::label('type_id', 'Type entreprise*', ['class' => 'control-label']) !!}
                        {!! Form::select('type_id', $type_entreprises, old('type_id'), ['class' => 'form-control select2', 'required' => '']) !!}
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
                    {!! Form::label('prix', 'Prix', ['class' => 'control-label']) !!}
                    {!! Form::text('prix', old('prix'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prix'))
                        <p class="help-block">
                            {{ $errors->first('prix') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('Mettre à jour'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


