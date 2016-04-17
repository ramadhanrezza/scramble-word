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
        <!-- Static navbar -->
        <?php /*<nav class="navbar navbar-default panel panel-primary">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url() ?>">Scramble Word</a>
                </div>
            </div><!--/.container-fluid -->
        </nav>

        <!-- Main component for a primary marketing message or call to action -->
        <div class="container">
            <h4>Silahkan pilih kategori untuk memulai</h4><br>
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
                        <button class="btn btn-default">Start &raquo;</button>
                    </div>
                </div>
            </form>
        </div> */ ?>
    </div>
</body>
</html>