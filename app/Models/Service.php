<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'category', 'city'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function scopeFilter($q){
        if(request('category')){
            if(request('category') == ''){
                $q->get();
            }
            else $q->where('category', '=', request('category'));
        }
        if(request('city')){
            if(request('city') == ''){
                $q->get();
            }
            else $q->where('city', '=', request('city'));
        }
        if(request('sortBy')){
            if(request('sortBy') == ''){
                $q->get();
            }
            else if(request('sortBy') == 'Najlacnejšie') $q->orderBy('price', 'ASC');
            else if(request('sortBy') == 'Najdrahšie') $q->orderBy('price', 'DESC');
            else if(request('sortBy') == 'Najnovšie') $q->orderBy('created_at', 'DESC');
            else if(request('sortBy') == 'Najstaršie') $q->orderBy('created_at', 'ASC');
        }
        return $q;
    }
    public function getPhotos(){
        return DB::table('service_photos')->where('service_id', $this->id)->get()->pluck('path');
    }

    public function getThumbnail(){
        return DB::table('service_photos')->where('service_id', $this->id)->where('priority', 1)->pluck('path')->first();
    }
}
