<?

$uid = $_SESSION['uid'];
if($uid >= 0) {
	// get user info
	$user = GetUserInfo($uid);

	// get file info
	// TODO: We may want to think about AJAXing this
	
} else {
	// test user
	$user['name'] = 'Test Subject 42';
}

?>

<div class="main-shebang">
		<div class="topDiv">
			<h1> Welcome, <? echo $user['name']; ?>!</h1>    
			<form class="form-search">
				<input type="text" class="input-medium search-query" placeholder="Search">
			</form>
		</div>
		<div class="leftSideDiv">
			<div class="leftSideData sticky-div">
				<div class="sideData" id="number0fSales">18</div>
				<div class="sideDataText" id="salesText">Total Sales</div>
					<div class="sideData" id="dollars">500</div>
				<div class="sideDataText" id="dollarsText">Total Dollars</div>
			</div>
		</div>
		<div class= "centerDiv">
			<table class="table-bordered table-striped" id="products">
				  <thead style="text-align:left">
					<tr>
					  <th>Product</th>
					  <th>Name</th>
					  <th>Upload Date</th>
					</tr>
				  </thead>
				  <tbody>
					<? for($i = 0; $i < 100; $i++) { ?>
						<tr>
						  <td></td>
						  <td>Cats.jpg</td>
						  <td>Uploaded on 1/2/12 </td>
						</tr>
						<tr>
						  <td></td>
						  <td>Cats.jpg</td>
						  <td>Uploaded on 1/2/12 </td>
						</tr>
						<tr>
						  <td></td>
						  <td>Cats.jpg</td>
						  <td>Uploaded on 1/2/12 </td>
						</tr>
					<? } ?>
				  </tbody>
			</table>
		</div>
		<div id="shadow"></div>
		<div class="rightSideBottom">
			<div class="rightSideDiv sticky-div">
					<button class="btn" id="edit">Edit </button>
					<div id="productName"> 
						<h2>Product Name</h2>
					</div>
					<div id="fileName">
						<h3>File Name</h3>
					</div>
					<div id="Category"> 
						<h4>Category</h4>
					</div>
					<div id="Price">
						<h3>$2.00</h3>
					</div>
					<hr id="rightDivhr">
					<div id="imgDiv">
						<img src="/img/motta.png"/>
					</div>
					<a href="http://twitter.com"> <img src="/img/twitter.png" id="twitter"/> </a>
					<a href="http://facebook.com"> <img src="/img/facebook.png" id="facebook"/> </a>
					<img src="/img/envelope.png" id="envelope"/>
					<div>
						<input id="productURL" type="text" readonly="readonly" name="FirstName" value="www.product.co" onclick=this.select() />
					</div>
					<p id="Share"> Share this link!</p>
			</div>
		</div>
	</div>
</div>
	
