<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMaster extends Model
{
    use HasFactory;
    protected $table = 'company_master';
    protected $fillable = [
        'company_name',
        'contact_number',
        'slug',
        'company_address',
        'logo_path',
        'gst_number',
        'co_pan_number',
        'user_id',
        'city_id',
        'state_id',
        'website'
    ];

    public function company_users()
    {
        return $this->belongsToMany(CompanyMaster::class, 'company_users', 'company_id', 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(CityMaster::class, 'city_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCOmpanyLogoUrlAttribute(){
        return $this->logo_path ? config('filesystems.disks.spaces.url').$this->logo_path : "";
    }
}
