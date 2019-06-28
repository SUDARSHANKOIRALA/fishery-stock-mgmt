@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                
					<div class="card-header">
						<h1 class="page-header" align="center">Fish Farm</h1>
					</div>
				

				<div class="row">
					<div class="form-group col-md-4">
                                    <label>Customer Name</label>
                                    <input class="form-control" name = 'customer_name' value="{{$single_bills[0]->customer->customer_name}}">
                                </div>          

                                <div class="form-group col-md-4">
                                    <label>Bill Number</label>
                                    <input class="form-control" name = 'bill_no' value="{{$single_bills[0]->bill_no}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Address</label>
                                    <input class="form-control" name = 'address'
                                    value="{{$single_bills[0]->customer->address}}">
                                </div>          

			</div>

				<div class="row">
				<div class="col-md-12">
				<table class="table table-bordered">
 					 <thead>
  						  <tr>
      						<th scope="col">SN</th>
      						<th scope="col">Item</th>
    					    <th scope="col">Unit Price</th>
      						<th scope="col">Quantity</th>
      						<th scope="col">Discount</th>
      						<th scope="col">Amount</th>
    					 </tr>
  					</thead>
  					 <?php $i = 1 ?>  {{-- for serial number of items --}}
  						@foreach($single_bills as $single)
  						<tr>
  							<td>{{ $i++ }}</td>
  							<td>{{ $single->item->item_name }}</td>
  							<td>{{ $single->unit_price }}</td>
  							<td>{{ $single->quantity }}</td>
  							<td>{{ $single->discount }}</td>
  							<td> {{ $single->amount }}</td>
  						</tr>
  						@endforeach
  				</table>
  			</div>
     		</div>

        </div>
    </div>
</div>
 
    
@endsection