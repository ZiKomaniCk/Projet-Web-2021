<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countUser = User::all()->count();
        $order = Order::all();
        $countOrder = $order->count();
        $countOrderAmount = DB::select(
                DB::raw("
                    SELECT SUM(o.amount) as sum_cmd
                    FROM orders AS o;
                ")
            );
        $countOrderAmount = (floatval($countOrderAmount[0]->sum_cmd)) /1000 ;

        $countOrderSevenDay = DB::select(
            DB::raw("
                SELECT count(*) as nb_cmd_7
                FROM orders
                WHERE `payment_created_at` BETWEEN NOW() - INTERVAL 7 DAY AND NOW();
            ")
        );
        $countOrderSevenDay = $countOrderSevenDay[0]->nb_cmd_7;

        $countOrderAmountSevenDays = DB::select(
            DB::raw("
                SELECT SUM(o.amount) as sum_cmd_7
                FROM orders AS o
                WHERE `payment_created_at` BETWEEN NOW() - INTERVAL 7 DAY AND NOW();
            ")
        );
        $countOrderAmountSevenDays = (floatval($countOrderAmountSevenDays[0]->sum_cmd_7)) /1000 ;

        // dd($countOrderAmountSevenDays);
        return view('admin.dashboards.index', [
            'countUser' => $countUser,
            'countOrder' => $countOrder,
            'countOrderAmount' => $countOrderAmount,
            'countOrderSevenDay' => $countOrderSevenDay,
            'countOrderAmountSevenDays' => $countOrderAmountSevenDays
        ]);
    }

}
