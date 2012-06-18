<?

$finfo = GetFileInfo($fid);

$name = basename($finfo['name']);
$description = $finfo['description'];
$price = $finfo['price'];
$price = sprintf('%.2f', $price);

$downloads = $finfo['downloads'];
$thumbnail = $finfo['thumb_url'].THUMB_END;

$uinfo = GetUserInfo($UID);
$user = $uinfo['email'];

IncrementViews($fid);

?>

<div class="container" id="buyPageOverall">
	<div class="well bitletDropShadow bitletBuyMain span7">
		<div id="thumbnail" style="background: url('/<? echo $thumbnail; ?>');"></div>

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
		<div id="priceTag">
			<div id="circle">
				<div id="circle-tiny"></div>
			</div>	
			<h1>$<? echo $price; ?></h1>
		</div>
		<div id="priceTagConnector">
		</div>
		<div id="payment" class=" bitletDropShadow well">
			<form action="" method="POST" id="payment-form">
				<input type="text" class="buyPageInput inputHeightLarge" id="BuyerEmail" placeholder="Email Address">	
				<h3 id="paymentDetails">Payment Details:</h3>
				<p>Card Number</p>
				<input type="text" autocomplete="off" class="buyPageInput inputHeightLarge card-number" id="CreditCardNumber" placeholder="4242 4242 4242 4242">	
				<div id="cvCode">
					<p>CV Code</p>	
					<input type="text" autocomplete="off" class="inputHeightLarge card-cvc" id="cvCodeInput" placeholder="123">
				</div>		
				<div id="expireDate">
					<p>Expiry Date</p>	
					<input type="text" class="inputHeightLarge card-expiry-month" id="month" placeholder="MM">	
					<input type="text" class="inputHeightLarge card-expiry-year" id="year" placeholder="YY">	
				</div>
				<button class="btn btn-success btn-large" style="width:100%;" href="#">Purchase</button>
			</form>

			<form action="/ajax/download" method="POST" id="go-download">
				<input type="text" id="dfid" name="fid" value="<? echo $fid ?>" style="display:none">
				<button type="submit" id="ddl" class="btn btn-large" name="download" style="display:none">Manual Download</button>
			</form>

			<p class="payment-errors hide"></p>
		</div>	
	</div>
</div>

<!-- Hidden input to POST id on submission -->
<div class="post-pay" style="display:none">
	<p>Download should start automatically, Or:</p>
	<hr>
</div>

<!-- Official Stripe JS file -->
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
