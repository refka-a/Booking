<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="page-header-fixed">
    <div class="page-header navbar navbar-fixed-top">
            <div class="navbar-header">
                    <a href="{{ url('/') }}"
                       class="navbar-brand">
                    
                       <span> <img src="../images/logo.svg" width="38px" height="30px">
                    
                    Réservation le 15</span>
                    </a>
            </div>
    </div>



    <div class="page-container">
        @include('inc.messages')

        <div class="page-content-wrapper">
            <div class="page-content">

                @if(isset($siteTitle))
                    <h3 class="page-title">
                        {{ $siteTitle }}
                    </h3>
                @endif
                      
                    {!! Form::open(['method' => 'POST', 'route' => ['demandes.store']]) !!}

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Formulaire de reservation </h3>
                        </div>
                   
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('raisonSociale', 'Raison sociale*', ['class' => 'control-label']) !!}
                                    {!! Form::text('raisonSociale', old('raisonSociale'), ['class' => 'form-control', 'placeholder' => 'Dites-nous qui vous êtes', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('raisonSociale'))
                                        <p class="help-block">
                                               {{ $errors->first('raisonSociale') }}
                                        </p>
                                    @endif
                                </div>
                            
                                <div class="col-xs-6 form-group">
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
                                    {!! Form::label('objetReservation', 'Objet de la demande', ['class' => 'control-label']) !!}
                                    {!! Form::text('objetReservation', old('objetReservation'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('objetReservation'))
                                        <p class="help-block">
                                            {{ $errors->first('objetReservation') }}
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
                                <div class=" col-xs-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" >Address E-Mail</label>
                
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('tel', 'Numéro de téléphone', ['class' => 'control-label']) !!}
                                    {!! Form::text('tel', old('tel'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('tel'))
                                        <p class="help-block">
                                            {{ $errors->first('tel') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('datedebut', 'Date début*', ['class' => 'control-label']) !!}
                                    {!! Form::text('datedebut', old('datedebut'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('datedebut'))
                                        <p class="help-block">
                                            {{ $errors->first('datedebut') }}
                                        </p>
                                    @endif
                                </div>
                            
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('datefin', 'Date de fin*', ['class' => 'control-label']) !!}
                                    {!! Form::text('datefin', old('datefin'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('datefin'))
                                        <p class="help-block">
                                            {{ $errors->first('datefin') }}
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
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('heuredebut', 'Heure debut*', ['class' => 'control-label']) !!}
                                    {!! Form::text('heuredebut', old('heuredebut'), ['class' => 'form-control time', 'placeholder' => 'HH:MM', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('heuredebut'))
                                        <p class="help-block">
                                            {{ $errors->first('heuredebut') }}
                                        </p>
                                    @endif
                                </div>
                            
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('heurefin', 'Heure fin*', ['class' => 'control-label']) !!}
                                    {!! Form::text('heurefin', old('heurefin'), ['class' => 'form-control time', 'placeholder' => 'HH:MM', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('heurefin'))
                                        <p class="help-block">
                                            {{ $errors->first('heurefin') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
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
                            {!! Form::submit(trans('Enregistrer'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                       


            </div>
        </div>
    </div>

    @section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        }).datepicker("setDate", "0");
        </script>
    
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>
	
	
@stop
@include('partials.javascripts')
</body>
</html>