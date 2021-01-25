<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','city_id'];


    public function citizen(){
        return $this->hasMany(City::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
    //
}
