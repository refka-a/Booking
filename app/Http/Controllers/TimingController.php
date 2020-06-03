<?php

namespace App\Http\Controllers;

use App\Timing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class TimingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('timing_access')) {
            return abort(401);
        }

        $timings = Timing::all();

        return view('admin.timing.index', compact('timings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        if (! Gate::allows('timing_create')) {
            return abort(401);
        }

        return view('admin.timing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('timing_create')) {
            return abort(401);
        }
		$timing = new Timing;
		$timing->titre = $request->titre;
		$timing->save();
        
        return redirect()->route('admin.timing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('timing_view')) {
            return abort(401);
        }
        $timing = Timing::findOrFail($id);
        
        return view('admin.timing.show', compact('timing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('timing_edit')) {
            return abort(401);
        }
        $timing = Timing::findOrFail($id);

        return view('admin.timing.edit', compact('timing'));
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
        if (! Gate::allows('timing_edit')) {
            return abort(401);
        }
        $timing = Timing::findOrFail($id);
        $timing->update($request->all());
        return redirect()->route('admin.timing.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('timing_delete')) {
            return abort(401);
        }
        $timing = Timing::findOrFail($id);
        $timing->delete();

        return redirect()->route('admin.timing.index');
    }

    /**
     * Delete all selected timing at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('timing_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Timing::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
