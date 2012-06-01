<?

function BuildProductRow($name, $filename, $earned, $views, $downloads, $thumb)
{
	return <<<HTML
	<li>
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

function BuildPurchaseRow($name, $filename, $thumb)
{
	return <<<HTML
	<li>
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

function BuildDashboardTable($uid)
{
}

?>
