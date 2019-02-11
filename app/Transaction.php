<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [ 'user_id','type', 'desc', 'value', 'date' ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
