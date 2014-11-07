<?php

App::bind('SMS','SMS');

class SMSController extends BaseController {
	private $API_URL = 'https://api.twilio.com/2010-04-01/Accounts/AC17184cedf0246af21424ebe4a6a2048c/Messages.json';
	private $API_AUTH = 'AC17184cedf0246af21424ebe4a6a2048c:3ce905ab2880d0e46879f527146d2401';
	private $SMS; //ngeload Model SMS

	public function __construct(SMS $SMS){
		$this->SMS = $SMS;
	}

	public function send($body) {
		$res = $this->SMS->send($body);
		var_dump($res);
	}

	public function recv(){
		/* Get received messages */
		$res = $this->SMS->recv();
		var_dump($res);
	}
}