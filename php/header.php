<?php

	require 'fb/facebook.php';

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
?>

<?php 
	//Turns off error warnings in PHP
	error_reporting(E_ERROR | E_PARSE); 
?>
<html xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
	<LINK href="css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/point.js"></script>
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript" src="js/model.js"></script>
	<script type="text/javascript" src="js/controller.js"></script>
	<script type="text/javascript" src="js/frame.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/bing.js"></script>
	<script type="text/javascript" src="js/post.js"></script>
	<script type="text/javascript">
	function document_load() {	// Setup editor
		var canvas = new Model(document.getElementById("Canvas"), document.getElementById("Post"), 
							document.getElementById("Image"), document.getElementById("nav-bar"));
	
	}
	</script>
	
	
</head>
<body onload="document_load();" oncontextmenu="return false;">

	<header id="nav-bar">
		<div id="Logo"></div>
		<?php if ($user) { ?>
	    	
	    <?php } else { ?>
	      <fb:login-button></fb:login-button>
	    <?php } ?>
	    <div id="fb-root"></div>
	    <script>
	      window.fbAsyncInit = function() {
	        FB.init({
	          appId: '<?php echo $facebook->getAppID() ?>',
	          cookie: true,
	          xfbml: true,
	          oauth: true
	        });
	
	        FB.Event.subscribe('auth.login', function(response) {
			  
	          window.location.reload();
	        });
	        FB.Event.subscribe('auth.logout', function(response) {
	          window.location.reload();
	        });
	      };
	      (function() {
	        var e = document.createElement('script'); e.async = true;
	        e.src = document.location.protocol +
	          '//connect.facebook.net/en_US/all.js';
	        document.getElementById('fb-root').appendChild(e);
	      }());
	    </script>
	</header>
