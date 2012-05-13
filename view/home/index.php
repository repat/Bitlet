<div id="bitlet-hero">
	<div class="container">
		<div id="home-featured-left">
		</div><!-- end of home-feature-left -->
		<div id="home-featured-right">
			<div id="content">
				<form  style="text-align:center;" class="form-inline" target="upload_iframe" id="upload" 
					action="/ajax/upload" method="post" enctype="multipart/form-data">
					<div class="input-prepend">
						<span class="add-on" id="emaila"><i id="email-icon" class="icon-envelope"></i></span>
						<input class="input-medium" id="email" type="text" name="email" placeholder="Email" onkeypress="return event.keyCode!=13">
					</div><!-- end of input-prepend -->

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
			</div><!-- content -->
			<div id="top-triangle" class="triangle"></div> 
			<div id="bottom-triangle" class="triangle"></div> 
		</div><!-- end of home-feature-right -->
	</div><!-- end of contianer -->
</div><!-- end of bitlet-hero -->

<!-- MARKETING STUFF GOES HERE -->
<div class="container well marketing" >
	<h1>With Bitlet, you'll be making money in no time!</h1>
	<hr>
	<div class="row">
		<div class="span4">
			<div class="thumbnail"><img src="/img/drawings/chart.png" alt="the chart is going up!"></div>
		</div>
		<div class="span8">
			<h2>Earn cash for what you do best</h2>
			<p>You shouldn't have to worry about business or marketing when working on your next masterpiece, and with Bitlet, you don't have to.</p>
			<p>Upload your digital work, and we'll give you a link to share so you can start selling right away. Additionally, we'll use our own sales army to help you get exposure and make money. And by the way, submitting content is free, we only make money when you do.</p>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="span8">
			<h2>Your personal sales force</h2>
			<p>Our network of professional marketers takes cae of the selling for you, so you can focus on what you do best - making awesome products.</p>
			<p>The moment a product is uploaded to Bitlet, it is accessable by professional marketers with influence over millions of potiential customers.</p>
		</div>
		<div class="span4">
			<div class="thumbnail"><img src="/img/drawings/army.png" alt="your personal sales army"></div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="span4">
			<div class="thumbnail"><img src="/img/drawings/backend.png" alt="backend to handle all your needs"></div>
		</div>
		<div class="span8">
			<h2>Tools to help you succeed</h2>
			<p>hello world</p>
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


