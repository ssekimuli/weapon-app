<?php

namespace App\Http\Controllers;

use App\Models\weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    /**
     * weapon page

     
     **/
    public function weapon()
    {
        return view('weapon');
    }

    public function addWeapon()
    {
        $wp = new weapon();
        $wp->weapon_type = request()->weapon_type;
        $wp->serial_number = request()->serial_number;
        $wp->number_of_rounds = request()->number_of_rounds;
        $wp->quantity = request()->quantity;
        $wp->save();
        return back();
    }

}
