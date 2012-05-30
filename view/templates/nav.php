<?
$uid = $_SESSION['uid']; 
list($name, ) = explode('@', GetUserNames($uid));
?>

<div id="navbar-bitlet">
	<div class="container">
		<a class="brand" href="/"><h1>Bitlet</h1/img/logoSmall.png"></a>

		<div class="menu-navbar-bitlet">
			<? if($uid >= 0) { // already logged in ?>
				<span id="welcome">Welcome,</span>
					<ul class="nav login">
						<li class="dropdown"> 
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="userEmail"><? echo $name; ?>!  
								<b class="caret"></b>
							</a>
								<ul class="dropdown-menu" id="menu1">
									<li class="dropObj">
										<a href="#">Dashboard</a>
									</li>
									<li class="dropObj">
										<a href="#">FAQ</a>
									</li>
									<li class="dropObj">
										<a href="#">Settings</a>
									</li>
									<li class="dropObj">
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
