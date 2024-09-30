<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityMaster extends Model
{
    use HasFactory;

    protected $table = 'city_master';

    protected $fillable =[
        'city_name', 'state_name', 'state_id'
    ];

    public function state()
    {
        return $this->belongsTo(StateMaster::class, 'state_id');
    }
    
    public function getCityFullNameAttribute()
    {
        return $this->city_name . ", " . $this->state->state_name;
    }
}
