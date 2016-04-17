<?php include_once APPPATH . 'views/include/header.php'; ?>
<body>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				Input kata
			</div>
			<div class="panel-body">
				<form class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-1 hidden-xs text-left">Category</label>
						<div class="col-sm-2">
							<select class="form-control" name="category">
								<option>Pilih Category</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-1 hidden-xs text-left">Kata</label>
						<div class="col-sm-2">
							<input type="text" autocomplete="off" name="word" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-1 col-sm-2">
							<button class="btn btn-primary">Save</button>
						</div>
					</div>
				</form>
				<div>&nbsp;</div>
				<div class="col-sm-3">
					<select class="form-control">
						<option>Filter</option>
					</select>
				</div>
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
							<tr>
								<td>1</td>
								<td>Animals</td>
								<td>Dog</td>
								<td>
									<button class="btn btn-warning">Edit</button>
									<button class="btn btn-danger">Delete</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>