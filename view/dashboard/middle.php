<div class= "centerDiv">
	<button class="btn btn-success" id="newProduct">Add a Product </button>
	<div class="tabbable">
		 <div class="btn-group" data-toggle="buttons-radio">
			<button class="btn active" href="#tab1" data-toggle="tab">Products</button>
			<button class="btn" href="#tab2" data-toggle="tab">Purchases</button>
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
<div id="divShadow"></div>
