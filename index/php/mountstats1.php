<?php
$ug_url = 'http://media1.onswestbrabant.nl:8000/status.xsl';
$ug_content = file_get_contents($ug_url);
$ug_first_step = explode( '<h3 class="mount">Mount Point /OWBLiveMP3</h3>' , $ug_content );
//$ug_second_step = explode( '</div><!-- .entry-content -->' , $ug_first_step[1] );
//$ug_third_step = explode( 'toggleDuration: true,' , $ug_second_step[0] );
//$ug_fourth_step = explode( '</script>' , $ug_third_step[1] );
$uitzendinggemist = $ug_first_step[1];

?>
<!doctype html>
<html>
	<head>
		<title>Icecast Mount Stats</title>
		<style>
			#footer { display:none; }
			#playlists { width:600px; left:0px; top:270px; position:absolute; }
		</style>
	</head>
	<body>
		<h1>Ons West Brabant Radio stream stats</h1>
		<div id="playlists">
			<?php echo $uitzendinggemist; ?>
	 	</div>
	 </body>
</html>