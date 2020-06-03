<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class TypeEntreprise
 *
 * @package App
 * @property string $titre
*/
class TypeEntreprise extends Model
{
    use SoftDeletes;

    protected $fillable = ['titre'];
}
