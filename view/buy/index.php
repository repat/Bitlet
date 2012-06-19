<?

	$finfo = GetFileInfo($fid);

	$name = basename($finfo['name']);
	$description = $finfo['description'];
	$price = $finfo['price'];
	$price = sprintf('%.2f', $price);
	$downloads = $finfo['downloads'];
	$thumbnail = $finfo['thumb_url'].THUMB_END;
	$AuthInfo = GetUserInfo($finfo['uid']); 
	$AuthName = $AuthInfo['name'];
	$AuthBio = $AuthInfo['bio'];
	$AuthPofilePic = $AuthInfo['profile_img'];	

	$uinfo = GetUserInfo($UID);
	$user = $uinfo['email'];

	IncrementViews($fid);

	if($AuthProfilePic === null or $AuthProfilePic ===''){
		$AuthProfilePic = '/img/bitlet-silhouette.png'; 	
	}else{
		//they have a photo
	}
?>

<div class="container" id="buyPageOverall">
	<div class="well bitletDropShadow bitletBuyMain span7">
		<div id="thumbnail" >
			<img src="/<? echo $thumbnail; ?>" alt="<? echo $name ?>" />
		</div>
		<div id="itemDetails" class="theDetails">
			<? echo $description; ?>
		</div>
	</div>
	<div class="ribbon-wrapper">
		<div class="ribbon-front">
		<h1><? echo $name; ?></h1>	
		</div>
		<div class="ribbon-edge-topleft"></div>
		<div class="ribbon-edge-topright"></div>
		<div class="ribbon-edge-bottomleft"></div>
		<div class="ribbon-edge-bottomright"></div>
		<div class="ribbon-back-left"></div>
		<div class="ribbon-back-right"></div>
	</div>	
	<div id="rightSide" class="span4">
		<div id="authorInfo" class="bitletDropShadow well">
			<div id="authorPic">
				<img src="<? echo $AuthProfilePic ?>" alt="<? echo $AuthName ?>" />
			</div>
			<div ></div>	
			<h4 class="bioInline">Author: </h4><p class="bioInline"><? echo $AuthName ?></p> 
			<div ></div>	
			<h4 class="bioInline">Bio: </h4><p class="bioInline" ><? echo $AuthBio?></p>
		</div>
		<div id="priceWell" class="bitletDropShadow well">
			<div id="priceSection">
				<h1>$<? echo $price; ?></h1>
			</div>	
			<div id="getFileBox">
					<button id="getFile" class="btn btn-large btn-success">Get it</button>
			</div><!-- end of the getFileBox div --> 
			<div id="payment" class="hide">
				<form action="" method="POST" id="payment-form">
					<input type="text" class="buyPageInput inputHeightLarge" id="BuyerEmail" placeholder="Email Address">
					<h3 id="paymentDetails">Payment Details:</h3>
					<p id="NumLabel">Card Number</p>
					<input type="text" autocomplete="off" class="buyPageInput inputHeightLarge card-number" id="CreditCardNumber" placeholder="4242 4242 4242 4242">	
					<div id="cvCode">
						<p id="CvLabel">CV Code</p>	
						<input type="text" autocomplete="off" class="inputHeightLarge card-cvc" id="cvCodeInput" placeholder="123">
					</div>		
					<div id="expireDate">
						<p id="ExpLabel">Expiry Date</p>	
						<input type="text" class="inputHeightLarge card-expiry-month" id="month" placeholder="MM">	
						<input type="text" class="inputHeightLarge card-expiry-year" id="year" placeholder="YY">	
					</div>
					<button class="btn btn-success btn-large" id="purchaseButton" href="#">Purchase</button>
				</form>

				<form action="/ajax/download" method="POST" id="go-download">
					<div id="post-pay" style="display:none">
						<p>Download should start automatically, Or:</p>
						<hr>
					</div>
					<? // Hidden input to POST id on submission ?>
					<input type="text" id="dfid" name="fid" value="<? echo $fid ?>" style="display:none">
					<button type="submit" id="ddl" class="btn btn-large" name="download" style="display:none">Manual Download</button>
				</form>

			</div><!-- end of the payment div -->		
		</div><!-- end of the priceWell div -->
	</div>
</div>

<!-- Official Stripe JS file -->
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
