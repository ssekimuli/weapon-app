<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weapon extends Model
{
    use HasFactory;
    protected $fillable = [
        'weapon_type',
        'serial_number',
        'number_of_rounds',
        'quantity',
    ];

    public function supervisor_order()
    {
        return $this->belongsTo(supervisorOrder::class);
    }
}
