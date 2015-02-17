<div class="small-11 small-centered medium-10 medium-centered large-8 large-centered columns">
	<form enctype="multipart/form-data" action="?controller=home&action=createEntry" method="POST">
	  	<div class="row">
			<div class="small-11 small-centered columns">
	  			<input type="text" name="title" placeholder="Title" value="" />
	  		</div>
	  	</div>
		<div class="row">
			<div class="small-11 small-centered columns">
	  			<input type="file" name="image" placeholder="Image" value="" />
	  		</div>
	  	</div>
	  	<div class="row">
			<div class="small-11 small-centered columns">
	  			<textarea name="description" placeholder="Type Description Here" value=""></textarea>
	  		</div>
	  	</div>
	  	<div class="row">
			<button type="submit" class="small-8 small-centered medium-7 large-6 columns">
				Submit
			</button>
		</div>
	</form>
</div>