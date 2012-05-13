
<?
//This stuff in PHP is from the buy page!
/////
/////
////
include 'lib/db.php';

$fid = $args;
$db = Connect();

$finfo = GetFileInfo($fid);
$name = basename($finfo['name']);
$price = $finfo['price'];
$downloads = $finfo['downloads'];
$uid = $finfo['uid'];

$uinfo = GetUserInfo($uid);
$user = $uinfo['email'];

Disconnect($db);

?>

<div class="container">
	<div class="row">
		<div class="span4 offset4">
			<div class="well">
				<h1>Login</h1>
				<br />
				<form action="" method="POST" id="login-form">
					<div class="">
						<label id="">Email</label>
						<input type="text" size="10" autocomplete="off" class="login-email" placeholder="name@email.com"/>
						<label id="">Password</label>
						<input type="text" size="10" autocomplete="off" class="login-password" placeholder=""/>
					</div>
					<button type="submit" class="submit-button btn btn-success">Submit Payment</button>
				</form>
			</div>
		</div>
	</div>
</div>
