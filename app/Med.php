<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Med extends Model
{
    protected $fillable = [
        'name','date','hour' ,'user_id','time','amount'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
