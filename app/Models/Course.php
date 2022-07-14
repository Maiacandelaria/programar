<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $whithcount = ['students','reviews'];

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3; 

    public function getRatingAtribute() {

        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 1);
        }else{
            return ;
        }

        }
        
    

    
    //relacion uno a muchos
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
    public function requirement(){
        return $this->hasMany('App\Models\Requirement');
    }
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }
    
    //Relacion uno a muchos Inversa
    public function user_teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    //Relacion muchos a muchos
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }


    //Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lesson(){
        return $this->hasManyThrough('App\Models\Lesson', 'lessonable');
    }

}
