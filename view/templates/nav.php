<?

if($UID >= 0)
{
	list($name, ) = explode('@', GetUserName($UID));
}

?>

<div id="navbar-bitlet">
	<div class="container">
		<a class="brand" href="/"><h1>Bitlet</h1/img/logoSmall.png"></a>

		<div class="menu-navbar-bitlet">
			<? if($UID >= 0) { // already logged in ?>
				<div class="dropdown bitletRoundedCorners">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="userEmail">
						<? echo $name; ?> <b class="caret" id="caret" ></b>
					</a>
					<ul class="dropdown-menu" id="menuLoggedIn">
						<li ><a href="/dashboard">Dashboard <i class="icon-user"></i></a></li>
						<li><a href="/faq">FAQ <i class="icon-question-sign"></i></a></li>
						<li><a href="/settings">Settings <i class="icon-cog"></i></a></li>
						<li class="divider" id="divider"></li>
						<li><a id="logoutBtn" href="#">Log Out <i class="icon-off"></i></a></li>
					</ul>
				</div>
			<? } else { // not logged in ?>
				<a href="http://affiliates.bitlet.co">Affiliates</a> 
				<a href="/faq">FAQ</a>
				<a onclick="showLogin();" href="#">Login</a>
			<? } ?>
		</div>
	</div>
</div>
