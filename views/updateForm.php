<div class="small-11 small-centered medium-10 medium-centered large-8 large-centered columns">
<? 
	foreach($par2 as $users){
		?>
		<form action="?controller=home&action=update&id=<?echo $users['id']?>" method="POST">
			<div class="row">
				<div class="small-11 small-centered columns">
					<input type="text" name="username" value="<?echo $users['username']?>" />
				</div>
			</div>
			<div class="row">
				<div class="small-11 small-centered columns">
  					<input type="text" name="password" value="<?echo $users['password']?>" />
  				</div>
  			</div>
			<div class="row">
				<button type="submit" class="small-8 small-centered medium-7 large-6 columns">
					Update User
				</button>
			</div>
		</form>
		<?
	} 
?>
</div>