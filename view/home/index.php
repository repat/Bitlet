<body>

<?
include 'hero.php';
?>

<!-- uploaded file view modal -->
<div id="FileModal" class="modal hide fade">

	<div class="modal-header">
		<button class="close" data-dismiss="modal">X</button>
    	<h3>File Details</h3>
	</div>
    <!-- dialog contents -->
    <div class="modal-body faq">
		<iframe class="FileIFrame"></iframe>
	</div>
    <!-- dialog buttons -->
    <div class="modal-footer">
        <a href="#" class="btn primary">OK</a>
    </div>
</div>

<!-- for loading screen -->
<div id="loading-bg">
</div>

<div id="loading">
	<span id="loading-text">Working...</span>
	<div id="loading-bar">
		<img src="img/main-loader.gif"/>
	</div>
</div>

</body>

