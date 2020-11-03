<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function scopeFilter($q){
        if(request('serviceCategory')){
            if(request('serviceCategory') == ''){
                $q->get();
            }
            else $q->where('serviceCategory', '=', request('serviceCategory'));
        }
        if(request('serviceCity')){
            if(request('serviceCity') == ''){
                $q->get();
            }
            else $q->where('serviceCity', '=', request('serviceCity'));
        }
        if(request('sortBy')){
            if(request('sortBy') == ''){
                $q->get();
            }
            else if(request('sortBy') == 'Najlacnejšie') $q->orderBy('servicePrice', 'ASC');
            else if(request('sortBy') == 'Najdrahšie') $q->orderBy('servicePrice', 'DESC');
            else if(request('sortBy') == 'Najnovšie') $q->orderBy('created_at', 'DESC');
            else if(request('sortBy') == 'Najstaršie') $q->orderBy('created_at', 'ASC');
        }
        return $q;
    }
}
