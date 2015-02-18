<?
	$title = $par2[0]['title'];
	$image = $par2[0]['image'];
	$desc = $par2[0]['description'];
?>


<div class="entry small-11 small-centered medium-11 medium-centered large-11 large-centered columns">
	<div class="row">
		<h1><?= $title ?></h1>
	</div>
	<div class="row">
		<div class="slider">
			<div><img src="<?= $image ?>" /></div>
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

