<div class="tagline-image">
</div>
<div class="container tagline">
	<div class="row tagline-descr">
		<div class="span6">
			<div class="quote-background">
				<h1>Share & Sell your digital content with the World.</h1>
				<p class="intro">The easiest way to share your stuff online and make a profit. Join the revolution.</p>
				<div>
					<form class="form" id="upload" action="upload.php" method="post" enctype="multipart/form-data">
						<input type="text" name="email" onkeypress="return event.keyCode!=13">
						<button type="button" class="btn btn-success btn-large">
							<div class="file-div">
							<input type="file" name="file" id="button" class="file-button"
								 onchange="load(''); fade('loading'); upload.submit()"/>
							</div>
							Upload File
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

