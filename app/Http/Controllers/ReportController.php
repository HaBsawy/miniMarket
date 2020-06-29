<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class ReportController extends Controller
{
    public function day() {

        $active = 'report';
        $subActive = 'day';
        $title = 'التقرير اليومى';
        $reportType = ' اليومى "' . date('Y-m-d') . '"';
        $sales = Sale::whereDate('created_at', date('Y-m-d'))->get();

        return view('reports.Index', compact('sales', 'reportType', 'active', 'subActive', 'title'));
    }

    public function month() {

        $active = 'report';
        $subActive = 'month';
        $title = 'التقرير الشهرى';
        $reportType = ' الشهرى "' . date('Y-m') . '"';
        $sales = Sale::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();

        return view('reports.Index', compact('sales', 'reportType', 'active', 'subActive', 'title'));
    }

    public function year() {

        $active = 'report';
        $subActive = 'year';
        $title = 'التقرير السنوى';
        $reportType = ' السنوى "' . date('Y') . '"';
        $sales = Sale::whereYear('created_at', date('Y'))->get();

        return view('reports.Index', compact('sales', 'reportType', 'active', 'subActive', 'title'));
    }
}
