<?

// TODO: These functions needs to be modified to only take in fid, the rest can be derived from fid
function BuildProductRow($fid, $name, $filename, $earned, $views, $shares, $downloads, $thumb)
{
	return <<<HTML
	<li title="$fid">
		<div id="imgTd"><img id="tableThumb" src="/$thumb"/></div>
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
			<p id="big">$shares</p>	
			<p id="small">Shares</p>
		</div>
		<div class="infoTd">
			<p id="big">$downloads</p>	
			<p id="small">Purchases</p>
		</div>
	</li>
HTML;
}

function BuildPurchaseRow($fid, $name, $filename, $thumb)
{
	return <<<HTML
	<li title="$fid">
		<div id="imgTd"><img id="tableThumb" src="/$thumb"/></div>
		<div class="nameTd">
			<p id="big">$name</p>
			<p id="small">$filename</p>
		</div>
	</li>
HTML;
}

function BuildProductColumn($fid, $name, $filename, $size, $price, $image, $descr, $category, $sharelink)
{
	$price = sprintf('%.2f', $price);

	// return the final built HTML
	return <<<HTML
	<div class="productHead">
		<img src="/$image"/>
		<button class="btn btn-mini">New Thumbnail</button>
	</div>
	<div class="shareInfo">
		<div id="top">
			<input type="text" id="name" value="$name"></input>
			<div id="right">
				<input type="text" id="price" value="$price"></input>
				<span id="dollars">Dollars</span>
			</div>
		</div>
		<div id="bottom">
			<div id="shareLink" class="inputPrepend">
				<span class="addOn">Share</span>
				<input id="productURL" rel="tooltip" data-original-title="Click to copy the link to your clipboard!" type="text" readonly="readonly" name="FirstName" value="$sharelink"/>
			</div>
			<div id="shareIcons">
			<a class="btn btn-info btn-small" href="http://https://twitter.com/share?url=$sharelink" target="_blank"><img src="/img/twitter-white.png" id="twitter"/>Share on Twitter</a>
				<a class="btn btn-primary btn-small" href="http://facebook.com"><img src="/img/facebook-white.png" id="facebook"/>Share on Facebook</a>
			</div>
		</div>
		<br>
	</div>
	<div class="productInfo">
		<textarea type="text" class="input-large" id="descrInput">$descr</textarea>
	</div>
	<hr>
	<a class="btn btn-info bottomBtn" target="_blank" href="$sharelink">View Buy Page</a>
	<button class="btn btn-danger bottomBtn" onclick="ExecuteDelete()">Delete</button>
HTML;
}

function BuildPurchasedColumn($fid, $name, $filename, $size, $price, $image, $descr, $sharelink)
{
	$price = sprintf('%.2f', $price);

	// return the final built HTML
	return <<<HTML
	<div class="productHead">
		<img src="/$image"/>
	</div>
	<div class="shareInfo" id="purchased">
		<div id="top">
			<h1>$name</h1>
		</div>
	</div>
	<div class="productInfo" id="purchased">
		<p id="descrInput">$descr</p>
	</div>
	<hr>
	<form action="/ajax/download" method="POST">
		<? // Hidden input to POST id on submission ?>
		<input type="text" id="dfid" name="fid" value="$fid" style="display:none">
		<button class="btn bottomBtn">Download</button>
	</form>
HTML;
}

