<?
	$uInfo = GetUserInfo($UID);
	
	$email = $uInfo['email'];
	$name = $uInfo['name']; 
	$phone = $uInfo['phone']; 
	$bio = $uInfo['bio']; 
	$emailSettings  = $uInfo['email_settings'];     
	$profilePic = $uInfo['profile_img']; 
	$website =  $uInfo['website']; 

	//checks to see if the profile_img returned null or blank and then gives us temp thumbnail
	if($profilePic === null or $profilePic ===''){
		$profilePic = '/img/bitlet-silhouette.png'; 	
	}else{
		//these we're the droids you were looking for
	}
?>


<div class="container well profile bitletDropShadow roundedCorners" id="leftCol"> 
	<div class="settingsLeftContent">	
		<h2 class="prof" >Profile</h2>
		<div style="width:156px;float:left;">
		<img id="profilePic" src="<? echo $profilePic ?>" alt="<? echo $name ?>"/>
			<h3>Import From:</h3>	
			<button class="btn btn-primary btn-large socialButtons"><i class="icon-align-left icon-white"></i> Facebook</button>
			<button class="btn btn-large socialButtons"><img src="/img/twitter.png" alt="Twitter"/> Twitter</button>	
		</div>		
		<div class="span4 settingsMoveRight">	
		<h3>Name:</h3> <input class="span4 focused inputHeightLarge" id="name" type="text" placeholder="Lisa Bitlet" value="<? echo $name?>">
		<h3>Email:</h3> 
		<input class="span4 disabled inputHeightLarge" id="disabledInput email" type="text" placeholder="<? echo $email ?>" disabled="">
		<h3>Phone:</h3><input class="span4 focused inputHeightLarge" id="phone" type="text" placeholder="814-441-2968" value="<? echo $phone ?>">
		<h3 >Website: </h3> <input class="span4 focused inputHeightLarge" id="website" type="text" placeholder="www.Bitlet.co" value="<? echo $website ?>">
	<h3>Bio:</h3>
	<textarea class="input-xlarge span4" id="bioBox" rows="3" placeholder="Tell us about you!" value="<? echo $bio ?>" ></textarea>
			<br>
			<span class="uneditable-input" id="textCount">125</span>	
			<label class="checkbox">
                <input type="checkbox" id="optionsCheckboxList1" value="emailOnPurchase">
				Email me when someone purchases my products!
            </label>	
			<label class="checkbox">
                <input type="checkbox" id="optionsCheckboxList2" value="EmailWeekly">Email me a weekly summary of my sales
            </label>	
			<button class="btn btn-primary btn-large" id="saveButton" >Save</button>
		</div>	
	</div>
	<div class="settingsRightMenu">
		<ul class="nav nav-pills nav-stacked settingsNavSideBar"> 
			<li class="active"><a href="/settings"><h3>Profile</h3></a></li>
			<li ><a href="/change-password"><h3>Change Password</h3></a></li>
			<li ><a href="/payment-info"><h3>Payment Information</h3></a></li>
		</ul>
	</div>
</div>
