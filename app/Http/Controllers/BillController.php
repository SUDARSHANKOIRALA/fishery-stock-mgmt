<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB; 
use App\Item;
use App\Bill;
use App\Customer;
use App\Discount;
use Session;
     


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $bill  = Bill::all();
         $customer = Customer::all();
         $fdiscount = Discount::all();
         return view('Admin.sales.sales_show')->with("bills",$bill)
                                       ->with("customers",$customer)
                                       ->with("discounts",$fdiscount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bill = Bill::all();
        $customer = Customer::all();
        $fdiscount = Discount::all();
        return view('bill.bill_create')->with("bills",$bill)
                                       ->with("customers",$customer)
                                       ->with("discounts",$fdiscount)
                                       ->with("items",Item::where('status','=',1)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // dd($request->all());   
         $customer = new Customer;
         $customer->customer_name = $request->input('customer_name');
         $customer->contact_no = $request->input('contact_no');
         $customer->address = $request->input('address');
        if($customer->save()){
            $id= $customer->id; 
            foreach ($request->item_name as $key => $value) {
                $data =array(   'customer_id'=>$id,
                                'item_id'=>$value,
                                'bill_no'=>$request->bill_no,
                                'quantity'=>$request->quantity[$key],
                                'unit_price'=>$request->unit_price[$key],
                                'discount'=>$request->discount[$key],
                                'amount'=>$request->amount[$key]);
                Bill::insert($data);
            }
            $fdiscount = new Discount;
            $fdiscount->bill_no = $request->input('bill_no');
            $fdiscount->final_discount = $request->input('final_discount');
            $fdiscount->save();


        }

         $single_bill = Bill::where('customer_id',$id)->get();
         // dd($single_bill);
          return view('bill/bill_show')->with("single_bills",$single_bill);

                                    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Bill::find($bill->bill_no);
        dd($detail);
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
    public function findPrice(Request $request)
    {
        $data=Item::select('unit_price')->where('id',$request->id)->first();
        return $data;
    }
    
}
