<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use Session;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('adminsession')){            
            $item  = Item::all();
            return view('Admin.Item.item_show')->with("items",$item);   
        }else{
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                                
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if( Session::has('adminsession') ){
            return view('Admin.Item.item_add');
        }else{
            
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                    
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Session::has('adminsession') ){  

            $this->validate($request,[
            'item_code' => 'required',
            'item_name' => 'required',
            'slug' => 'required',
            'unit_price' => 'required',                
            ]);            

            $item = new Item;
            $item->item_code = $request->input('item_code');
            $item->item_name = $request->input('item_name');
            $item->slug = $request->input('slug');
            $item->unit_price = $request->input('unit_price');
            $item->save();

            return redirect('/item/view')->with('success','item added');

        }else{            
            return redirect('/admin')->with('flash_msg_err','You must login to access');
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
        if(Session::has('adminsession')){
            
            $item = Item::find($id);

            return view('Admin.Item.item_update')->with('item',$item);                


        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
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
        if(Session::has('adminsession')){

            $this->validate($request,[
                'item_code' => 'required',
                'item_name' => 'required',
                'slug'  => 'required',
                'unit_price'  => 'required'
            ]);

            $item = Item::find($id);
            $item->item_code = $request->input(['item_code']);
            $item->item_name = $request->input(['item_name']);
            $item->slug = $request->input(['slug']);
            $item->unit_price = $request->input(['unit_price']);
            $item->save();

            return redirect('/item/view')->with('success','item succesfully updated');

        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
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
