	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		
		<ul class="nav menu">			

			<li class="active">
				<a href="{{ url('/admin/dashboard') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a>
			</li>


			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span>Setup
				</a>
				<ul class="children collapse" id="sub-item-1">

					<li>
						<a href="{{ url('/admin/add_user') }}"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Add Users</a>
					</li>

					<li>
						<a href="{{ url('/item/create') }}"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Add Items</a>
					</li>
										
				</ul>
			</li>


			<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span>Lists
				</a>
				<ul class="children collapse" id="sub-item-2">

					<li>
						<a href="{{ url('/admin/view') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Users</a>
					</li>

					<li>
						<a href="{{ url('/admin/view2') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Admins</a>
					</li>

					<li>
						<a href="{{ url('/item/view') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Items</a>
					</li>
		
				</ul>
			</li>
			

			<!-- {{-- unused lists below... --}}
			<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
			<li><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
			<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
			<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>	 -->				
		</ul>		
	</div><!--/.sidebar-->