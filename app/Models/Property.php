<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory ;
    protected $fillable = [
        'price',
        'user_id',
        'category',
        'type',
        'street_adress',
        'city',
        'state',
        'number_of_rooms',
        'number_of_bathrooms',
        'has_garden',
        'has_pool',
        'has_garage',
        'has_furnitures',
        'status',
        'image',
        'start_date',
        'end_date',

    ];

    protected  $filters = [
        'sort' ,
        'between' ,
        'like' ,
    ];
    public function user(){
        return $this->belongsTo(User::class) ;
    }
}
