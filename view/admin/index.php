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
			<div class="sideData" id="number0fSales">18</div>
			<div class="sideDataText" id="salesText">Total Sales</div>
				<div class="sideData" id="dollars">500</div>
			<div class="sideDataText" id="dollarsText">Total Dollars</div>
		</div>
		<div class= "sidebar-div">
			<div class="tablediv">
					<div class="tabbable"> 
					  <ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab" id="tab">Purchases</a></li>
						<li><a href="#tab2" data-toggle="tab">Sales</a></li>
						<li><a href="#tab3" data-toggle="tab">Analytics</a></li>
					  </ul>
						  <div class="tab-content">
							<div class="tab-pane active" id="tab1">
					<table  class="table table tablebar" style="text-align:left" cellpadding"10px" > 
						<tr> 
							<td>Lala</td> 
							<td>lala</td>
							<td> <button class="btn btn-small btn-primary">Download</button>
							</td>
							<td> 
								www.cats.com
								<img id="twitter" src="/img/twitter.png"/>
								<img id="facebook" src="/img/facebook.png"/>
							</td>
						
						</tr> 
						<tr> 
							<td>Lala</td> 
							<td>lala</td>
							<td> <button class="btn btn-small btn-primary">Download</button>
							</td>
							<td> 
								<img id="twitter" src="/img/twitter.png"/>
								<img id="facebook" src="/img/facebook.png"/>
							</td>
							
						</tr> 
						<tr> 
							<td>Lala</td> 
							<td>lala</td>
							<td><button class="btn btn-small btn-primary">Download</button>
							</td>
							<td> 
								<img id="twitter" src="/img/twitter.png"/>
								<img id="facebook" src="/img/facebook.png"/>
							</td>
							
						</tr> 
						<tr> 
							<td>Lala</td> 
							<td>lala</td>
							<td><button class="btn btn-small btn-primary">Download</button>
							</td>
							<td> 
								<img id="twitter" src="/img/twitter.png"/>
								<img id="facebook" src="/img/facebook.png"/>
							</td>
							
						</tr> 
					</table>
				</div>
				<div class="tab-pane" id="tab2">
					<table  class="table table tablebar" style="text-align:left" cellpadding"10px" > 
		
						<tr> 
							<td>Lala</td> 
							<td>lala</td>
							<td>http://ilovecats.com</td>
							<td> 
								<img id="twitter" src="/img/twitter.png"/>
								<img id="facebook" src="/img/facebook.png"/>
							</td>
						</tr> 
						<tr> 
							<td>Lala</td> 
							<td>lala</td>
							<td>http://ilovecats.com</td>
							<td><img id="twitter" src="/img/twitter.png"/>
								<img id="facebook" src="/img/facebook.png"/></td>
						</tr> 
						<tr> 
							<td>Lala</td> 
							<td>lala</td>
							<td>http://ilovecats.com</td>
							<td><img id="twitter" src="/img/twitter.png"/>
								<img id="facebook" src="/img/facebook.png"/></td>
						</tr> 
						<tr> 
							<td>Lala</td> 
							<td>lala</td>
							<td>http://ilovecats.com</td>
							<td><img id="twitter" src="/img/twitter.png"/>
								<img id="facebook" src="/img/facebook.png"/></td>
						</tr> 
					</table>
				</div>
			  </div>
			</div>
		</div>
	</div>
	<div id="shadow"></div>
	<div class="rightSideDiv"></div>
</div>
	
