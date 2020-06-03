@extends('layouts.app')

@section('content')
    <h3 class="page-title">Liste des prix</h3>
    @can('prix_create')
    <p>
        <a href="{{ route('admin.prix.create') }}" class="btn btn-success">@lang('Ajouter')</a>

    </p>
    @endcan

    <div class="panel panel-default">
        

        <div class="panel-body table-responsive">
         
    <!-- Tableau des prix , en fonction du timing et du type d'entreprise --> 

            <table class="table table-bordered table-striped {{ count($prix) > 0 ? 'datatable' : '' }} @can('prix_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('prix_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>Salle</th>
                        <th>Type de l'entreprise </th>
                        <th>Timing</th>
                        <th>Prix</th>
                        <th>&nbsp;</th>
                    </tr> 
                </thead>

                <tbody>
                    @if (count($prix) > 0)
                        @foreach ($prix as $prix)
                            <tr data-entry-id="{{ $prix->id }}">
                                @can('prix_delete')
                                    <td data-toggle="tooltip" data-placement="left" title="Selectionner"></td>
                                @endcan
                                <td>{{ $prix->salle->nom }}</td>
                                <td>{{ $prix->type_entreprise->titre }}</td>
                                <td>{{ $prix->timing->titre }}</td>
                                <td>{{ $prix->prix }}</td>
                                <td> 
                                    @can('prix_view')
                                    <button class="btn" >
                                        <a href="{{ route('admin.prix.show',[$prix->id]) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    </button>
                                    @endcan
                                    @can('prix_edit')
                                    <button class="btn" >
                                        <a href="{{ route('admin.prix.edit',[$prix->id]) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    </button>
                                    @endcan
                                    @can('prix_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Etes-vous sur?');",
                                        'route' => ['admin.prix.destroy', $prix->id])) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['class' => 'btn', 'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
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
