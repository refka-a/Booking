@extends('layouts.app')

@section('content')
    <h3 class="page-title">Ajouter un type</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.type.store']]) !!}

    <div class="panel panel-default">
        
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('titre', 'Titre*', ['class' => 'control-label']) !!}
                    {!! Form::text('titre', old('titre'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('titre'))
                        <p class="help-block">
                            {{ $errors->first('titre') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div> 

    {!! Form::submit(trans('Enregistrer'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

