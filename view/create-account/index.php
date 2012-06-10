<div class="container well bitletDropShadow">
	<h1>Join Bitlet Today.</h1>
	<hr>
	<div class="" id="account">
		<div class="inputAlign">
			<h2 class="accountHead"> Full Name: </h2> 
			<input class="input-xlarge focused" id="name" type="text">
		</div>
		<div class="sideTip" id="nameTip">
			<p class="isaok hide">Name looks great.</p>
			<p class="tip">Enter your first and last name.</p>
		</div>
		<div style="clear:both;"></div>	
		<div class="inputAlign">
			<h2 class="accountHead"> Email: </h2> 
			<input class="input-xlarge focused" id="email" type="text">
		</div>
		<div class="sideTip" id="emailTip">
                      <p class="tip">What's your email address?</p>
                      <p class="isaok hide"><i class="icon-ok"></i> Looks good, we will email you a confirmation.</p>
                      <p class="invalid hide" role="alert"><i class="icon-remove"></i> Doesn't look like a valid email.</p>
                      <p class="taken hide" role="alert">This email is already registered. Want to <a onclick="showLogin();" href="#">Login</a> or <a href="/reset-details">recover your password</a>?</p>
        </div>
		<div style="clear:both;"></div>	
	
		<div class="inputAlign">
			<h2 class="accountHead"> Choose a password: </h2>
			<input class="input-xlarge focused" id="password1" type="password" value="">
		</div>
		<div class="sideTip" id="passTip1">
			<p class="tip">6 Characters or more to have a safe password.</p>
			<p class="almost hide">You're almost there!</p>
			<p class="isaok hide"><i class="icon-ok"></i> Nice! Now confirm below.</p>	
			<p class="crazy hide">Common that's absurdly long, computers can't even remember that.</p>	
		</div>
		<div style="clear:both;"></div>	

		<div class="inputAlign">
			<h2 class="accountHead"> Confirm password: </h2>
			<input class="input-xlarge focused" id="password2" type="password" value="">
		</div>
		<div class="sideTip" id="passTip2">
			<p class="tip hide">Confirm the password and you're off to the races.</p>
			<p class="invalid hide">Your Passwords are not the same.</p>
			<p class="isaok hide"><i class="icon-ok"></i> Passwords Match.</p>
		</div>
		<div style="clear:both;"></div>	

		<button id="createAccountSubmit" class="btn btn-large btn-primary">Create Account</button>
	</div>
</div>
