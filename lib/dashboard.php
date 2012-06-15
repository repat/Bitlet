<?

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
		<div class="divider"><div></div></div>
		<div class="infoTd">
			<a class="btn btn-large">Download</a>
		</div>
	</li>
HTML;
}

function BuildProductColumn($name, $filename, $size, $price, $image, $descr, $category, $sharelink)
{
	// generate the correct default catagory selection box code
	$select = '';
	if($category == 'photo') {
		$select .= '<option selected="selected">Image</option>';
	} else {
		$select .= '<option>Image</option>';
	}
	if($category == 'art') {
		$select .= '<option selected="selected">Art</option>';
	} else {
		$select .= '<option>Art</option>';
	}
	if($category == 'music') {
		$select .= '<option selected="selected">Music</option>';
	} else {
		$select .= '<option>Music</option>';
	}
	if($category == 'document') {
		$select .= '<option selected="selected">Document</option>';
	} else {
		$select .= '<option>Document</option>';
	}
	if($category == 'video') {
		$select .= '<option selected="selected">Video</option>';
	} else {
		$select .= '<option>Video</option>';
	}
	if($category == 'generic') {
		$select .= '<option selected="selected">Generic</option>';
	} else {
		$select .= '<option>Generic</option>';
	}

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
				<a href="http://twitter.com"><img src="/img/twitter.png" id="twitter"/></a>
				<a href="http://facebook.com"><img src="/img/Facebook.png" id="facebook"/></a>
			</div>
		</div>
		<br>
	</div>
	<div class="productInfo">
		<div id="left">
			<select id="categoryInput" onchange="EditCategory()">$select</select>
			<textarea type="text" class="input-large" id="descrInput">$descr</textarea>
		</div>
		<table class="detailsTable"></table>
		<br style="clear: left;"/>
	</div>
	<hr>
	<button class="btn btn-danger" id="deleteBtn" onclick="ExecuteDelete()">Delete</button>
HTML;
}

function BuildPurchasedColumn($name, $filename, $size, $price, $image, $descr, $sharelink)
{
	// return the final built HTML
	return <<<HTML
	<div class="topLeft">
		<h2>$name</h2>
		<h3>$filename | $size bytes</h3>
	</div>
	<div class="topRight">
		<h2>$$price</h2>
	</div>

	<div class="imgDiv"><img src="/$image"/></div>

	<div class="tableDiv"><div class="productInfo bitletRoundedCorners bitletDropShadow">
		<p id="productDescr"><b>About this file: </b>$descr 
			<button class="btn btn-mini" data-toggle="collapse" data-target="#dataTable">more <span class="caret"></span></button></p>
		<div id="dataTable" class="collapse in"><hr><table class="detailsTable"></table></div>
	</div></div>

	<div class="shareInfo bitletDropShadow bitletRoundedCorners">
		<h3>Share this product and earn credits!</h3>
		<hr>
		<input id="productURL" rel="tooltip" data-original-title="Click to copy the link to your clipboard!" type="text" readonly="readonly" name="FirstName" value="$sharelink"/>
		<a href="http://twitter.com"><img src="/img/twitter.png" id="twitter"/></a>
		<a href="http://facebook.com"><img onload="CollapseRight()" src="/img/Facebook.png" id="facebook"/></a>
	</div>
	<button class="btn btn-info" id="edit">Download</button>
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
