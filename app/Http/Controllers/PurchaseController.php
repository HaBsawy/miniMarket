<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use App\Purchase;
use App\Item;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'purchase';
        $title = 'المشتريات';
        $items = Item::all();
        $purchases = Purchase::all();
        return view('purchases.index', compact('purchases', 'items', 'active', 'title'));
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
    public function store(PurchaseRequest $request)
    {
        $item = Item::where('id', $request->item_id)->first();

        $purchase = new Purchase();
        $purchase->item_id = $request->item_id;
        $purchase->quantity = $request->quantity;
        $purchase->buy_price = $request->quantity * $item->buy_price;

        $purchase->save();

        $item->quantity += $request->quantity;
        $item->save();

        return redirect()->back()->with('success', 'تم إضافة عملية الشراء بنجاح');
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
    public function destroy(Purchase $purchase)
    {
        $item = Item::where('id', $purchase->item_id)->first();
        $item->quantity -= $purchase->quantity;
        $item->save();
        $purchase->delete();

        return redirect()->back()->with('success', 'تم حذف عملية الشراء بنجاح');
    }
}
