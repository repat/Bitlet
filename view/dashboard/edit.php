<div id="EditModal" class="modal hide fade">
	<div class="modal-header">
		<button class="close" data-dismiss="modal">x</button>
		<h3>Edit File Details</h3>
	</div>
	<? // dialog contents ?>
    <div class="modal-body">
		<form class="form-horizontal editForm">
			<div class="control-group">
				<label class="control-label" for="nameInput">Name</label>
				<div class="controls">
					<input type="text" class="input-large" id="nameInput">
					<span class="help-inline">Name that describes the file</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="priceInput">Price</label>
				<div class="controls">
					<input type="text" class="input-large" id="priceInput">
					<span class="help-inline">How much you are selling it for</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="priceInput">Catagory</label>
				<div class="controls">
					<select id="catagoryInput">
						<option>Image</option>
						<option>Ebook</option>
						<option>Video</option>
						<option>Document</option>
						<option>Generic</option>
					</select>
					<span class="help-inline">Catagory that describes your file</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="descrInput">Description</label>
				<div class="controls">
					<textarea type="text" class="input-large" id="descrInput"></textarea>
				</div>
			</div>

			<? // catagory specific parameters ?>
			<div id="catagoryParam">
				<div class="control-group">
					<label class="control-label" for="priceInput">Price</label>
					<div class="controls">
						<input type="text" class="input-large" id="priceInput">
						<span class="help-inline">How much you are selling it for</span>
					</div>
				</div>
			</div>
		</form>
	</div>
	<? // dialog buttons ?>
    <div class="modal-footer">
		<a href="#" class="btn primary">Done</a>
	</div>
</div>

