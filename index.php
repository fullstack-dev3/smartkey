<?php

require 'vendor/autoload.php';

use \TANIOS\Airtable\Airtable;

$airtable = new Airtable(array(
    'api_key' => 'keyUClRNN9po9WMti',
    'base'    => 'appXfXlSlxIovOjTW'
));

$username = '';
$email = '';
$number = 0;

$success = false;

$validName = true;
$validEmail = true;

$existName = false;
$existEmail = false;

if (isset($_POST['username']) && isset($_POST['email'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];

	if ($username == '')
		$validName = false;

	if ($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL))
		$validEmail = false;

	if ($validName && $validEmail) {
		$checkName = $airtable->quickCheck('user', 'Name', $username);

		if ($checkName->count > 0)
			$existName = true;

		$checkEmail = $airtable->quickCheck('user', 'Email', $email);

		if ($checkEmail->count > 0)
			$existEmail = true;

		$existNumber = true;

		while ($existNumber) {
			$number = rand(10000, 99000);

			$checkNumber = $airtable->quickCheck('user', 'Giveaway Number', $number);

			if ($checkNumber->count > 0)
				$existNumber = true;
			else
				$existNumber = false;
		}

		if (!$existName && !$existEmail) {
			$data = array(
				'Name' => $username,
				'Email' => $email,
				'Giveaway Number' => $number
			);

			$airtable->saveContent('user', $data);

			$success = true;
		}
	}
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
<style type="text/css">
	.number {
		background-color: #ddddff;
		margin: 20px auto;
		width: 500px;
	}
	.number span {
		font-weight: bold;
		font-size: 24px;
	}
	.number span:last-child {
		font-size: 36px;
	}
</style>
<body>

<div class="container">
<?php if ($success) { ?>
	<h1 class="text-center">Thanks For Signing Up</h1>
	<div class="number">
		<div class="text-center">
			<span class="align-middle">Here is your number : </span>
			<span class="align-middle"><?php echo $number ?></span>
		</div>
	</div>
<?php } else { ?>
	<h3 class="text-center">Enter Here</h3>

	<form action="" method="POST">
		<div class="form-group">
			<label for="username">Name</label>
		<?php if ($validName && !$existName) { ?>
			<input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
		<?php } else { ?>
			<input type="text" class="form-control is-invalid" name="username">
			<div class="invalid-feedback">
			<?php
				if (!$validName) echo 'Please enter your name here.';
				if ($existName) echo 'Your name is already registered.';
			?>
	        </div>
		<?php } ?>
		</div>

		<div class="form-group">
			<label for="email">Email</label>
		<?php if ($validEmail && !$existEmail) { ?>
			<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
		<?php } else { ?>
			<input type="text" class="form-control is-invalid" name="email">
			<div class="invalid-feedback">
			<?php
				if (!$validEmail) echo 'Please enter your valid Email here.';
				if ($existEmail) echo 'Your Email is already registered.';
			?>
	        </div>
		<?php } ?>
		</div>

		<input type="submit" class="btn btn-primary" value="Submit">
	</form>
<?php } ?>
</div>

</body>
</html>
