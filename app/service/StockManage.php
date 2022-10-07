<?php

namespace App\service;

use App\Models\weapon;
use App\Models\supervisorOrder;
use Illuminate\Support\Facades\Auth;

class StockManage
{

    public function bal_stock($weapon_id, $quantity)
    {
        $stock = weapon::where('id', $weapon_id)->first();
        $stock->update([
            'quantity' => $stock->quantity - $quantity,
        ]);
        $order = supervisorOrder::where('supervisor_id', Auth::user()->id)->delete();
    }

    public function check_stock($weapon_id, $quantity_req)
    {
        $in_stock = weapon::where('id', $weapon_id)->first();
        $stock_items = (int)$in_stock->quantity < (int)$quantity_req;
        return $stock_items;
    }
}
