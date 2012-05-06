
<!-- TEXT BOX CODE GOES HERE -->
<div class="tagline-descr">
	<div class="quote-placement">
		<div class="quote-background">
			<h1>Share & Sell Your Digital Content With the World.</h1>
			<h2 class="intro">The easiest way to share your stuff online and make a profit. Join the revolution.</h2>
			<form class="form-inline" target="upload_iframe" id="upload" action="/ajax/upload" method="post" enctype="multipart/form-data">
				<div class="input-prepend">
					<span class="add-on" id="emaila"><i id="email-icon" class="icon-envelope"></i></span>
					<input class="input-medium" id="email" type="text" name="email" 
						placeholder="Email" onkeypress="return event.keyCode!=13">
				</div>

				<button type="button" class="btn btn-large btn-primary">
					<div class="file-div">
					<input type="file" name="file" id="button" class="file-button"
						 onchange="load(''); fade('loading'); upload.submit()"/>
					</div>
					Upload File
				</button>
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
			<div class="active item"> <img src="img/bg/photos.jpg"> </div>
			<div class="item"> <img src="img/bg/art.jpg"></div>
			<div class="item"> <img src="img/bg/doc.jpg"> </div>
			<div class="item"> <img src="img/bg/movies.jpg"> </div>
			<div class="item"> <img src="img/bg/music.jpg"> </div>
			<div class="item"> <img src="img/bg/files.jpg"> </div>
		</div>
	</div>
</div>

<!-- Hidden Upload iFrame for Async Uploading -->
<iframe name="upload_iframe" class="upload-iframe">
</iframe>

<script language="javascript" type="text/javascript">
	var UploadDone = function(result) {
		if(result) {
			console.log("upload done!");
		} else {
			console.error("upload error!");
		}
	}
</script>   

