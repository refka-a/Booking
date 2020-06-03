@extends('layouts.app')

@section('content')
    <h3 class="page-title">Salles</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.salles.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Ajouter une salle
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('nom', 'Nom*', ['class' => 'control-label']) !!}
                    {!! Form::text('nom', old('nom'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nom'))
                        <p class="help-block">
                            {{ $errors->first('nom') }}
                        </p>
                    @endif
                </div>
    
                <div class="col-xs-1 form-group">
                    {!! Form::label('couleur', 'Couleur', ['class' => 'control-label']) !!}
                    {!! Form::color('couleur', old('couleur'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('couleur'))
                        <p class="help-block">
                            {{ $errors->first('couleur') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Déscription', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('etat', 'Etat', ['class' => 'control-label']) !!}
                    {!! Form::text('etat', old('etat'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('etat'))
                        <p class="help-block">
                            {{ $errors->first('etat') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('Enregistrer'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

