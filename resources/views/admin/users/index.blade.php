@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Utilisateurs')</h3>
    @can('user_create')
    <p>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">@lang('Ajouter')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('user_delete')
                            <th style="text-align:center;" data-toggle="tooltip" data-placement="left" title="Selectionner tout"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('Nom')</th>
                        <th>@lang('Email')</th>
                        <th>@lang('quickadmin.users.fields.role')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr data-entry-id="{{ $user->id }}">
                                @can('user_delete')
                                    <td data-toggle="tooltip" data-placement="left" title="Selectionner"></td>
                                @endcan

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->title or '' }}</td>
                                <td>
                                    @can('user_view')
                                    <button class="btn" >
                                        <a href="{{ route('admin.users.show',[$user->id]) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a></button>
                                    @endcan
                                    @can('user_edit')
                                    <button class="btn" ><a href="{{ route('admin.users.edit',[$user->id]) }}" >
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a></button>
                                    @endcan
                                    @can('user_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Vous êtes sûr?")."');",
                                        'route' => ['admin.users.destroy', $user->id])) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['class' => 'btn', 'type' => 'submit']) !!}
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
@stop

@section('javascript') 
    <script>
        @can('user_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
        @endcan

    </script>
@endsection