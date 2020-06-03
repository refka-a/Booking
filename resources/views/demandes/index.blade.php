@extends('layouts.app')

@section('content')
    <h3 class="page-title">Liste des demandes</h3>
   
    <div class="panel panel-default">
        

        <div class="panel-body table-responsive">
         
    <!-- Tableau des Demandes --> 

            <table class="table table-bordered table-striped {{ count($demandes) > 0 ? 'datatable' : '' }} @can('demande_confirm') dt-select @endcan">
                <thead>
                    <tr>
                        
                        <th>RaisonSociale</th>
                        <th>Type de l'entreprise </th>
                        <th>Objet</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Tel </th>
                        <th>datedebut </th>
                        <th>datefin </th>
                        <th>timing</th>
                        <th>heuredebut</th>
                        <th>heurefin </th>
                        
                    </tr> 
                </thead>

                <tbody>
                    @if (count($demandes) > 0)
                        @foreach ($demandes as $demande)
                            <tr data-entry-id="{{ $demande->id }}">
                                <td>{{ $demande->raisonSociale }}</td>
                                <td>{{ $demande->type_entreprise->titre }}</td>
                                <td>{{ $demande->objetReservation }}</td>
                                <td>{{ $demande->description }}</td>
                                <td>{{ $demande->email }}</td>
                                <td>{{ $demande->tel }}</td>
                                <td>{{ $demande->datedebut }}</td>
                                <td>{{ $demande->datefin  }}</td>
                                <td>{{ $demande->timing->titre}}</td>
                                <td>{{ $demande->heuredebut  }}</td>
                                <td>{{ $demande->heurefin   }}</td>
                               
                                
                            </tr>
                        @endforeach                        
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
  
@endsection
