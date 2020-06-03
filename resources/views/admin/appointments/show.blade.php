@extends('layouts.app')

@section('content')
    <h3 class="page-title">Réservation</h3>

    <div class="panel panel-default">
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Salle</th>
                            <td>{{ $appointment->salle->nom or '' }}</td>
                        </tr>
                        <tr>
                            <th>Descriptipn Salle</th>
                            <td>{{ isset($appointment->salle) ? $appointment->salle->description : '' }}</td>
                        </tr>
                        
                        
                        <tr> 
                            <th>Réservée par</th>
                            <td>{{ $appointment->user->name }}</td>
                       
                            
                        </tr>
                        <tr>
                            <th>Date début</th>
                            <td>{{ $appointment->start_time }}</td>
                        </tr>
                        <tr>
                            <th>Date fin</th>
                            <td>{{ $appointment->finish_time }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.appointments.index') }}" class="btn btn-default">Retour</a>
        </div>
    </div>
@stop