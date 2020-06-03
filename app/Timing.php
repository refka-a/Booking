<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Timing extends Model
{
    use SoftDeletes;

    protected $fillable = ['titre'];
}
