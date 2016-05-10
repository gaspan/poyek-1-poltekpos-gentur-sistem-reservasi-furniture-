<?php
	session_start();
	if(isset($_SESSION['username'])){
		header('location:halaman_utama_customer.php?page=home');
	}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Login</title>
	
	<link rel="stylesheet" type="text/css" href="assets1/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets1/css/styles.css" />
	<link rel="shortcut icon" href="gambarbrg/profile.png">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<section id="logo">
		<a href="#"><img src="assets1/images/logo.png" alt="" /></a>
	</section>
	
	<section class="container">
		<section class="row">


			<form method="post" action="dbcrud.php" role="login">
<?php
if (isset($_GET['salah'])) {
	

?>

<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
         Username atau password salah !!!
</div>

<?php	
}
?>

				<div>
					<label>Username</label>
					<input type="text" name="username" required class="form-control" />
				</div>
				
				<div>
					<label>Password</label>
					<input type="password" name="password" required class="form-control" />
				</div>
			
				<section>
					<button type="submit" name="login" class="btn btn-block">Login</button>
					<a type="button" class="btn btn-warning form-control" href="..">Kembali</a>

					<p><a href="registrasi/registrasi.php">Create account</a></p>
				</section>
			</form>
		</section>
	</section>
	 
	<script src="assets/jquery.min.js"></script>
	<script src="assets1/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
