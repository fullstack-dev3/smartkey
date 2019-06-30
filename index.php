<?php

if (isset($_POST['username']) && isset($_POST['email'])) {
	var_dump($_POST);exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">	
	<h3 class="text-center">Enter Here</h3>

	<form action="" method="POST">
		<div class="form-group">
			<label for="username">Name</label>
			<input type="text" class="form-control" name="username">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" name="email">
		</div>

		<input type="submit" class="btn btn-primary" value="Submit">
	</form>
</div>

</body>
</html>
