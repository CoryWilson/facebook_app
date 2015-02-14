<?

	$city = $par2->{'location'}->{'city'};
	$state = $par2->{'location'}->{'state'};

	$weather = $par2->{'current_observation'}->{'weather'};
	$temp_f = $par2->{'current_observation'}->{'temp_f'};
	$humidity = $par2->{'current_observation'}->{'relative_humidity'};
	$wind = $par2->{'current_observation'}->{'wind_string'};

?>
<div class="profile small-11 small-centered medium-10 medium-centered large-8 large-centered columns">
	<div class="row">
		<h1><? echo "Weather Conditions for ".$city.", ".$state; ?></h1>
		<ul>
			<li><? echo "Current Conditions: ".$weather; ?></li>
			<li><? echo "Temperature: ".$temp_f."&deg; F"; ?></li>
			<li><? echo "Humidity: ".$humidity; ?></li>
			<li><? echo "Wind: ".$wind."."; ?></li>
		</ul>
	</div>
</div>