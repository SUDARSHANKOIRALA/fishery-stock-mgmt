@extends('Admin.adminLayout.admin_design')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Add Item</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Item</h1>
			</div>
		</div><!--/.row-->

	    @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
								
		<div class="row col-lg-12">
			<div class="col-lg-6">
				<div class="panel panel-default">
				<div class="panel-heading">Add Item</div>
					<div class="panel-body">
					<div class="col-md-12">
						
						  <form method="post" action ="{{route('item.store')}}">
							{{ csrf_field() }}

								<div class="form-group">
								<label>Item Code</label>
								<input class="form-control" name="item_code" placeholder="item code">
							</div>

							<div class="form-group">
								<label>Item name</label>
								<input class="form-control" name="item_name" placeholder="item name">
							</div>	

							<div class="form-group">
								<label>Slug</label>
								<input class="form-control" name="slug" placeholder="Slug">
							</div>		
								
									<div class="form-group">
								<label>Unit Price</label>
								<input class="form-control" name="unit_price" placeholder="item price per kg">
							</div>														

							<button type="submit" class="btn btn-primary">Submit</button>																
						</form>
					</div>	
					</div>
				</div>	
			</div>
		
		</div><!-- /.row -->

	</div><!--/.main-->
@endsection