@extends('Admin.adminLayout.admin_design')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->

		@if(Session::has('flash_msg_err'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong>{{ Session('flash_msg_err') }}</strong>								
			</div>					
		@endif

		 @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sales List</h1>
			</div>
		</div><!--/.row-->				
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Sales Table</div>
					<div class="panel-body">
						<table class="table table-bordered">
 					 <thead>
  						  <tr>
      						<th scope="col">SN</th>
      						<th scope="col">Customer Name</th>
      						<th scope="col">Bill No</th>
      						<th scope="col">Item</th>
    					    <th scope="col">Unit Price</th>
      						<th scope="col">Quantity</th>
      						<th scope="col">Discount</th>
      						<th scope="col">Amount</th>
      						<th scope="col">Actions</th>
    					 </tr>
  					</thead>
  					 <?php $i = 1 ?>  {{-- for serial number of items --}}
						    @foreach($bills as $bill)
							    <tr>
							    	<td >{{ $i++ }}</td>
							    	<td >{{ $bill->customer->customer_name }}</td>
							    	<td >{{ $bill->bill_no }}</td>
							    	<td >{{ $bill->item->item_name }}</td>
					    			<td >{{ $bill->unit_price }}</td>
							    	<td >{{ $bill->quantity }}</td>
                                    <td >{{ $bill->discount }}</td>
                                    <td >{{ $bill->amount }}</td>
                                          <td >                                        
                                        <a href="/details/{{ $bill->bill_no }}/show">
								    		<button type="button" class = 'btn btn-primary'>View
								    		</button>								    		
							    		</a>
							    	</td>
                                </tr>
                            @endforeach
     			</table>
					</div>
				</div>
			</div>			
		</div><!--/.row-->			
		
	</div><!--/.main-->

@endsection