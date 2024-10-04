<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMaster extends Model
{
    use HasFactory;
    protected $table = 'company_master';
    protected $fillable = [
'company_name','contact_number','slug','company_address','logo_path','gst_number','co_pan_number','admin_id','city_id','state_id','website'   
];
}
