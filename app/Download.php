<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Download extends Model
{
    public $tables = 'downloads';

    public function publication(){
        return $this->belongsTo('App\Publication');
    }
}


