<div class="leftSideContainer">
	<div class="leftSideMenu sticky-div">
		<ul>
			<li id="first"></li>
			<hr>
			<li><a id="uploadButton" href="#" 
				onclick="$('.file-button').click();"><img src="/img/upload.png"/>New Item</a></li>
			<hr>
			<li><a href="#products" id="productsBtn"><img src="/img/products.png"/>Products</a></li>
			<hr>
			<li><a href="#purchases" id="purchasesBtn"><img src="/img/purchases.png"/>Purchases</a></li>
			<hr>
		</ul>
	</div>
</div>

<form target="upload_iframe" id="homeUpload" 
	action="/ajax/upload" method="post" enctype="multipart/form-data">
	<? // Hidden file upload button ?>
	<input type="file" name="file" id="button" class="file-button" style="display:hidden">
</form>

<? // Hidden Upload iFrame for Async Uploading ?>
<iframe name="upload_iframe" id="homeUploadIframe">
</iframe>
