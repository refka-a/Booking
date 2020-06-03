<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Salle
 *
 * @package App
 * @property string $nom
 * @property string $description
 * @property string $etat
*/
class Salle extends Model
{
    use SoftDeletes;

    protected $fillable = ['nom', 'description', 'etat', 'couleur'];
    
    
}
 