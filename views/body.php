<div class="body small-11 small-centered medium-10 medium-centered large-8 large-centered columns">
	
		<? 
			foreach($par2 as $users){
				?><div class="row">
					<div class="small-7 small-centered columns">
						<h4 class="left"><? echo $users["username"];?></h4>
						<div class="right">
							<?
								echo " <a href='?controller=home&action=updateForm&id=".$users["id"]."'><button class='tiny info'>Update</button></a>";
								echo " <a href='?controller=home&action=delete&id=".$users["id"]."'><button class='tiny alert'>Delete</button></a>";
							?>
						</div>
					</div>
				</div>
				<?
			}
		?>
</div>
