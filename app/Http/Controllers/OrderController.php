<?php

namespace Invoice\Http\Controllers;

use Illuminate\Http\Request;
use Invoice\Order;
use Invoice\OrderItem;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::all();
        return view('home')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [


        ]);
        $order_total_before_tax = 0;
        $order_total_tax1 = 0;
        $order_total_tax2 = 0;
        $order_total_tax3 = 0;
        $order_total_tax = 0;
        $order_total_after_tax = 0;

        DB::beginTransaction();
        try {
            $orders = new Order();
            $orders->order_receiver_name = $request->input('order_receiver_name');
            $orders->order_receiver_adress = $request->input('order_receiver_adress');
            $orders->order_no = $request->input('order_no');
            $orders->order_date = $request->input('order_date');
            $orders-> $order_total_before_tax = $request->input( $order_total_before_tax);
            $orders->$order_tax1 = $request->input($order_total_tax1);
            $orders->$order_tax2 = $request->input($order_total_tax2);
            $orders->$order_tax3 = $request->input($order_total_tax3);
            $orders->$order_total_tax = $request->input($order_total_tax);
            $orders->$order_total_after_tax = $request->input($order_total_after_tax);
            $orders->$order_datetime = $request->input(date("Y-m-d"));
            $orders->save();
            $statement =  Order::tabel('orders')->insertGetId();
            $order_id = $statement->first();

            for ($count=0; $count <$request->input('total_item') ; $count++) { 
               $order_total_before_tax = $order_total_after_tax + floatval(trim([$request->input('item_actual_amount'),$count]));
               $order_total_tax1 = $order_total_tax1 + floatval(trim([$request->input('item_tax1_amount'), $count]));
               $order_total_tax2 = $order_total_tax2 + floatval(trim([$request->input('item_tax2_amount'), $count]));
               $order_total_tax3 = $order_total_tax3 + floatval(trim([$request->input('item_tax3_amount'), $count]));
               $order_total_after_tax = $order_total_after_tax + floatval(trim([$request->input('item_final_amount'), $count]));
           $orderItem = new OrderItem();
           $orderItem->item_name = [$request->input('item_name'), $count];
           $orderItem->order_item_qty = [$request->input('item_quantity'), $count];
           $orderItem->order_item_price = [$request->input('item_price'), $count];
           $orderItem->order_item_actual_amount = [$request->input('item_actual_amount'), $count];
           $orderItem->oder_item_tax1_rate = [$request->input('item_tax1_rate'), $count];
           $orderItem->order_item_tax1_amount = [$request->input('item_tax1_amount'), $count];
           $orderItem->order_item_tax2_rate = [$request->input('item_tax2_rate'), $count];
           $orderItem->order_item_tax2_amount = [$request->input('item_tax2_amount'), $count];
           $orderItem->order_item_tax3_rate = [$request->input('item_tax3_rate'), $count];
           $orderItem->order_item_tax3_amount = [$request->input('item_tax3_amount'), $count];
           $orderItem->order_item_final_amount = [$request->input('item_final_amount'), $count];
            }
        } catch (\Throwable $th) {
            //throw $th;
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
    public function destroy($id)
    {
        //
    }
}
