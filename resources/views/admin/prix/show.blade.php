@extends('layouts.app')

@section('content')
    <h3 class="page-title">Prix</h3>

    <div class="panel panel-default">
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Salle</th>
                            <td>{{ $prix->salle->nom or '' }}</td>
                        </tr>
                        <tr>
                            <th>Timing</th>
                            <td>{{ $prix->timing->titre or '' }}</td>
                        </tr>
                        <tr>
                            <th>Type de l'entreprise</th>
                            <td>{{ $prix->type_entreprise->titre or '' }}</td>
                        </tr>
                        <tr>
                            <th>Prix</th>
                            <td>{{ $prix->prix }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.prix.index') }}" class="btn btn-default">Retour</a>
        </div>
    </div>
@stop