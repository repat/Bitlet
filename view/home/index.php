<body>

<!-- TEXT BOX CODE GOES HERE -->
<div class="tagline-descr">
	<div class="quote-placement">
		<div class="quote-background">
			<h1 style="text-align:center; padding-bottom:10px; padding-top:10px;">
				Share & Sell Your Digital Content.
			</h1>
			<table class="intro"> 
			<tr>
				<th style="width:300px;"><h2>Sell Instantly</h2></th>
				<th style="width:300px; padding:-10px;"><h2>Share It</h2></th>
				<th style="width:400px;"><h2>Claim Your Cash</h2></th>
			</tr>
			<tr>
				<th style="width:300px; vertical-align:text-top;">
					<h3>Just fill in your email, and upload a file you want to sell.</h3>
				</th>
				<th style="width:470px; vertical-align:text-top;">
					<h3>We give you a link you can Pin, Tweet, post to Facebook, or email out. 
					Anyone with the link can buy your product.</h3>
				</th>
				<th style="width:300px; vertical-align:text-top;">
					<h3>Once you're ready to collect your profits, just press the "Check Out" button.</h3>
				</th>
			</tr>
			</table>
			<hr class="index bar">
			<form  style="text-align:center;" class="form-inline" target="upload_iframe" id="upload" 
				action="/ajax/upload" method="post" enctype="multipart/form-data">
				<div class="input-prepend">
					<span class="add-on" id="emaila"><i id="email-icon" class="icon-envelope"></i></span>
					<input class="input-medium" id="email" type="text" name="email" 
						placeholder="Email" onkeypress="return event.keyCode!=13">
				</div>

				<button type="button" class="upload-button btn btn-large btn-primary" 
					onclick="$('.file-button').click();">
					Upload File
				</button>
				<input type="file" name="file" id="button" class="file-button" style="display:hidden"
					 onchange="
						upload.submit();
						// disable the file selection button
						$('.upload-button').attr('disabled', 'disabled'); 
						$('.file-button').attr('disabled', 'disabled');"
				/>
			</form>
			<div class="email-suggestion-wrap">
				<div class="email-suggestion"></div>
			</div>
		</div>
	</div>
</div>

<!-- SLIDER CODE GOES HERE -->
<div id="tagline-image">
	<div id="headerButtons">
		<div id="theButtons"></div>
	</div>
	<div id="myCarousel" class="carousel slide">
		<!-- Carousel items -->
		<div class="carousel-inner">
			<div class="active item"> <img class="carouselImage" src="img/bg/leaf.jpg"> </div>
			<div class="item"> <img class="carouselImage" src="img/bg/musician.jpg"></div>
			<div class="item"> <img class="carouselImage" src="img/bg/music.jpg">
			<!--<div class="item"> <img class="carouselImage" src="img/bg/doc.jpg"> </div>
			<div class="item"> <img class="carouselImage" src="img/bg/movies.jpg"> </div>
			 </div>
			<div class="item"> <img class="carouselImage" src="img/bg/files.jpg"> </div>-->
		</div>
	</div>
</div>

<!-- Hidden Upload iFrame for Async Uploading -->
<iframe name="upload_iframe" class="upload-iframe">
</iframe>

<!-- uploaded file view modal -->
<div id="FileModal" class="modal hide fade">

	<div class="modal-header">
		<button class="close" data-dismiss="modal">x</button>
    	<h3>Item Details</h3>
	</div>
    <!-- dialog contents -->
    <div class="modal-body faq">
		<iframe class="FileIFrame"></iframe>
	</div>
    <!-- dialog buttons -->
    <div class="modal-footer">
        <a href="#" class="btn primary">Upload Another File</a>
    </div>
</div>

</body>

