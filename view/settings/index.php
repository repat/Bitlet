<div class=" container well profile bitletDropShadow roundedCorners" id="leftCol"> 
	<div class="settingsLeftContent">	
		<h2 class="prof" >Profile</h2>
		<div style="width:156px;float:left;">
			<img id="profilePic" src="/img/team/david.png"/>
			<h3>Import From:</h3>	
			<button class="btn btn-primary btn-large socialButtons"><i class="icon-align-left icon-white"></i> Facebook</button>
			<button class="btn btn-large socialButtons"><img src="/img/twitter.png" alt="Twitter"/> Twitter</button>	
		</div>		
		<div class="span4">	
			<h3 id="name">Name:</h3> <input class="span4 focused inputHeightLarge" id="focusedInput" type="text" value="David Zhang">
			<h3 id="phone">Phone:</h3><input class="span4 focused inputHeightLarge" id="focusedInput" type="text" value="123-1234-1234">
			<h3 id="website">Website: </h3> <input class="span4 focused inputHeightLarge" id="focusedInput" type="text" value="www.davidzhang.com">
			<h3 id="email">Email:</h3> <input class="span4 focused inputHeightLarge" id="focusedInput" type="text" value="david@ilovecats.com">
	<h3 id="bio">Bio:</h3>
			<textarea class="span4" name=message wrap=physical cols=28 rows=4 onKeyDown="textCounter(this.form.message,this.form.remLen,125);" onKeyUp="textCounter(this.form.message,this.form.remLen,125);">
			</textarea>
			<br>
			<input readonly type=text name=remLen id="textCount" size=3 maxlength=3 value="125">characters left</font>
			<button class="btn btn-primary btn-large" style="width:100%;" >Save</button>
		</div>	
	</div>
	<div class="settingsRightMenu">
		<ul class="nav nav-pills nav-stacked" style="color:#FF9340">
			<li class="active"><a href="/settings"><h3>Profile</h3></a></li>
			<li class=""><a href="/settings/change-password"><h3>Change Password</h3></a></li>
			<li class=""><a href="/settings/payment-info"><h3>Payment Information</h3></a></li>
		</ul>
	</div>
</div>
