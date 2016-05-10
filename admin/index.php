<!DOCTYPE html> 
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Login Admin</title>
	
	<link href="views/assets/css/css.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="views/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="views/assets/css/styles.css" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


	<section class="container">
			<section class="login-form">
				<div class="panel panel-default">
					<div class="panel-heading">ADMIN LOGIN</div>
					<div class="panel-body">
					    <form method="post" action="controller/dblogin.php" role="login">
						  <div class="input-group">
						   <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
        					<input type="username" name="username" class="form-control input-lg" placeholder="USERNAME" required>
        				  </div>
        				  <div class="input-group">
        				   <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
        					<input type="password" name="password" class="form-control input-lg" placeholder="PASSWORD" required>
						  </div>
							<button type="submit" name="login" class="btn btn-lg btn-info btn-block">LOGIN</button>					
							
						</form>
<?php
if (isset($_GET['salah'])) {
?>
<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
         Username atau Password salah!!
 </div>


<?php	
}
?>
					</div>
				</div>
				
				<div class="external-links">
					
				</div>
		
			</section>


	</section>
	
	<script src="views/assets/jquery.min.js"></script>
	<script src="views/assets/js/bootstrap.min.js"></script>
</body>
</html>