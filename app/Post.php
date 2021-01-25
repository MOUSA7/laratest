<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title','content','slug','country_id','status','city_id'];
    //

    public function Country(){

        return $this->belongsTo(Country::class);

    }

    public function city(){

        return $this->belongsTo(City::class);

    }

    public function user(){
        return $this->belongsTo(User::class);
    }

//    public function setSlugAttribute($value){
//        dd($slug);
//        $this->attributes['slug'] = Str::slug($this->title);
//    }
}
