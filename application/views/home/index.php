<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scramble Word</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.3.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <style>
    body {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .navbar {
        margin-bottom: 20px;
    }

    .text-left {
        text-align: left !important;
    }
    </style>
</head>
<body>
    <div class="container">
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url() ?>">Project name</a>
                </div>
            </div><!--/.container-fluid -->
        </nav>

        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <form class="form-horizontal" method="post" action="<?php echo base_url('start') ?>">
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
        </div>
    </div>
</body>
</html>