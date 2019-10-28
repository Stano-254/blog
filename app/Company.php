<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];   //allow mass population of database

    public function customer(){

        return $this->hasMany(Customer::class);
    }
}

