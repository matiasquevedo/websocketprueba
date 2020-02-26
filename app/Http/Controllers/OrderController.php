<?php

namespace App\Http\Controllers;

use App\Order;
use App\Commerce;
use App\Board;
use App\Item;
use App\Product;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $commerces = Commerce::orderBy('id','DESC')->with('boards')->with('products')->get();
        // dd($commerces);
        return view(\Auth::user()->type.'.order.create')->with('commerces',$commerces);
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $board = Board::findBySlug($request['Board']);
        $commerce = Commerce::findBySlug($request['Commerce']['slug']);
        $products = $request['Products'];
        $precioTotal = 0;
        $order = new Order();
        $order->user_id = \Auth::user()->id;
        $order->commerce_id = $commerce->id;
        $order->board_id = $board->id;
        $order->save();
        $order->identification = $order->id*time();
        $order->save();

        foreach ($products as $p) {
            $product = Product::findBySlug($p);
            $item = new Item();
            $item->order_id = $order->id;
            $item->product_id = $product->id;
            $item->save();
            if ($product->descuento > 0) {
                $precioTotal = $precioTotal + $product->precioDescuento;
            }else {
                $precioTotal = $precioTotal + $product->precio;
            }           
        }
        $order->totalPrice = $precioTotal;
        $order->save();
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
