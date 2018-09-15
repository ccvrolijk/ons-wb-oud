<?php
$data = new DOMDocument(); $data->load('http://media1.onswestbrabant.nl:8000/OWBLiveMP3.xspf'); 

if($data->load("http://media1.onswestbrabant.nl:8000/OWBLiveMP3.xspf")) { 
    foreach ($data->getElementsByTagName('trackList') as $track) { 
        $stats = $track->getElementsByTagName('annotation')->item(0)->nodeValue;
        $lines = preg_split('/\R/', $stats); 
    } 
  }
$line2 = explode(':', $lines[2]);
$line3 = explode(':', $lines[3]);
$line4 = explode(':', $lines[4]);
?>
  
<doctype html>
<html>
	<body>
		<h3>Stream 1</h3>
		<table>
			<tr>
			<tr>
				<td>Content Type:</td>
				<td><?php echo $line2[1]; ?></td>
			</tr>
			<tr>
				<td>Huidig aantal luisteraars:</td>
				<td><?php echo $line3[1]; ?></td>
			</tr>
			<tr>
				<td>Maximaal aantal luisteraars:</td>
				<td><?php echo $line4[1]; ?></td>
			</tr>
		<table>
	</body>
</html>
