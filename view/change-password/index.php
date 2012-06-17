<div class=" container well profile bitletDropShadow roundedCorners" id="leftCol"> 
	<div class="settingsLeftContent">	
		<div class="span8"> 
			<h2>Change Password</h2>
			<p >Old Password:</p>
			<input class="input focused floatLeftChnPass" id="oldPassword" type="password" value="">
			<div class="sideTip" id="passTipOld">
				<p class="isaok hide"><i class="icon-ok"></i> Password matches our records</p>	
				<p class="invalid hide"><i class="icon-remove"></i> Does not match our records</p>	
			</div>
			<div style="clear:both;"></div>	


			<p class="">New Password:</p>
			<input class="input focused floatLeftChnPass" id="newPass1" type="password" value=""></p>
		
			<div class="sideTip" id="passTip1">
				<p class="tip">6 Characters or more to have a safe password.</p>
				<p class="almost hide">You're almost there!</p>
				<p class="isaok hide"><i class="icon-ok"></i> Nice! Now confirm below.</p>	
				<p class="crazy hide">Common that's absurdly long, computers can't even remember that.</p>	
			</div>
			<div style="clear:both;"></div>	

			<p class="">Confirm Password:</p>
			<input class="input focused floatLeftChnPass" id="newPass2" type="password" value=""></p>
			
			<div class="sideTip" id="passTip2">
				<p class="tip hide">Confirm the password and you're off to the races.</p>
				<p class="invalid hide">Your Passwords are not the same.</p>
				<p class="isaok hide"><i class="icon-ok"></i> Passwords Match.</p>
			</div>
			<div style="clear:both;"></div>	
			<button class="btn btn-primary btn-large" id="savePassword">Save</button>
		</div>	
	</div>
	<div class="settingsRightMenu">
		<ul class="nav nav-pills nav-stacked" style="color:#FF9340">
			<li ><a href="/settings"><h3>Profile</h3></a></li>
			<li class="active"><a href="/change-password"><h3>Change Password</h3></a></li>
			<li ><a href="/payment-info"><h3>Payment Information</h3></a></li>
		</ul>
	</div>
</div>
