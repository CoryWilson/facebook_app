<?
	for($i=0; $i<count($par2); $i++){
		$title = $par2[$i]['title'];
		$image = $par2[$i]['image'];
		$desc = $par2[$i]['description'];
	}
	
?>

<div class="entry small-11 small-centered medium-11 medium-centered large-11 large-centered columns">

	<div class="row">
		<h1><?= $title ?></h1>
	</div>
	<div class="row">
		<div class="slider">
			<? for($i=0; $i<count($par2); $i++){
					$image = $par2[$i]['image']; ?>
    			<div><img src="<?= $image ?>" /></div>
			<? } ?>
			<? for($i =0; $i<4; $i++){ 
    		   $link = $par3['photos']['photo'][$i]["url_l"]; ?>
    		   <div><img src="<?= $link ?>" /></div>
    		<? } ?>
		</div>
	</div>
	<div class="row">
		<p><?= $desc ?></p>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.slider').slick({
			dots: true,
			infinite: true,
			arrows: true,
			autoplay: true,
			speed: 300
		});
	});
</script>

