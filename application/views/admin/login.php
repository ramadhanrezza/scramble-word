<?php include_once APPPATH . 'views/include/header.php'; ?>
<body>

    <div class="container">

      	<form class="form-signin" method="post" action="<?php echo base_url('admin/login') ?>">
	        <h3 class="form-signin-heading">Please sign in</h3>
	        <span class="error-msg text-danger"><?php echo $error ? '<i>username / password salah</i>' : ''?></span>
	        <label for="inputUsername" class="sr-only">Email address</label>
	        <input type="text" name="username" class="form-control" placeholder="username" required autofocus>
	        <label for="inputPassword" class="sr-only">Password</label>
	        <input type="password" name="password" class="form-control" placeholder="password" required>
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      	</form>

    </div> <!-- /container -->
</body>
</html>