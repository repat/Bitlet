<?
$uid = $_SESSION['uid'];
$db = Connect();
$name = GetUserName($uid);
Disconnect($db);
?>

<div class="navbar-bitlet">
	<div class="container" style="width:980px;">
		<a class="brand" href="http://bitlet.co"><h1>Bitlet</h1/img/logoSmall.png"></a>

		<!-- We need php statements here to check if people are logged in and if we are on different kinds of pages
			 Don't show the nav bar on the login page, sales page, others? -->
		<div class="menu-navbar-bitlet pull-right">
			<? if($uid >= 0) { // already logged in ?>
				<span id="welcome">Welcome <? echo $name; ?>, </span>
				<a id="account" href="/admin">View your account</a>
			<? } else { // not logged in ?>
				<a href="http://affiliates.bitlet.co">Affiliates</a> 
				<a onclick="showFAQ();"href="#">Help</a>
				<a onclick="showLogin();" href="#">Login</a>
			<? } ?>
		</div>
	</div>
</div>
