<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateMaster extends Model
{
    use HasFactory;

    protected $table = 'state_master';

    protected $fillable = [
        'state_name','state_abbreviation',

    ];
}
