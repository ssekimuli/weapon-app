<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supervisorOrder extends Model
{
    use HasFactory;
    protected $fillable =[
        'weapon_id',
        'supervisor_id',
        'duty_location',
        'status',
    ];
}
