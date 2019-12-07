<?php

namespace Invoice\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response;
use Invoice\Order;
use Invoice\OrderItem;
use DB;
use Invoice\User;
use Session;


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

    public function get_data()
    {
        // if ($request->ajax()) {
        //     $data = Order::latest()->get();
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){
   
        //                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
        $invoices = Order::all();
        return view('index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('pages.create');
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
        // generate code
        $count = Order::where('order_no', 'LIKE', '%'. $request->order_receiver_name . '%')->count();
        $str = $request->order_receiver_name;
        $str1 = substr($str, 0, 2);
        $code = str_pad ( $count  , 3 , "0",  STR_PAD_LEFT);
        $invoice_code = $str1 . $code;


        try {
            $orders = new Order();
            $orders->order_receiver_name = $request->input('order_receiver_name');
            $orders->order_receiver_adress = $request->input('order_receiver_adress');
            $orders->order_no = $invoice_code;
            $orders->order_date = $request->input('order_date');
            $orders->order_total_before_tax =  $order_total_before_tax;
            $orders->order_tax1 = $order_total_tax1;
            $orders->order_tax2 = $order_total_tax2;
            $orders->order_tax3 = $order_total_tax3;
            $orders->order_total_tax = $order_total_tax;
            $orders->order_total_after_tax = $order_total_after_tax;
            // $orders->$order_datetime = $request->input(date("Y-m-d"));
            $orders->save();
// dd($request->addmore);
$last_id = Order::latest()->first();
            foreach ($request->addmore as $key => $value) { 
               $order_total_before_tax = $order_total_after_tax + floatval(trim($value['item_actual_amount']));
               $order_total_tax1 = $order_total_tax1 + floatval(trim($value['item_tax1_amount']));
               $order_total_tax2 = $order_total_tax2 + floatval(trim($value['item_tax2_amount']));
               $order_total_tax3 = $order_total_tax3 + floatval(trim($value['item_tax3_amount']));
               $order_total_after_tax = $order_total_after_tax + floatval(trim($value['item_final_amount']));
               $orderItem = new OrderItem();
               $orderItem->order_item_id = $last_id->id;
            //    dd($orderItem->order_item_id);
               $orderItem->item_name = $value['item_name'];
               $orderItem->order_item_qty = $value['item_quantity'];
               $orderItem->order_item_price = $value['item_price'];
               $orderItem->order_item_actual_amount = $value['item_actual_amount'];
               $orderItem->oder_item_tax1_rate = $value['item_tax1_rate'];
               $orderItem->order_item_tax1_amount = $value['item_tax1_amount'];
               $orderItem->order_item_tax2_rate = $value['item_tax2_rate'];
               $orderItem->order_item_tax2_amount = $value['item_tax2_amount'];
               $orderItem->order_item_tax3_rate = $value['item_tax3_rate'];
               $orderItem->order_item_tax3_amount = $value['item_tax3_amount'];
               $orderItem->order_item_final_amount = $value['item_final_amount'];
               $orderItem->save();
            }
            $order_total_tax = $order_total_tax1 + $order_total_tax2 +  $order_total_tax3;
            $item = OrderItem::where('order_item_id', $last_id->id)->first();
            $update = Order::where('id', $item->order_item_id)->update([
            'order_total_before_tax' =>  $order_total_before_tax,
            'order_tax1' => $order_total_tax1,
            'order_tax2' => $order_total_tax2,
            'order_tax3' => $order_total_tax3,
            'order_total_tax' =>$order_total_tax,
            'order_total_after_tax' => $order_total_after_tax,
                ]);
                Session::flash('success', 'invoice created successfuly');
            return redirect()->back();
            // for ($count=0; $count <$request->input('total_item') ; $count++) { 
               
          
            // }
        } catch (\Throwable $th) {
            throw $th;
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
