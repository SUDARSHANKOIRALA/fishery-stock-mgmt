@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Mandel Bill</div>

              <form method="post" action ="{{route('bill.store')}}">

                            {{ csrf_field() }}

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Customer Name</label>
                                    <input class="form-control" name = 'customer_name' required>
                                </div>          

                                <div class="form-group col-md-6">

                                    <label>Bill Number</label>
                                    <input class="form-control" name = 'bill_no' required>
                                </div>
                               
                            </div>  
                            
                           

                             <div class="row">   

                                <div class="form-group col-md-6">                              
                                    <label>Contact_ Number</label>
                                    <input class="form-control" name = 'contact_no' required>
                                </div>

                                 <div class="form-group col-md-6">                              
                                    <label>Address</label>
                                    <input class="form-control" name = 'address' required>
                                </div>
                             </div>

                             <div class="row">
                               <div class="form-group col-md-12">
                                <table class="table table-borderd">
                                  <thead>
                                    <tr>
                                      <th>Item Name</th>
                                      <th>Unit Price</th>
                                      <th>Quantity</th>
                                      <th>Discount</th>
                                      <th>Amount</th>
                                      <th><a  class="btn btn-info addRow">+</a></th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <tr>
                                      <td>
                                        <select class="form-control item_name" name = "item_name[]">
                                          <option>All Items</option>
                                      @foreach($items as $item)
                                         <option value="{{ $item->id }}">
                                            {{ $item->item_name }}
                                             </option>
                                           @endforeach                   
                                        </select>             
                                      </td>
                                      <td><input type="text" name="unit_price[]" class="form-control unit_price" readonly=""></td>
                                       <td><input type="text" name="quantity[]" class="form-control quantity" required></td>
                                        <td><input type="text" value="0" name="discount[]" class="form-control discount"></td>
                                        <td><input type="text" name="amount[]" class="form-control amount"></td>
                                        <td><a class="btn btn-danger remove">-</a></td>
                                    </tr>
                                  </tbody>

                                  <tfoot>
                                    <td style="border:none"></td>
                                    <td style="border:none"></td>
                                    <td style="border:none"></td>
                                    <td style="border:none"><b>Sub Total</b></td>
                                    <td><input type="text" class=" form-control total" id="total" readonly name=""></b></td>
                                    <td></td>
                                  </tfoot>

                                </table>
                              </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">                    
                                  <label>Final Discount</label>
                                    <input class="form-control final_discount" name = 'final_discount' required>
                                </div>
                                <div class="form-group col-md-4">                      
                                  <label>Net Total</label>
                                    <input class="form-control" name = 'net_total' id="net_total" readonly="">
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