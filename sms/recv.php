<?php
$output = shell_exec("curl -X GET 'https://api.twilio.com/2010-04-01/Accounts/AC17184cedf0246af21424ebe4a6a2048c/Messages.json' -u AC17184cedf0246af21424ebe4a6a2048c:3ce905ab2880d0e46879f527146d2401");
$hasil_json = json_decode($output);

foreach ($hasil_json->messages as $row) {
	var_dump($row);
}
?>