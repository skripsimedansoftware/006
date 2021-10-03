<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Administrator<small>Dashboard</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>2</h3>
					<p>Size</p>
				</div>
				<div class="icon">
					<i class="fa fa-cut"></i>
				</div>
				<a href="<?php echo base_url('/size') ?>" class="small-box-footer">Read More <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>2</h3>
					<p>Material</p>
				</div>
				<div class="icon">
					<i class="fa fa-cut"></i>
				</div>
				<a href="<?php echo base_url('/material') ?>" class="small-box-footer">Read More <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>2</h3>
					<p>Customer</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="<?php echo base_url('/customer') ?>" class="small-box-footer">Read More <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>2</h3>
					<p>Order</p>
				</div>
				<div class="icon">
					<i class="fa fa-shopping-cart"></i>
				</div>
				<a href="<?php echo base_url('/order') ?>" class="small-box-footer">Read More <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Latest Orders</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Item</th>
									<th>Status</th>
									<th>Popularity</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="pages/examples/invoice.html">OR9842</a></td>
									<td>Call of Duty IV</td>
									<td><span class="label label-success">Shipped</span></td>
									<td>
										<div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer clearfix">
					<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
					<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Recently Added Products</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<ul class="products-list product-list-in-box">
						<li class="item">
							<div class="product-img">
								<img src="dist/img/default-50x50.gif" alt="Product Image">
							</div>
							<div class="product-info">
								<a href="javascript:void(0)" class="product-title">Samsung TV<span class="label label-warning pull-right">$1800</span></a>
								<span class="product-description">Samsung 32" 1080p 60Hz LED Smart HDTV.</span>
							</div>
						</li>
					</ul>
				</div>
				<div class="box-footer text-center">
					<a href="javascript:void(0)" class="uppercase">View All Products</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<button></button>
	</div>
</section>