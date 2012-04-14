<div id="tagline-image">
</div>
<div class="container tagline">
	<div class="row tagline-descr">
		<div class="span6">
			<div class="quote-background">
				<h1>Share & Sell your digital content with the World.</h1>
				<p class="intro">The easiest way to share your stuff online and make a profit. Join the revolution.</p>
				<div>
					<form class="form-inline" id="upload" action="upload.php" method="post" enctype="multipart/form-data">
						<div class="input-prepend">
					        <span class="add-on" id="emaila"><i id="email-icon" class="icon-envelope"></i></span>
							<input class="input-medium" id="email" type="text" name="email" placeholder="Email" onkeypress="return event.keyCode!=13">
						</div>
						<button type="button" class="btn btn-large btn-success">
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
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="span2 hero-circle" id="circle-1">
			<img src="/img/mainpage-icons/music.png" alt="Music" width="50px"/>
		</div>
		<div class="span2 hero-circle" id="circle-2">
			<img src="/img/mainpage-icons/art.png" alt="Art" width="50px"/>
		</div>
		<div class="span2 hero-circle" id="circle-3">
			<img src="/img/mainpage-icons/video.png" alt="Videos" width="50px"/>
		</div>
		<div class="span2 hero-circle" id="circle-4">
			<img src="/img/mainpage-icons/file.png" alt="Files" width="50px"/>
		</div>
		<div class="span2 hero-circle" id="circle-5">
			<img src="/img/mainpage-icons/software.png" alt="Software" width="50px"/>
		</div>
		<div class="span2 hero-circle" id="circle-6">
			<img src="img/mainpage-icons/photograph.png" alt="Photography" width="50px"/>
		</div>
	</div>	
</div>
