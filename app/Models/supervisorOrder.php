<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supervisorOrder extends Model
{
    use HasFactory;
    protected $fillable =[
        'weapon_id',
        'weapon_type',
        'supervisor_id',
        'duty_location',
        'quantity',
        'status',
    ];

    public function weapon()
    {
        return $this->hasMany(weapon::class);
    }
}
