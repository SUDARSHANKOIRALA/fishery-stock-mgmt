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
				<h1 class="page-header">Items List</h1>
			</div>
		</div><!--/.row-->				
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Items Table</div>
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						        <th data-field="id" >SN</th>
						        <th data-field="item_code" >Item Code</th>
						        <th data-field="item_name" >Item Name</th>
						        <th data-field="unit_price" >Unit Price</th>
						        <th data-field="status">Status</th>
						        <th data-field="created_at" >Created at</th>
						        <th data-field="updated_at" >Updated at</th>						        
                                						         
                                <th data-field="action"  colspan="2">Actions</th>
						    </tr>
						    </thead>
						    <?php $i = 1 ?>  {{-- for serial number of items --}}
						    @foreach($items as $item)
							    <tr>
							    	<td >{{ $i++ }}</td>
							    	<td >{{ $item->item_code }}</td>
							    	<td >{{ $item->item_name }}</td>
					    			<td >{{ $item->unit_price }}</td>
							    	<td >{{ $item->created_at }}</td>
                                    <td >{{ $item->updated_at }}</td>

                                    @if($item->status == 0)
							    		  <td > <a href="/item/toogle/{{ $item->id }}">  
							    		  	<button type="button" class = 'btn btn-danger'>inactive</button> 
							    		  </a>
							    		  </td>							    		  
							    	@else 
							    	<td ><a href="/item/toogle/{{ $item->id }}"> <button class = 'btn btn-success'>active</button> </td></a>
							    	  @endif      
                                    
                                    <td >
                                        {{-- <a href="/Item/item_update/{{ $item->id }}"> --}}
                                        <a href="/item/{{ $item->id }}/edit">
								    		<button type="button" class = 'btn btn-primary'>Update
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
