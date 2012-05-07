<body>
<? 
include 'lib/db.php';
?>

	<div class= "well container">

		<div class="tabbable"> 
		  <ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab">Bought</a></li>
			<li><a href="#tab2" data-toggle="tab">Sold</a></li>
			  <li><a href="#tab3" data-toggle="tab">Settings</a></li>
		  </ul>
		  <div class="tab-content">
			<div class="tab-pane active" id="tab1">
			  <p>Things that I bought</p>
			</div>
			<div class="tab-pane" id="tab2">
			  <p>Things that I sold</p>
			</div>
			<div class="tab-pane" id="tab3">
				<p>Things that are Settings</p>
			</div>
		  </div>
		</div>
	</div>	

</body>

