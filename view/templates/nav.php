<?
$uid = $_SESSION['uid'];
?>

<div id="navbar-bitlet">
	<div class="container">
		<a class="brand" href="/"><h1>Bitlet</h1/img/logoSmall.png"></a>

		<div class="menu-navbar-bitlet">
			<? if($uid >= 0) { // already logged in ?>
				<span id="menu-navbar-welcome">Welcome <? echo GetUserName($uid); ?>, </span>
				<a id="menu-navbar-account" href="/dashboard">View your account</a>
			<? } else { // not logged in ?>
				<a href="http://affiliates.bitlet.co">Affiliates</a> 
				<a href="/faq">FAQ</a>
				<a onclick="showLogin();" href="#">Login</a>
			<? } ?>
		</div>
	</div>
</div>
