@extends('layouts.app')

@section('content')
    <h3 class="page-title">Type de l'entreprise</h3>
    @can('type_create')
    <p>
        <a href="{{ route('admin.type.create') }}" class="btn btn-success">@lang('Ajouter')</a>

    </p>
    @endcan

    <div class="panel panel-default">
        

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($types) > 0 ? '' : '' }} @can('type_delete') dt-select @endcan">
                <thead>
                    <tr>
                        <th>Type de l'entreprise</th>
                        <th>&nbsp;</th>
                    </tr> 
                </thead>

                <tbody>
                    @if (count($types) > 0)
                        @foreach ($types as $type)
                            <tr data-entry-id="{{ $type->id }}">

                                <td>{{ $type->titre }}</td>
                                <td>
                                    @can('type_edit')
                                    <button class="btn" >
                                        <a href="{{ route('admin.type.edit',[$type->id]) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a></button>
                                    @endcan
                                    @can('type_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Etes-vous sur?")."');",
                                        'route' => ['admin.type.destroy', $type->id])) !!}
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
