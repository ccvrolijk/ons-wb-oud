<?php
header("Cache-Control: no-cache, no-store");
print "<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\">
	<tr><td align=\"center\"><strong>Attribute</strong></td><td align=\"center\"><strong>Value</strong></td></tr>
	<tr><td>IP Address (either v4 of v6)</td><td>".$_SERVER['REMOTE_ADDR']."</td></tr>
	<tr><td>Hostname</td><td>".gethostbyaddr($_SERVER['REMOTE_ADDR'])."</td></tr>
	<tr><td>X-Forwarded-For IP Address(es)</td><td>".$_SERVER['HTTP_X_FORWARDED_FOR']."&nbsp;</td></tr>
	<tr><td>Port</td><td>".$_SERVER['REMOTE_PORT']."</td></tr>
	<tr><td>Browser (User Agent)</td><td>".$_SERVER['HTTP_USER_AGENT']."</td></tr>
	<tr><td>Request Time (Unixtime)</td><td>" .$_SERVER['REQUEST_TIME'] ."</td></tr>
	<tr><td>Request Time</td><td>" .date("d.m.Y H:i:s",$_SERVER['REQUEST_TIME']) ."</td></tr>
	<tr><td>Copyright</td><td><a href=\"http://ons-wb.nl/ip.php\">http://ons-wb.nl/ip.php</a></td></tr>
</table>";
?>
