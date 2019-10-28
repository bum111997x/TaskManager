<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customermanager";
    public $timestamps = false;

    protected $fillable = [
        'id','name','phone' ,'email', 'address','image',
    ];
}

