<div class="rightSideBottom">
	<div class="rightSideDiv sticky-div">
		<div class="topLeft">
			<h2>Image of Cats</h2>
			<h3>Cats.png</h3>
		</div>
		<div class="topRight">
			<h2>$2.00</h2>
			<h3>Photographs</h3>
		</div>

		<div class="imgDiv"><img src="/img/motta.png"/></div>

		<div class="shareInfo">
			<hr>
			<input id="productURL" rel="tooltip" data-original-title="Click to copy the link to your clipboard!" type="text" readonly="readonly" name="FirstName" value="www.product.co"/>
			<a href="http://twitter.com"><img src="/img/twitter.png" id="twitter"/></a>
			<a href="http://facebook.com"><img src="/img/Facebook.png" id="facebook"/></a>
		</div>

		<div class="tableDiv">
			<table class="productInfo">
				<? switch($category) {	// different HTML for different catagory of files
					case 'photo': ?>
					<tr>
						<td class="left">Camera Type</td>
						<td class="right">Nikon</td>
					</tr>
					<tr>
						<td class="left">Shutter Speed </td>
						<td class="right">1/320 </td>
					</tr>
					<tr>
						<td class="left">ISO</td>
						<td class="right">3200</td>
					</tr>
					<tr>
						<td class="left">Aperture</td>
						<td class="right">f2.8</td>
					</tr>
					<tr>
						<td class="left">Dimension</td>
						<td class="right">5000x4000</td>
					</tr>
					<tr>
						<td class="left">File Size</td>
						<td class="right">1.4MB</td>
					</tr>
				<? break; ?>
				<? case 'art': ?>
					<tr>
						<td class="left">Dimension</td>
						<td class="right">5000x4000</td>
					</tr>
				<? break; ?>
				<? case 'music': ?>
					<tr>
						<td class="left">Artist</td>
						<td class="right">My Band</td>
					</tr>
					<tr>
						<td class="left">Album</td>
						<td class="right">My Album</td>
					</tr>
					<tr>
						<td class="left">Genre</td>
						<td class="right">Rock</td>
					</tr>
					<tr>
						<td class="left">Length</td>
						<td class="right">3:12</td> 
					</tr>
				<? break; ?>
				<? case 'book': ?>
					<tr>
						<td class="left">Pages</td>
						<td class="right">233</td>
					</tr>
					<tr>
						<td class="left">Description</td>
						<td class="right">Story of a farm girl who runs away from home in search of a career as an actress.</td>
					</tr>
				<? break; ?>
				<? case 'document': ?>
					<tr>
						<td class="left">Description<td>
						<td class="right">This is a PS file which allows you to make an awesome cat image. </td>
					</tr>
				<? break; ?>
				<? case 'video': ?>
				<tr>
						<td class="left">Camera Type</td>
						<td class="right">Nikon</td>
					</tr>
					<tr>
						<td class="left">Shutter Speed </td>
						<td class="right">1/320 </td>
					</tr>
					<tr>
						<td class="left">ISO</td>
						<td class="right">3200</td>
					</tr>
					<tr>
						<td class="left">Camera Type</td>
						<td class="right">Nikon</td>
					</tr>
					<tr>
						<td class="left">Length</td>
						<td class="right">1:12:11</td>
					</tr>
					<tr>
						<td class="left">Description</td>
						<td class="right">A video of cats playing with a ball of yarn. </td>
					</tr>
				<? break; ?>
				<? } ?>
			</table>
		</div>
		<button class="btn" id="edit">Edit</button>
	</div>	<!-- end of sticky div -->
</div>	<!-- end of right side bottom -->
