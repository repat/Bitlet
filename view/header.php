<?
	$path = $_SERVER['DOCUMENT_ROOT'];
	require $path.'/php/fb/facebook.php';

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
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->    
	<link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="/css/loading.css" rel="stylesheet" type="text/css">
	<link href="/css/style.css" rel="stylesheet" type="text/css">

	<!-- Font stuff -->
	<script type="text/javascript" src="http://use.typekit.com/hkc7cgw.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<!-- style and formatting -->
	<script type="text/javascript" src="/js/loading.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/bootstrap.js"></script>

	<!-- special stuff -->
	<script type="text/javascript" src="/js/hero-slider.js"></script>
	<script src="jquery.mailcheck.min.js"></script>
	
	<script>
	var domains = ['hotmail.com', 'gmail.com', 'aol.com'];
	$('#email').on('blur', function() {
		  $(this).mailcheck({
			    domains: domains,   
				suggested: function(element, suggestion) {
					$('.email_suggestion').html('Did you mean '+suggestion.address+'@'+'<strong>'+suggestion.domain+'</strong>?').show();
				 },
				 empty: function(element) {
					$('.email_suggestion').html('').hide();  
				 }
		  });
	});
	</script>

	<!-- Backend processing -->
	<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
	<script type="text/javascript" src="/js/stripe.js"></script>

</head>

