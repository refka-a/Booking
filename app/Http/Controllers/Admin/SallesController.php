<?php

namespace App\Http\Controllers\Admin;

use App\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSallesRequest;
use App\Http\Requests\Admin\UpdateSallesRequest;

class SallesController extends Controller
{
    /**
     * Display a listing of Salle.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('salle_access')) { 
            return abort(401);
        }

        $salles = Salle::all();

        return view('admin.salles.index', compact('salles')); 
    }

    /**
     * Show the form for creating new Salle.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('salle_create')) {
            return abort(401);
        }
        return view('admin.salles.create');
    }

    /**
     * Store a newly created salle in storage.
     *
     * @param  \App\Http\Requests\StoreSallesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSallesRequest $request)
    {
        if (! Gate::allows('salle_create')) {
            return abort(401);
        }
        $salle = Salle::create($request->all());

        return redirect()->route('admin.salles.index');

       
    }


    /**
     * Show the form for editing Salle.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('salle_edit')) {
            return abort(401);
        }
        $salle = Salle::findOrFail($id);

        return view('admin.salles.edit', compact('salle'));
    }

    /**
     * Update Salle in storage.
     *
     * @param  \App\Http\Requests\UpdateSallesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSallesRequest $request, $id)
    {
        if (! Gate::allows('salle_edit')) {
            return abort(401);
        }
        $salle = Salle::findOrFail($id);
        $salle->update($request->all());

        return redirect()->route('admin.salles.index');
    }


    /**
     * Display Salle.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('salle_view')) {
            return abort(401);
        }
        $relations = [
            'appointments' => \App\Appointment::where('salle_id', $id)->get(),
        ];

        $salle = Salle::findOrFail($id);

        return view('admin.salles.show', compact('salle') + $relations);
    }


    /**
     * Remove Salle from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('salle_delete')) {
            return abort(401);
        }
        $salle = Salle::findOrFail($id);
        $salle->delete();

        return redirect()->route('admin.salles.index');
    }

    /**
     * Delete all selected Salle at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('salle_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Salle::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
