<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Administrator<small>Criteria</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Criteria</h3>
				</div>
				<div class="box-body">
					<table class="table table-hover table-striped">
						<thead>
							<th>No</th>
							<th>Name</th>
							<th>Weight</th>
							<th>Option</th>
						</thead>
						<tbody>
							<?php foreach ($this->criteria->view()->result() as $key => $criteria): ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $criteria->name; ?></td>
								<td><?php echo $criteria->weight; ?></td>
								<td>
									<a class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>
									<button class="btn btn-xs btn-danger" onclick="delete_criteria(<?php echo $criteria->id; ?>)"><i class="fa fa-trash-o"></i></button>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-lg-3">
							<a href="<?php echo base_url($this->router->fetch_class().'/criteria/add') ?>" class="btn btn-block btn-flat btn-success"><i class="fa fa-plus"></i> Add</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>