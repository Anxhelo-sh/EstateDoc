<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date' ,
        'end_date' ,
        'full_name' ,
        'email' ,
        'no_of_persons',
        'user_id',
        'property_id'
    ] ;

    public function user(){
        return $this->belongsTo(User::class) ;
    }
    public function property(){
        return $this->belongsTo(Property::class) ;
    }
}
