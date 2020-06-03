<?php

namespace App\Http\Controllers;

use App\Prix;
use App\Salle;
use App\Timing;
use App\TypeEntreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
 

class PrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('prix_access')) {
            return abort(401);
        }

        $prix = Prix::all();
        $salles = Salle::all();

        return view('admin.prix.index', compact('prix', 'salles'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('prix_create')) {
            return abort(401);
        }
        $relations = [
            'salles' => \App\Salle::get(),
            'type_entreprises' => \App\TypeEntreprise::get(),
            'timings' => \App\Timing::get(),
        ];

        return view('admin.prix.create', $relations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('prix_create')) {
            return abort(401);
        }
		$prix = new Prix;
		$prix->salle_id = $request->salle_id;
		$prix->timing_id = $request->timing_id;
		$prix->type_id = $request->type_id;
		$prix->prix = $request->prix;
		$prix->save();
 
        return redirect()->route('admin.prix.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('prix_view')) {
            return abort(401);
        }
        $relations = [
            'salles' => \App\Salle::get()->pluck('nom', 'id')->prepend('Choisir', ''),
            'type_entreprises' => \App\TypeEntreprise::get()->pluck('titre', 'id')->prepend('Choisir', ''),
            'timings' => \App\Timing::get()->pluck('titre', 'id')->prepend('Choisir', ''),
        ];
 
        $prix = prix::findOrFail($id);
        
        return view('admin.prix.show', compact('prix') + $relations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('prix_edit')) {
            return abort(401);
        }
        $relations = [
            'salles' => \App\Salle::get()->pluck('nom', 'id')->prepend('Choisir', ''),
            'type_entreprises' => \App\TypeEntreprise::get()->pluck('titre', 'id')->prepend('Choisir', ''),
            'timings' => \App\Timing::get()->pluck('titre', 'id')->prepend('Choisir', ''),
        ];

        $prix = Prix::findOrFail($id);

        return view('admin.prix.edit', compact('prix') + $relations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('prix_edit')) {
            return abort(401);
        }
        $prix = Prix::findOrFail($id);
        $prix->update($request->all());
        return redirect()->route('admin.prix.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('prix_delete')) {
            return abort(401);
        }
        $prix = Prix::findOrFail($id);
        $prix->delete();

        return redirect()->route('admin.prix.index');
    }

    /**
     * Delete all selected prix at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('prix_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = prix::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
