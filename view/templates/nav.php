<div class="navbar-bitlet">
	<div class="container" style="width:980px;">
		<a class="brand" href="http://bitlet.co"><h1>Bitlet</h1/img/logoSmall.png"></a>

		<!-- We need php statements here to check if people are logged in and if we are on different kinds of pages
			 Don't show the nav bar on the login page, sales page, others? -->
		<div class="menu-navbar-bitlet pull-right">
			<a class="" href="http://affiliates.bitlet.co">Affiliates</a> 
			<a class="" onclick="showFAQ();"href="#">Help</a>
			<? if($_SESSION['uid'] >= 0) { // already logged in ?>
				Welcome <? echo $name; ?>, View your
				<a class="" href="/admin">Account</a>
			<? } else { // not logged in ?>
				<a class="" onclick="showLogin();" href="#">Login</a>
			<? } ?>
		</div>
	</div>
</div>
