<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onduty extends Model
{
    use HasFactory;
    protected $fillable =[
        'weapon_id',
        'supervisor_id',
        'requested_by',
        'approved_by',
        'quantity',
        'duty_location',
    ];
}
