@extends('layouts.app')

@section('content')
    <h3 class="page-title">Type d'entreprise</h3>
    
    {!! Form::model($type, ['method' => 'PUT', 'route' => ['admin.type.update', $type->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Modifier
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('titre', 'Titre *', ['class' => 'control-label']) !!}
                    {!! Form::text('titre', old('titre'), ['class' => 'form-control', 'required' => '']) !!}
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

    {!! Form::submit(trans('Mettre à jour'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
