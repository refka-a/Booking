@extends('layouts.app')

@section('content')
    <h3 class="page-title">Salles</h3>

    <div class="panel panel-default">
        

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nom</th>
                            <td>{{ $salle->nom }}</td>
                        </tr>
                        <tr>
                            <th>Déscription</th>
                            <td>{{ $salle->description }}</td>
                        </tr>
                        <tr>
                            <th>Etat</th>
                            <td>{{ $salle->etat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <br/>
            <br/>
            <br/>    
            
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#appointments" aria-controls="appointments" role="tab" data-toggle="tab">Réservations</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="appointments">
<table class="table table-bordered table-striped {{ count($appointments) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
                        <th>Réservée par</th>
                        <th>Date début</th>
                        <th>Date Fin</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($appointments) > 0)
            @foreach ($appointments as $appointment)
                <tr data-entry-id="{{ $appointment->id }}">
                    <td>{{ $appointment->user->name or '' }}</td>
                    <td>{{ $appointment->start_time }}</td>
                    <td>{{ $appointment->finish_time }}</td>
                                <td>
                                    @can('appointment_view')
                                    <a href="{{ route('admin.appointments.show',[$appointment->id]) }}" class="btn btn-xs btn-primary">Voir</a>
                                    @endcan
                                    @can('appointment_edit')
                                    <a href="{{ route('admin.appointments.edit',[$appointment->id]) }}" class="btn btn-xs btn-info">Modifier</a>
                                    @endcan
                                    @can('appointment_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Vous êtes sûr?")."');",
                                        'route' => ['admin.appointments.destroy', $appointment->id])) !!}
                                    {!! Form::submit(trans('Supprimer'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <a href="{{ route('admin.salles.index') }}" class="btn btn-default">Retour</a>
        </div>
    </div>
@stop