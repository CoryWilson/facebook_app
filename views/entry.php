<div class="entry small-11 small-centered medium-11 medium-centered large-11 large-centered columns">
	<div class="row">
		<h1>$par2</h1><? var_dump($par2) ?>
	</div>
	<div class="row">
		<h1>$par3</h1><? var_dump($par3) ?>
	</div>
	<div class="row">
		<h1><?= $par2["title"] ?></h1>
	</div>
	<div class="row">
		<div class="slider">
			<div><img src="img/lights.jpg"/></div>
			<div><img src="img/manhattan.jpg"/></div>
			<div><img src="img/china.jpg"/></div>
		</div>
	</div>
	<div class="row">
		<p><?= $par2["description"] ?></p>
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

