<?
$uid = $_SESSION['uid'];
?>

<div class="navbar-bitlet">
	<div class="container" style="width:980px;">
		<a class="brand" href="http://bitlet.co"><h1>Bitlet</h1/img/logoSmall.png"></a>

		<div class="menu-navbar-bitlet pull-right">
			<? if($uid >= 0) { // already logged in ?>
				<span id="welcome">Welcome <? echo GetUserName($uid); ?>, </span>
				<a id="account" href="/admin">View your account</a>
			<? } else { // not logged in ?>
				<a href="http://affiliates.bitlet.co">Affiliates</a> 
				<a onclick="showFAQ();"href="#">Help</a>
				<a onclick="showLogin();" href="#">Login</a>
			<? } ?>
		</div>
	</div>
</div>
