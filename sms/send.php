
<?php
if (isset($_GET['pesan'])) {
	$body = $_GET['pesan'];
	$output = shell_exec("curl -X POST 'https://api.twilio.com/2010-04-01/Accounts/AC17184cedf0246af21424ebe4a6a2048c/Messages.json' --data-urlencode 'To=+628561435232' --data-urlencode 'From=+12027596195' --data-urlencode 'Body=".$body."' -u AC17184cedf0246af21424ebe4a6a2048c:3ce905ab2880d0e46879f527146d2401");
	var_dump($output);
} else exit("Anda kurang parameter 'pesan'")
?>
