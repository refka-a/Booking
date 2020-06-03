<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Appointment
 *
 * @package App
 * @property string $salle
 * @property string $type_entreprise
 * @property string $timing
 * @property string $titre
 * @property string $prix
*/
class Prix extends Model
{
    use SoftDeletes;

    protected $fillable = ['titre', 'prix', 'salle_id', 'type_id', 'timing_id'];

   
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
