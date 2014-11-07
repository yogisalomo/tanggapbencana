<?php
class SMSController extends BaseController {
	private $API_URL = 'https://api.twilio.com/2010-04-01/Accounts/AC17184cedf0246af21424ebe4a6a2048c/Messages.json';
	private $API_AUTH = 'AC17184cedf0246af21424ebe4a6a2048c:3ce905ab2880d0e46879f527146d2401';
	public function __construct(){

	}

	public function send($body) {
		$TO = '+628561435232';
		$FROM = '+12027596195';
		$output = shell_exec("curl -X POST '".$this->API_URL."' --data-urlencode 'To=".$TO."' --data-urlencode 'From=".$FROM."' --data-urlencode 'Body=".$body."' -u ".$this->API_AUTH);
		var_dump($output);
	}

	public function recv(){
		/* Get received messages */
		$output = shell_exec("curl -X GET '".$this->API_URL"' -u ".$this->API_AUTH);
		$hasil_json = json_decode($output);

		foreach ($hasil_json->messages as $row) {
			var_dump($row);
		}
	}
}