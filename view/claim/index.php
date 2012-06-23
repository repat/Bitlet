<div class="container well bitletDropShadow">
<?
// see if logged in
if($UID >= 0) {
	// grab user info
	$credits = GetUserCredits($UID);	
	// see if they got enough funds
	if($credits < 100) {
?>
		<h1>Not enough funds, minmum cashout is $100, sorry :(</h1>
		<br>
		<a href="/dashboard">Go Back</a>
<?
	} else {
?>
		<h1>Claim Funds</h1>
		<h3>Please enter your address to mail the check to</h3>
		<hr>
		<form action="/ajax/cashout" method="post" enctype="multipart/form-data">
			<input name="uid" style="display:none" value="<? echo $UID; ?>">	
			<p>Street:</p>
			<input class="input-medium" name="street">
			<p>City and State:</p>
			<input class="input-medium" name="city">
			<p>Zipcode:</p>
			<input class="input-medium" name="zip">
			<br>
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>
<?
	}
} else { 
?>
	<h1>Please Log In</h1>
<?
}
?>
</div>
