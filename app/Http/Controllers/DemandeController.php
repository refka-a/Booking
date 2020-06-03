<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Salle;
use App\Timing;
use App\TypeEntreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; 
use Mail;

class DemandeController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('demande_access')) {
            return abort(401);
        }
       $demandes = Demande::all();
       
        return view('demandes.index', compact('demandes'));
        
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'salles' => \App\Salle::get(),
            'type_entreprises' => \App\TypeEntreprise::get(),
            'timings' => \App\Timing::get(),
        ];

        return view('demandes.create', $relations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $demande = new Demande;
        
        $demande->raisonSociale = $request->raisonSociale;
        $demande->type_id = $request->type_id;
        $demande->objetReservation = $request->objetReservation;
        $demande->description = $request->description;
        $demande->email = $request->email;
        $demande->tel = $request->tel;
        $demande->datedebut = $request->datedebut;
        $demande->datefin = $request->datefin;
        $demande->timing_id = $request->timing_id;
        $demande->heuredebut = $request->heuredebut;
        $demande->heurefin = $request->heurefin;
        $demande->salle_id = $request->salle_id;
        $demande->save();
        
        
// Envoi d'email

        Mail::send('emails/mailme',
        array(
            'raisonSociale' => $request->get('raisonSociale'),
            'objetReservation' => $request->get('objetReservation'),
            'description' => $request->get('description'),
            'email' => $request->get('email'),
            'tel' => $request->get('tel'),
            'datedebut' => $request->get('datedebut'),
            'datefin' => $request->get('datefin'),
        ), function($message)
    {
        $message->from('amalchelbi.promo1@gmail.com');
        $message->to('amaruchan91@gmail.com')->subject('Demande de réservation');
   });


   return redirect()->back()->with('success', 'Merci pour votre demande! Vous serez contacté prochainement.'); 
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }

    /**
     * Confirme the specified resource into storage.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function confirm(Demande $demande)
    {
       //
    }
}
