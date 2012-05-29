<?
$uid = $_SESSION['uid'];
?>

<div id="navbar-bitlet">
	<div class="container">
		<a class="brand" href="/"><h1>Bitlet</h1/img/logoSmall.png"></a>

		<div class="menu-navbar-bitlet">
			<? if($uid >= 0) { // already logged in ?>
				<span id="welcome">Welcome</span>
					<ul class="nav login">
						<li class="dropdown"> 
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="userEmail"><? echo GetUserName($uid); ?>,  
								<b class="caret"></b>
							</a>
								<ul class="dropdown-menu" id="menu1">
									<li>
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
							</li>
					</ul>
					
			<? } else { // not logged in ?>
				<a href="http://affiliates.bitlet.co">Affiliates</a> 
				<a href="/faq">FAQ</a>
				<a onclick="showLogin();" href="#">Login</a>
			<? } ?>
		</div>
	</div>
</div>
