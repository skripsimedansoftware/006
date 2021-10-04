<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Administrator<small>Project</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="col-lg-12">
		<?php if ($this->session->has_userdata('project')): ?>
			<?php if ($this->session->userdata('project')['status'] == 'success'): ?>
				<div class="alert alert-success"><?php echo $this->session->userdata('project')['message']; ?></div>
				<?php else: ?>
				<div class="alert alert-danger"><?php echo $this->session->userdata('project')['message']; ?></div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Project</h3>
			</div>
			<div class="box-body">
				<table class="table table-hover table-striped">
					<thead>
						<th>No</th>
						<th>Name</th>
						<th>Category</th>
						<th>Area</th>
						<th>Budget</th>
						<th>Deadline</th>
						<th>Status</th>
					</thead>
					<tbody>
						<?php foreach ($this->project->view()->result() as $project): ?>
						<tr>
							<td>XXXXXXX</td>
							<td>XXXXXXX</td>
							<td>XXXXXXX</td>
							<td>XXXXXXX</td>
							<td>XXXXXXX</td>
							<td>XXXXXXX</td>
							<td>XXXXXXX</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="box-footer">
				<div class="row">
					<div class="col-lg-3">
						<a href="<?php echo base_url($this->router->fetch_class().'/project/add') ?>" class="btn btn-block btn-flat btn-success"><i class="fa fa-plus"></i> Add Project</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Kategori Project</h3>
			</div>
			<div class="box-body">
				<table class="table table-hover table-striped table-condensed table-bordered">
					<thead>
						<th>Name</th>
						<th>Option</th>
					</thead>
					<tbody>
						<?php foreach ($this->project_category->view()->result() as $category): ?>
						<tr>
							<td><?php echo $category->name ?></td>
							<td>
								<button class="btn btn-xs btn-default modal-category-edit" data-id="<?php echo $category->id ?>" data-toggle="modal" data-target="#modal-category" ><i class="fa fa-edit"></i></button>
								&nbsp;&nbsp;
								<button class="btn btn-xs btn-danger modal-category-delete" data-id="<?php echo $category->id ?>"><i class="fa fa-trash-o"></i></button>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#modal-category" id="modal-category-add"><i class="fa fa-plus"></i> Add Category</button>
			</div>
		</div>
	</div>
</section>