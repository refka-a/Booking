@extends('layouts.app')

@section('content')
    <h3 class="page-title">Salles</h3>
    @can('salle_create')
    <p>
        <a href="{{ route('admin.salles.create') }}" class="btn btn-success">@lang('Ajouter')</a>

    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($salles) > 0 ? 'datatable' : '' }} @can('salle_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('salle_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th style="width:20%">Nom</th>
                        <th style="width:40%">Description</th>
                        <th style="width:30%">Etat de la salle</th>
                        <th>Couleur</th>
                        <th>&nbsp;</th>
                    </tr> 
                </thead>

                <tbody>
                    @if (count($salles) > 0)
                        @foreach ($salles as $salle)
                            <tr data-entry-id="{{ $salle->id }}">
                                @can('salle_delete')
                                    <td data-toggle="tooltip" data-placement="left" title="Selectionner"></td>
                                @endcan

                                <td >{{ $salle->nom }}</td>
                                <td >{{ $salle->description }}</td>
                                <td >{{ $salle->etat }}</td>
                                <td  style="background-color:{{ $salle->couleur }}"></td>
                                <td>
                                    @can('salle_view')
                                    <button class="btn" >
                                        <a href="{{ route('admin.salles.show',[$salle->id]) }}" >
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    </button>
                                    @endcan
                                    @can('salle_edit')
                                    <button class="btn" >
                                        <a href="{{ route('admin.salles.edit',[$salle->id]) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    </button>
                                    @endcan
                                    @can('salle_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Etes-vous sur?")."');",
                                        'route' => ['admin.salles.destroy', $salle->id])) !!}
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
    <script>
        @can('salle_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.salles.mass_destroy') }}';
        @endcan

    </script>
@endsection
