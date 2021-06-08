<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'description', 'price', 'service_type_id', 'category_id', 'city_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function scopeFilter($q){
        if(request('category_id')){
            if(request('category_id') == ''){
                $q->get();
            }
            else $q->where('category_id', '=', request('category_id'));
        }
        if(request('city_id')){
            if(request('city_id') == ''){
                $q->get();
            }
            else $q->where('city_id', '=', request('city_id'));
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
