<?php include_once APPPATH . 'views/include/header.php'; ?>
<body>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				Input kata
			</div>
			<div class="panel-body">
				<span class="error-msg text-danger"><?php echo $error ? '<i>Form belum lengkap</i>' : ''?></span>
				<form class="form-horizontal" method="post">
					<input type="hidden" name="type" value="<?php echo $this->uri->segment('2') == 'edit' ? 'edit' : 'add' ?>" id="post_type">
					<div class="form-group <?php echo isset($err_category) ? $err_category['div'] : '' ?>">
						<label class="control-label col-sm-1 hidden-xs text-left">Category</label>
						<div class="col-sm-3">
							<select class="form-control " name="category">
								<option value="">Pilih Category</option>
								<?php foreach ($list_category as $row) : ?>
								<option <?php echo $this->uri->segment(2) == 'edit' ? ($row['id'] == $edit_data->category_id ? 'selected' : '') : '' ?> value="<?php echo $row['id'] ?>"><?php echo ucfirst($row['name']) ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group <?php echo isset($err_word) ? $err_word['div'] : '' ?>">
						<label class="control-label col-sm-1 hidden-xs text-left">Kata</label>
						<div class="col-sm-3">
							<span id="span-error" aria-hidden="true" class="<?php echo isset($err_word) ? $err_word['span'] : '' ?>" ></span>
							<input type="text" autocomplete="off" name="word" class="form-control" value="<?php echo $this->uri->segment('2') == 'edit' ? ucfirst($edit_data->word) : '' ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-1 col-sm-2">
							<button class="btn <?php echo $this->uri->segment(2) == 'edit' ? 'btn-warning' : 'btn-primary' ?>"><?php echo $this->uri->segment(2) == 'edit' ? 'Edit' : 'Save' ?></button>
							<?php if ($this->uri->segment(2) == 'edit') : ?>
							<button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url('admin') ?>'">Cancel</button>
							<?php endif; ?>
						</div>
					</div>
				</form>
				<!-- <div>&nbsp;</div> -->
				<!-- <div class="col-sm-3">
					<select class="form-control">
						<option>Filter</option>
					</select>
				</div> -->
				<div>&nbsp;</div>
				<div class="col-sm-12 table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="col-sm-1">No</th>
								<th>Category</th>
								<th>Kata</th>
								<th class="col-sm-2"></th>
							</tr>
						</thead>
						<tbody>
							<?php $x=0;foreach ($list_word as $row) : $x++; ?>
							<tr>
								<td><?php echo $x ?></td>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo $row['word'] ?></td>
								<td>
									<button class="btn btn-warning" onclick="location.href='<?php echo base_url('admin/edit?action=edit&id=') . $row['word_id'] ?>'" >Edit</button>
									<button class="btn btn-danger" onclick="location.href='<?php echo base_url('admin/delete?action=delete&id=') . $row['word_id'] ?>'">Delete</button>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>