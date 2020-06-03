<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; 
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAppointmentsRequest;
use App\Http\Requests\Admin\UpdateAppointmentsRequest;

use Carbon\Carbon;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of Appointment.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('appointment_access')) {
            return abort(401);
        } 

        $appointments = Appointment::all();
        $users = User::all();

        return view('admin.appointments.index', compact('appointments'));
    }
  
    /**
     * Show the form for creating new Appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('appointment_create')) {
            return abort(401);
        }
        $relations = [
            'salles' => \App\Salle::get(),
            'users' => \App\User::get(),
        ];

        return view('admin.appointments.create', $relations);
    }

    /**
     * Store a newly created Appointment in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentsRequest $request)
    {
        if (! Gate::allows('appointment_create')) {
            return abort(401);
        }
        
        $reservation = $this->ReservationExiste($request);
        if($reservation){
            return redirect()->back()->with('error','Reservation existe déjà');
        }else{
		$user = \App\User::find($request->user_id);
		$appointment = new Appointment;
		$appointment->salle_id = $request->salle_id;
		$appointment->user_id = $request->user_id;
		$appointment->start_time = $request->start_time;
		$appointment->finish_time = $request->finish_time;
		$appointment->comments = $request->comments;
		$appointment->save();

        return redirect()->route('admin.appointments.index');
    }
}


    /**
     * Show the form for editing Appointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);

        if (! Gate::allows('appointment_edit', $appointment)) {
            return abort(401);
        }
        $relations = [
            'salles' => \App\Salle::get()->pluck('nom', 'id')->prepend('Choisir', ''),
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Choisir', ''),
        ];

        

        return view('admin.appointments.edit', compact('appointment') + $relations);
    }

    /**
     * Update Appointment in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentsRequest $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        if (! Gate::allows('appointment_edit', $appointment)) {
            return abort(401);
        }
        
        $appointment->update($request->all());

        return redirect()->route('admin.appointments.index');
    }


    /**
     * Display Appointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('appointment_view')) {
            return abort(401);
        }
        $relations = [
            'salles' => \App\Salle::get()->pluck('nom', 'id')->prepend('Choisir', ''),
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Choisir', ''),
        ];

        $appointment = Appointment::findOrFail($id);
        $users = User::all();
        
        return view('admin.appointments.show', compact('appointment') + $relations);
    }


    /**
     * Remove Appointment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        if (! Gate::allows('appointment_delete', $appointment)) {
            return abort(401);
        }
        
        $appointment->delete();

        return redirect()->route('admin.appointments.index');
    }

    /**
     * Delete all selected Appointment at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
       
        if (! Gate::allows('appointment_mass')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Appointment::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Verifier si une reservation existe déjà
     */

    private function ReservationExiste($request){
        $reservation = false;
        $resDebu = Appointment::where('salle_id',$request->salle_id)
        ->where('start_time','<=',$request->start_time)
        ->where('finish_time','>=',$request->start_time)
        ->count();
        if($resDebu> 0){
            $reservation = true;
        }
        $resFin = Appointment::where('salle_id',$request->salle_id)
        ->where('start_time','<=',$request->finish_time)
        ->where('finish_time','>=',$request->finish_time)
        ->count();
        if($resFin> 0){
            $reservation = true;
        }
        $resDebuFin = Appointment::where('salle_id',$request->salle_id)
        ->where('start_time','>=',$request->start_time)
        ->where('finish_time','<=',$request->finish_time)
        ->count();
        if($resDebuFin> 0){
            $reservation = true;
        }

        return $reservation;

    }
}
