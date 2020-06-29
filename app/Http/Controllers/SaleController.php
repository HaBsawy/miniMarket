<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Sale;
use App\Item;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'sale';
        $title = 'المبيعات';
        $sales = Sale::all();
        $items = Item::all();

        return view('sales.index', compact('sales', 'items', 'active', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        $item = Item::where('id', $request->item_id)->first();

        $sale = new Sale();
        $sale->item_id = $request->item_id;
        $sale->quantity = $request->quantity;
        $sale->sell_price = $item->sell_price * $request->quantity;
        $sale->earning = $item->earning * $request->quantity;

        if ($item->quantity >= $request->quantity) {
            $item->quantity -= $request->quantity;
            $item->save();
            $sale->save();

            return redirect()->back()->with('success', 'تم اضافة عملية البيع بنجاح');
        } else {
            return redirect()->back()->with('danger', 'عفوا كمية البيع اكبر من الكمية الموجودة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $item = Item::where('id', $sale->item_id)->first();
        $item->quantity += $sale->quantity;
        $item->save();
        $sale->delete();

        return redirect()->back()->with('success', 'تم حذف عملية البيع بنجاح');
    }
}
