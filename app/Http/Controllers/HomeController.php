<?php

namespace App\Http\Controllers;

use App\Models\onduty;
use App\Models\weapon;
use App\service\StockManage;
use Illuminate\Http\Request;
use App\Models\supervisorOrder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $service;
    public function __construct(StockManage $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }

   
    public function index()
    {
        $list_weapon = weapon::all();
        $my_order = supervisorOrder::where('supervisor_id', Auth::user()->id)->get();
        return view('home', compact(['list_weapon', 'my_order']));
    }

    public function cart_Weapon()
    {
        $check = $this->service->check_stock(request()->weapon_id, request()->quantity);
        if($check){
        return redirect()->back()
         ->with('warning','Quantity shuld be Less  '. request()->quantity);
        }

        $supervisor_order = new supervisorOrder();
        $supervisor_order->weapon_id = request()->weapon_id;
        $supervisor_order->weapon_type = request()->weapon_type;
        $supervisor_order->supervisor_id = Auth::user()->id;
        $supervisor_order->duty_location = request()->duty_location;
        $supervisor_order->quantity = request()->quantity;
        $supervisor_order->status = "not approved";
        $supervisor_order->save();

        return back();
    }

    public function orderWeapon()
    {
        $order = supervisorOrder::where('supervisor_id', Auth::user()->id)->get();
        foreach ($order as $weapon) {
            $send_order = new onduty();
            $send_order->weapon_id = $weapon['weapon_id'];
            $send_order->supervisor_id = $weapon['supervisor_id'];
            $send_order->requested_by = Auth::user()->name;
            $send_order->approved_by = "store person";
            $send_order->quantity = $weapon['quantity'];
            $send_order->duty_location = $weapon['duty_location'];
            $send_order->save();
            $this->service->bal_stock($send_order->weapon_id, $send_order->quantity);

        }
        return redirect()->back();
    }
}
