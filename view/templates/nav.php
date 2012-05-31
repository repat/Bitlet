<?

$uid = $_SESSION['uid']; 
if($uid >= 0)
{
	list($name, ) = explode('@', GetUserName($uid));
}

?>

<div id="navbar-bitlet">
	<div class="container">
		<a class="brand" href="/"><h1>Bitlet</h1/img/logoSmall.png"></a>

		<div class="menu-navbar-bitlet">
			<? if($uid >= 0) { // already logged in ?>
					<div  class="dropdown">
							<a class="dropdown-toggle rounded-corners" data-toggle="dropdown" href="#" id="userEmail">
								<? echo $name; ?> <b class="caret" id="caret" ></b>
							</a>
							<ul class="dropdown-menu" id="menu1">
								<li >
									<a href="#">Dashboard</a>
								</li>
								<li>
									<a href="#">FAQ</a>
								</li>
								<li>
									<a href="#">Settings</a>
								</li>
								<li>
									<a href="#">Logout</a>
								</li>
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
