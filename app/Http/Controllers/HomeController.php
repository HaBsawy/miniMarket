<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {

        $salesDayCount = Sale::whereDate('created_at', date('Y-m-d'))->count();
        $salesDaySum = Sale::whereDate('created_at', date('Y-m-d'))->sum('earning');

        $salesMonthCount = Sale::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $salesMonthSum = Sale::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('earning');

        $salesYearCount = Sale::whereYear('created_at', date('Y'))->count();
        $salesYearSum = Sale::whereYear('created_at', date('Y'))->sum('earning');

        return view('home.Index', compact('salesDayCount', 'salesDaySum', 'salesMonthCount', 'salesMonthSum', 'salesYearCount', 'salesYearSum'));
    }
}
