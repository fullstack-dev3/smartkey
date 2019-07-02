<?php

require_once('src\Airtable');

$key   = "keyUClRNN9po9WMti";
$base  = "appXfXlSlxIovOjTW";
$table = "Table 1";

$airtable = new Airtable($key, $base);

/*$records = $airtable->findRecords($table);

var_dump($records);*/
/*$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.airtable.com/v0/appXfXlSlxIovOjTW/Table%201');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Authorization: Bearer keyUClRNN9po9WMti';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

var_dump($result);

if (isset($_POST['username']) && isset($_POST['email'])) {
	$name = $_POST['username'];
	$email = $_POST['email'];
	$number = rand(1000, 9999);

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.airtable.com/v0/appXfXlSlxIovOjTW/Table%201');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 
		'{"fields": {"Name": "' . $name . '", "Email": "' . $email . '", "Giveaway Number": "' . $number . '"}}');
	curl_setopt($ch, CURLOPT_POST, 1);

	$headers = array();
	$headers[] = 'Authorization: Bearer keyUClRNN9po9WMti';
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
	    echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
}*/

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
