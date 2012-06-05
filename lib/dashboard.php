<?

function BuildProductRow($fid, $name, $filename, $earned, $views, $downloads, $thumb)
{
	return <<<HTML
	<li title="$fid">
		<div id="imgTd"><img id="tableThumb" src="$thumb"/></div>
		<div class="nameTd">
			<p id="big">$name</p>
			<p id="small">$filename</p>
		</div>
		<div class="divider"><div></div></div>
		<div class="infoTd">
			<p id="big">$earned</p>	
			<p id="small">Earned</p>
		</div>
		<div class="infoTd">
			<p id="big">$views</p>	
			<p id="small">Views</p>
		</div>
		<div class="infoTd">
			<p id="big">$downloads</p>	
			<p id="small">Downloads</p>
		</div>
	</li>
HTML;
}

function BuildPurchaseRow($fid, $name, $filename, $thumb)
{
	return <<<HTML
	<li title="$fid">
		<div id="imgTd"><img id="tableThumb" src="$thumb"/></div>
		<div class="nameTd">
			<p id="big">$name</p>
			<p id="small">$filename</p>
		</div>
		<div class="divider"><div></div></div>
		<div class="infoTd">
			<a class="btn btn-large">Download</a>
		</div>
	</li>
HTML;
}

function BuildItemDetails($name, $filename, $size, $image, $descr, $catagory, $sharelink, $param)
{
	return <<<HTML
	<div class="rightSideMenu sticky-div">
		<div id="topBar"></div>
		<div class="topLeft">
			<h2>Image of Cats</h2>
			<h3>Cats.png | 36.5 KB</h3>
		</div>
		<div class="topRight">
			<h2>$2.00</h2>
		</div>

		<div class="imgDiv"><img src="http://placekitten.com/250/250"/></div>

		<div class="tableDiv"><div class="productInfo bitletRoundedCorners bitletDropShadow">
			<p id="productDescr"><b>About this file: </b>This is a PS file which allows you to make an awesome cat image. 
				<button class="btn btn-mini" data-toggle="collapse" data-target="#dataTable">more <span class="caret"></span></button></p>
			<div id="dataTable" class="collapse in"><hr><table>
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
				<? break; ?>
				<? case 'document': ?>
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
						<td class="left">Length</td>
						<td class="right">1:12:11</td>
					</tr>
				<? break; ?>
				<? } ?>
			</table></div>
		</div></div>

		<div class="shareInfo bitletDropShadow bitletRoundedCorners">
			<h3>Share this product and earn credits!</h3>
			<hr>
			<input id="productURL" rel="tooltip" data-original-title="Click to copy the link to your clipboard!" type="text" readonly="readonly" name="FirstName" value="bitlet.co/l/24d3f"/>
			<a href="http://twitter.com"><img src="/img/twitter.png" id="twitter"/></a>
			<a href="http://facebook.com"><img src="/img/Facebook.png" id="facebook"/></a>
		</div>

		<button class="btn btn-info" id="edit">Edit</button>
	</div>	<!-- end of sticky div -->
HTML;
}

?>
