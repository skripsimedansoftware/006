<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Administrator<small>Criteria</small></h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<form method="post" action="<?php echo base_url($this->router->fetch_class().'/criteria/add') ?>">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Add Criteria</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Criteria Name" value="<?php echo set_value('name') ?>">
							<?php echo form_error('name', '<span class="help-block error">', '</span>'); ?>
						</div>
						<div class="form-group">
							<label>Weight</label>
							<input type="text" class="form-control" name="weight" placeholder="Criteria Weight" value="<?php echo set_value('weight') ?>">
							<?php echo form_error('weight', '<span class="help-block error">', '</span>'); ?>
						</div>
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-lg-3">
								<a href="<?php echo base_url($this->router->fetch_class().'/criteria') ?>" class="btn btn-block btn-warning"><i class="fa fa-arrow-circle-left"></i> Back</a>
							</div>
							<div class="col-lg-3 pull-right">
								<button type="submit" class="btn btn-block btn-flat btn-success"><i class="fa fa-save"></i> Save</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>