<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcUrlMaster extends Model
{
    use HasFactory;

    protected $table =  'tc_url_master';

    protected  $fillable = [
        'city_id', 'company_icon', 'page_title', 'meta_title', 'meta_description', 'transport_area', 'is_popular',
        'content', 'city_heading', 'city_image', 'city_content'
    ]; 

    //this city function if for get city data 
    // it is a relation  with city table
    public function city() {
        return $this->belongsTo(CityMaster::class, 'city_id');
    }
}
