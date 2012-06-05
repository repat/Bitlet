<div class="container">
	<h1>Settings<h1>
	<hr>
	<h2>Profile</h2>
		<div class="well container profile bitletDropShadow roundedCorners" id="leftCol"> 
				<img id="profilePic" src="/img/team/david.png">
				<div class="span4">
				<h4 id="name">Name:</h4> <input class="input-small focused" id="focusedInput" type="text" value="David Zhang">
				<h4 id="location">Location:</h4><input class="input-small focused" id="focusedInput" type="text" value="Princeton, NJ">
					<h4 id="website">Website: </h4> <input class="input-xlarge focused" id="focusedInput" type="text" value="www.davidzhang.com">
					<h4 id="email">Email:</h4> <input class="input-xlarge focused" id="focusedInput" type="text" value="david@ilovecats.com">
				</div>
				<div class="span5">
				<h4 id="bio">Bio:</h4><form id="bioBox" name=myform action="http://www.netevolution.co.uk"><br>
					<textarea name=message wrap=physical cols=28 rows=4 onKeyDown="textCounter(this.form.message,this.form.remLen,125);" onKeyUp="textCounter(this.form.message,this.form.remLen,125);">
					</textarea>
					<br>
					<input readonly type=text name=remLen id="textCount" size=3 maxlength=3 value="125">characters left</font>
					</form>
				
					
					<button class="btn-primary" id="save">Save</button>
				</div>
		</div>
	<hr>
	<h2>Preferences</h2>
		<div class="well container profile bitletDropShadow roundedCorners" id="preferences"> 
			<p class="pref" ><input type="checkbox" id="check1" >Email me when someone purchases one of my products!</p>
			<p class="pref"><input type="checkbox" id="check2">Email me a weekly summary of my sales</p>
			<h4 id="changePw">Change Password</h4>
			<p class="pwField" id="old">Old Password:<input class="input focused" id="focusedInput-old" type="text" value="ILoveCats"></p>
			<p class="pwField" id ="new">New Password:<input class="input focused" id="focusedInput" type="text" value=""></p>
			<p class="pwField">Confirm New Password:<input class="input focused" id="focusedInput" type="text" value=""></p>
			<p> Security Question
		</div>
</div>
