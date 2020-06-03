<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Appointment
 *
 * @package App
 * @property string $salle
 * @property string $type_entreprise
 * @property string $timing
 * @property string $raisonSociale
 * @property string $objetReservation
 * @property string $description
 * @property string $email
 * @property string $tel
 * @property string $datedebut
 * @property string $datefin
 * @property string $heuredebut 
 * @property string $heurefin
 * 
*/

class Demande extends Model
{
    use SoftDeletes;

    protected $fillable = ['raisonSociale', 'type_id', 'objetReservation', 'description', 'email', 
    
    'tel', 'datedebut','datefin', 'timing_id', 'heuredebut', 'heurefin' , 'salle_id' ];

    // clées étrangères

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'salle_id')->withTrashed();
    }
    
    public function type_entreprise()
    {
        return $this->belongsTo(TypeEntreprise::class, 'type_id')->withTrashed();
    }

    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_id')->withTrashed();
    }
	
}
