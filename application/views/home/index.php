<?php include_once APPPATH . 'views/include/header.php'; ?>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h5>Silahkan pilih kategori untuk memulai</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left">Select Category</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="category">
                                <option value="0">All</option>
                                <?php foreach ($list_category as $row) : ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo ucfirst($row['name']) ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <button class="btn btn-primary">Start &raquo;</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>