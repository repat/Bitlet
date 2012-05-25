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
		<img class="profilePic" src="/img/arianna.png"/>
			<h1> Welcome, <? echo $user['name']; ?>!</h1>    
			<form class="form-search">
				<input type="text" class="input-medium search-query" placeholder="Search">
			</form>
		</div>
		<div class="leftSideDiv">
			<div class="leftSideData sticky-div">
				<div class="sideData" id="credits">18</div>
				<div class="sideDataText" id="totalCredits">Total Credits</div>
				<div class="sideData" id="sales">50</div>
				<div class="sideDataText" id="totalSales">Total Sales</div>
				<div class="sideData" id="bought">12</div>
				<div class="sideDataText" id="totalBought">Purchased</div>
				<div class="sideData" id="selling">9</div>
				<div class="sideDataText" id="totalSelling">Products</div>
			</div>
		</div>
		<div class= "centerDiv">
		<button class="btn btn-success" id="newProduct">Add a Product </button>
			<div class="tabbable">
				  <ul class="nav nav-pills">
					<li class="active"><a href="#tab1" data-toggle="tab">Products</a></li>
					<li><a href="#tab2" data-toggle="tab">Purchased</a></li>
				  </ul>
				  <div class="tab-content">
					<div class="tab-pane active" id="tab1">
						<table class="table-striped" id="products">
							  <tbody>
								<? for($i = 0; $i < 100; $i++) { ?>
									<tr>
									  <td><img id="thumbnail" src="/img/motta.png"/></td>
									  <td>Cats.jpg</td>
									  <td>
									  	<p class="uploaded">Uploaded on</p>
									  	<p class="date">1/2/12
									  	<span>at</span>
									  	3:22 PM</p>
									  </td>
									</tr>
								<? } ?>
							  </tbody>
						</table>
					</div>
					<div class="tab-pane" id="tab2">
					  <p>...</p>
					</div>
				  </div>
				</div>
		
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
					<hr id="rightDivhr2">
					<div id="
					<a href="http://twitter.com"> <img src="/img/twitter.png" id="twitter"/> </a>
					<a href="http://facebook.com"> <img src="/img/Facebook.png" id="facebook"/> </a>
					<div>
						<input id="productURL" type="text" readonly="readonly" name="FirstName" value="www.product.co" onclick=this.select() />
					</div>
					<p id="Share"> Share this link!</p>
					<table id="productInfo">
						<tr>
							<td id="left">Camera Type</td>
							<td id="right">Nikon</td>
						</tr>
						<tr>
							<td id="left">Shutter Speed </td>
							<td id="right">1/320 </td>
						</tr>
						<tr>
							<td id="left">ISO</td>
							<td id="right">3200</td>
						</tr>
						<tr>
							<td id="left">Aperture</td>
							<td id="right">f2.8</td>
						</tr>
						<tr>
							<td id="left">Dimension</td>
							<td id="right">5000x4000</td>
						</tr>
						<tr>
							<td id="left">File Size</td>
							<td id="right">1.4MB</td>
						</tr>
					</table>
			</div>
		</div>
	</div>
</div>
	
