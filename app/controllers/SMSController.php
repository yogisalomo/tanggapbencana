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

	public function recvSync() {
		$this->SMS->recvToDB();
	}
	
	public function recv(){
		/* Get received messages */
		$data['res'] = $res;
		return View::make('SMS.recv',$data);
	}

	public function insert() {
		$arr['nama_disaster'] = "gunung meletus";
		$arr['longitude'] = "107.9";
		$arr['lattitude'] = "-62.7";
		$arr['judul_laporan'] = "Butuh makanan";
		$arr['isi_laporan'] = "Butuh Indomie gan";
		$this->SMS->insert($arr);
	}
}