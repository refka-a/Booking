@extends('layouts.app')

@section('content')
    <h3 class="page-title">Plage horaire</h3>
    @can('timing_create')
    <p>
        <a href="{{ route('admin.timing.create') }}" class="btn btn-success">@lang('Ajouter')</a>

    </p>
    @endcan

    <div class="panel panel-default">
        

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($timings) > 0 ? '' : '' }} @can('timing_delete') dt-select @endcan">
                <thead>
                    <tr>

                        <th>Timing</th>
                        <th>&nbsp;</th>
                    </tr> 
                </thead>

                <tbody>
                    @if (count($timings) > 0)
                        @foreach ($timings as $timing)
                            <tr data-entry-id="{{ $timing->id }}">

                                <td>{{ $timing->titre }}</td>
                                <td>
                                    @can('timing_edit')
                                    <button class="btn" >
                                        <a href="{{ route('admin.timing.edit',[$timing->id]) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    </button>
                                    @endcan
                                    @can('timing_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Etes-vous sur?")."');",
                                        'route' => ['admin.timing.destroy', $timing->id])) !!}
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
