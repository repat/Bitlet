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


$catagory = 'art';
?>

<div class="main-shebang">
		<div class="topDiv">
		<img class="profilePic" src="/img/arianna.png"/>
			<h1> Welcome, <? echo $user['name']; ?>!</h1> 
			<h2>Modify your account</h2>
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
				 <div class="btn-group" data-toggle="buttons-radio">
					<button class="btn active" href="#tab1" data-toggle="tab">Products</button>
					<button class="btn" href="#tab2" data-toggle="tab">Purchased</button>
				  </div>
				  <div class="tab-content">
					<div class="tab-pane active" id="tab1">
						<table class="table-striped" id="products">
							  <tbody>
								<? for($i = 0; $i < 100; $i++) { ?>
									<tr>
									  <td><img class="thumbnails" src="/img/motta.png"/></td>
									  <td>
									  	<p class="date">Image of Cats</p>
										<p class="uploaded">Cats.png</p>
									  </td>
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
				<div id="topInfo">
					<div id="productName"> 
						<h2>Image of Cats</h2>
					</div>
					<div id="fileName">
						<h3>Cats.png</h3>
					</div>
					<div id="Category"> 
						<h4>Photographs</h4>
					</div>
					<div id="Price">
						<h3>$2.00</h3>
					</div>
				</div>
					<div class="imgDiv">
						<img src="/img/motta.png"/>
					</div>
					
					<div id="shareInfo"
						<hr id="rightDivhr2">
						<a href="http://twitter.com"> <img src="/img/twitter.png" id="twitter"/> </a>
						<a href="http://facebook.com"> <img src="/img/Facebook.png" id="facebook"/> </a>
						<input id="productURL" rel="tooltip" data-original-title="Click to copy the link to your clipboard!" type="text" readonly="readonly" name="FirstName" value="www.product.co"/>
				</div>
				<div class="tableDiv">
					<table class="productInfo">
						<? switch($catagory) {	// different HTML for different catagory of files
							case 'photo': ?>
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
						<? break; ?>
						<? case 'art': ?>
							<tr>
								<td id="left">Camera Type</td>
								<td id="right">Nikon</td>
							</tr>
						<? break; ?>
						<? case 'music': ?>
							<tr>
								<td id="left">Camera Type</td>
								<td id="right">Nikon</td>
							</tr>
						<? break; ?>
						<? case 'book': ?>
							<tr>
								<td id="left">Camera Type</td>
								<td id="right">Nikon</td>
							</tr>
						<? break; ?>
						<? case 'document': ?>
							<tr>
								<td id="left">Camera Type</td>
								<td id="right">Nikon</td>
							</tr>
						<? break; ?>
						<? case 'video': ?>
							<tr>
								<td id="left">Camera Type</td>
								<td id="right">Nikon</td>
							</tr>
						<? break; ?>
						<? } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	
