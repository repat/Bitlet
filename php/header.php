<?
	require '/fb/facebook.php';

	$facebook = new Facebook(array(
  		'appId'  => '204353349642023',
  		'secret' => '5f1f4d30d20fd1eeaedd89f6dbe3bb43',
	));

	// See if there is a user from a cookie
	$user = $facebook->getUser();

	if ($user) {
  		try {
    		// Proceed knowing you have a logged in user who's authenticated.
    		$user_profile = $facebook->api('/me');
  		} catch (FacebookApiException $e) {
    		echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
    		$user = null;
  		}
	}

	//Turns off error warnings in PHP
	error_reporting(E_ERROR | E_PARSE); 
?>

<head>
	<link href="/css/style.css" rel="stylesheet" type="text/css">
	<link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

