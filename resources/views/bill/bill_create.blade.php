@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mandel Bill</div>

                <form role="form" method="post" action ="{{route('bill.store')}}">

                            {{ csrf_field() }}

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Customer Name</label>
                                    <input class="form-control" name = 'customer_name'>
                                </div>          

                                <div class="form-group col-md-6">

                                    <label>Bill Number</label>
                                    <input class="form-control" name = 'bill_no'>
                                </div>
                               
                            </div>  
                            
                           

                             <div class="row">   

                                <div class="form-group col-md-6">                              
                                    <label>Contact_ Number</label>
                                    <input class="form-control" name = 'contact_no'>
                                </div>

                                 <div class="form-group col-md-6">                              
                                    <label>Address</label>
                                    <input class="form-control" name = 'address'>
                                </div>
                             </div>

                             <div class="row">
                                <div class="form-group col-md-6">
                              <label>Choose Items</label>
                                <select class="form-control" name = 'item_id'>
                                    @foreach($items as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->item_name }}
                                        </option>
                                    @endforeach                                     
                                </select>                           
                              </div>
                              </div>

                            <div class="row">  

                                 <div class="form-group col-md-6">                              
                                    <label>Quantity</label>
                                    <input class="form-control" name = 'quantity'>
                                </div>

                                           
                            </div>


                                <br/>
                                 <button type="submit" style="width:20%;" class="btn btn-primary btn-lg">OK</button>  
                                  <!-- <button id="cancel" style="width:20%;" class="btn btn-danger btn-lg" value="1">Cancel</button>           -->
                            </div>
                        
                        </form>
               

            </div>
        </div>
    </div>
</div>
	
@endsection