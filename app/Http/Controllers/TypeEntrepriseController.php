<?php

namespace App\Http\Controllers;

use App\TypeEntreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class TypeEntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('type_access')) {
            return abort(401);
        }

        $types = TypeEntreprise::all();

        return view('admin.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('type_create')) {
            return abort(401);
        }
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('type_create')) {
            return abort(401);
        }
		$type = new TypeEntreprise;
		$type->titre = $request->titre;
		$type->save();

        return redirect()->route('admin.type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeEntreprise  $typeEntreprise
     * @return \Illuminate\Http\Response
     */
    public function show(TypeEntreprise $typeEntreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeEntreprise  $typeEntreprise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('type_edit')) {
            return abort(401);
        }

        $type = TypeEntreprise::findOrFail($id);

        return view('admin.type.edit', compact('type') );
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
        if (! Gate::allows('type_edit')) {
            return abort(401);
        }
        $type = TypeEntreprise::findOrFail($id);
        $type->update($request->all());
        return redirect()->route('admin.type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeEntreprise  $typeEntreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('type_delete')) {
            return abort(401);
        }
        $type = TypeEntreprise::findOrFail($id);
        $type->delete();

        return redirect()->route('admin.type.index');
    }
}
