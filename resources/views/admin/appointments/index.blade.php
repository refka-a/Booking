@extends('layouts.app')

@section('content')
    <h3 class="page-title">Calendrier des Réservations</h3>
    @can('appointment_create')
        <p>
            <a href="{{ route('admin.appointments.create') }}"
               class="btn btn-success">Ajouter</a>

        </p>
    @endcan

    
    <link rel='stylesheet' href='{{ asset('css/fullcalendar-customcss.css') }}'>
    <div id='calendar'></div>

    <br />

    <div class="panel panel-default">
        
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($appointments) > 0 ? 'datatable' : '' }} @can('appointment_mass') dt-select @endcan">
                <thead>
                <tr>
                    @can('appointment_mass')
                        <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>   
                    @endcan
                    
                    @if (Auth::user()->id == 2)
                        <td></td>  
                    @endif

                    <th data-toggle="tooltip" data-placement="left" title="Ordre par Nom">Nom de la salle</th>
                    <th data-toggle="tooltip" data-placement="left" title="Ordre par Date de début">Date de début</th>
                    <th data-toggle="tooltip" data-placement="left" title="Ordre par Date de fin">Date de fin</th>
                    <th data-toggle="tooltip" data-placement="left" title="Ordre par Commentaires">Commentaires</th>
                    <th data-toggle="tooltip" data-placement="left" title="Ordre par Nom de l'entreprise">Réservée par</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @if (count($appointments) > 0)
                    @foreach ($appointments as $appointment)
                        <tr data-entry-id="{{ $appointment->id }}">
                            @can('appointment_delete', $appointment)
                                <td @can('appointment_mass')data-toggle="tooltip" data-placement="left" title="Selectionner" @endcan> </td>
                            @endcan
                            @if ( $appointment->user_id !== Auth::user()->id)
                              <td></td>  
                            @endif
                            <td>{{ $appointment->salle->nom or '' }}</td>
                            <td>{{ $appointment->start_time }}</td>
                            <td>{{ $appointment->finish_time }}</td>
                            <td>{!! $appointment->comments !!}</td>
                            <td>{{ $appointment->user->name }}</td>
                            <td>
                                @can('appointment_view')
                                <button class="btn">
                                    <a href="{{ route('admin.appointments.show',[$appointment->id]) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </button>
                                @endcan
                                @can('appointment_edit', $appointment)
                                <button class="btn" >
                                    <a href="{{ route('admin.appointments.edit',[$appointment->id]) }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </button>
                                @endcan
                                @can('appointment_delete', $appointment)
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Etes-vous sur?")."');",
                                        'route' => ['admin.appointments.destroy', $appointment->id])) !!}
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
    
<!-- go to top button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i>
    </button>
@stop

@section('javascript')
    <script>
        @can('appointment_mass')
            window.route_mass_crud_entries_destroy = '{{ route('admin.appointments.mass_destroy') }}';
        @endcan

    </script>

    
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale/fr.js"></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
             },
            
            locale: 'fr',
            selectable: true,
            selectConstraint: {
                start: $.fullCalendar.moment().subtract(1, 'days'),
                end: $.fullCalendar.moment().startOf('month').add(1, 'month')
},
            
            
            events : [
                    @foreach($appointments as $appointment)
                {
                    title : '{{ $appointment->salle->nom. ' par ' . $appointment->user->name }}',
                    start : '{{ $appointment->start_time }}',
                    @if ($appointment->finish_time)
                            end: '{{ $appointment->finish_time }}',
                    @endif
                    url : '{{ route('admin.appointments.edit', $appointment->id) }}',
                    color: '{{ $appointment->salle->couleur }}',
                },
                @endforeach
            ]
        })
    });
</script>
<script src="{{ asset('js/buttonTop.js') }}"></script>
@endsection