function BuildProductDetails($category, $param)
{
	$details = '';
	parse_str($param);

	// build the details table based on category
	switch($category) {	// different HTML for different category of files
	case 'image': 
		$details = <<<HTML
		<tr>
			<td class="left">Camera Type</td>
			<td class="right"><input class="input-medium" value="$camera_type"></input></td>
		</tr>
		<tr>
			<td class="left">Shutter Speed</td>
			<td class="right"><input class="input-medium" value="$shutter_speed"></input></td>
		</tr>
		<tr>
			<td class="left">ISO</td>
			<td class="right"><input class="input-medium" value="$iso"></input></td>
		</tr>
		<tr>
			<td class="left">Aperture</td>
			<td class="right"><div class="input-prepend">
				<span class="add-on">f</span><input class="input-small" value="$aperture"></input>
			</div></td>
		</tr>
		<tr>
			<td class="left">Dimension</td>
			<td class="right"><div class="inputMiddle">
				<input class="input-mini" id="dleft" value="$dx"></input><span class="add-on">x</span>
				<input class="input-mini" id="dright" value="$dy"></input></td>
			</div>
		</tr>
HTML;
		break;
	case 'art':
		$details = <<<HTML
		<tr>
			<td class="left">Dimension</td>
			<td class="right"><div class="inputMiddle">
				<input class="input-mini" id="dleft" value="$dx"></input><span class="add-on">x</span>
				<input class="input-mini" id="dright" value="$dy"></input></td>
			</div>
		</tr>
HTML;
		break;
	case 'music':
		$details = <<<HTML
		<tr>
			<td class="left">Artist</td>
			<td class="right"><input class="input-medium" value="$artist"></input></td>
		</tr>
		<tr>
			<td class="left">Album</td>
			<td class="right"><input class="input-medium" value="$album"></input></td>
		</tr>
		<tr>
			<td class="left">Genre</td>
			<td class="right"><input class="input-medium" value="$genre"></input></td>
		</tr>
		<tr>
			<td class="left">Length</td>
			<td class="right"><input class="input-medium" value="$length"></input></td>
		</tr>
HTML;
		break;
	case 'document':
		$details = <<<HTML
		<tr>
			<td class="left">Pages</td>
			<td class="right"><input class="input-medium" value="$Pages"></input></td>
		</tr>
HTML;
		break;
	case 'video':
		$details = <<<HTML
		<tr>
			<td class="left">Camera Type</td>
			<td class="right"><input class="input-medium" value="$camera_type"></input></td>
		</tr>
		<tr>
			<td class="left">FPS</td>
			<td class="right"><input class="input-medium" value="$fps"></input></td>
		</tr>
		<tr>
			<td class="left">Length</td>
			<td class="right"><input class="input-medium" value="$length"></input></td>
		</tr>
HTML;
		break;
	case 'generic':
		$details = <<<HTML
HTML;
		break;
	}

	return $details;
}

function BuildPurchasesDetails($category, $param)
{
	$details = '';
	parse_str($param);

	// build the details table based on category
	switch($category) {	// different HTML for different category of files
	case 'image': 
		$details = <<<HTML
		<tr>
			<td class="left">Camera Type</td>
			<td class="right">$camera_type</td>
		</tr>
		<tr>
			<td class="left">Shutter Speed</td>
			<td class="right">$shutter_speed</td>
		</tr>
		<tr>
			<td class="left">ISO</td>
			<td class="right">$iso</td>
		</tr>
		<tr>
			<td class="left">Aperture</td>
			<td class="right">f$aperture</td>
		</tr>
		<tr>
			<td class="left">Dimension</td>
			<td class="right">$dx x $dy</td>
		</tr>
HTML;
		break;
	case 'art':
		$details = <<<HTML
		<tr>
			<td class="left">Dimension</td>
			<td class="right">$dx x $dy</td>
		</tr>
HTML;
		break;
	case 'music':
		$details = <<<HTML
		<tr>
			<td class="left">Artist</td>
			<td class="right">$artist</td>
		</tr>
		<tr>
			<td class="left">Album</td>
			<td class="right">$album</td>
		</tr>
		<tr>
			<td class="left">Genre</td>
			<td class="right">$genre</td>
		</tr>
		<tr>
			<td class="left">Length</td>
			<td class="right">$length</td> 
		</tr>
HTML;
		break;
	case 'document':
		$details = <<<HTML
		<tr>
			<td class="left">Pages</td>
			<td class="right">$pages</td>
		</tr>
HTML;
		break;
	case 'video':
		$details = <<<HTML
		<tr>
			<td class="left">Camera Type</td>
			<td class="right">$camera_type</td>
		</tr>
		<tr>
			<td class="left">FPS</td>
			<td class="right">$fps</td>
		</tr>
		<tr>
			<td class="left">Length</td>
			<td class="right">$length</td>
		</tr>
HTML;
		break;
	case 'generic':
		$details = <<<HTML
HTML;
		break;
	}

	return $details;
}

?>
