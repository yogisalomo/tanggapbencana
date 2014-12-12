<?php
class SMS extends Eloquent {
	private $API_URL = 'https://api.twilio.com/2010-04-01/Accounts/AC17184cedf0246af21424ebe4a6a2048c/Messages.json';
	private $API_AUTH = 'AC17184cedf0246af21424ebe4a6a2048c:3ce905ab2880d0e46879f527146d2401';

	protected $table = 'smses';
	public $fillable = [
		'nama_disaster',
		'longitude',
		'lattitude',
		'judul_laporan',
		'isi_laporan',
	];

	public function send($body) {
		$TO = '+628561435232';
		$FROM = '+12027596195';
		$eksekusi = "curl -X POST '".$this->API_URL."' --data-urlencode 'To=".$TO."' --data-urlencode 'From=".$FROM."' --data-urlencode 'Body=".$body."' -u ".$this->API_AUTH;
		var_dump($eksekusi);
		$output = shell_exec($eksekusi);
		return $output;
	}

	public function recvToDB() {
		$output = shell_exec("curl -X GET '".$this->API_URL."' -u ".$this->API_AUTH);
		$hasil_json = json_decode($output);

		if ($hasil_json == NULL) exit("Can't contact server");
		$this->truncate();

		foreach ($hasil_json->messages as $row) {
			$temp = [];
			if ($row->status == "received") {
				$parsed = $this->parseCommand($row->body);
				$this->insertDB($parsed);
			}
		}
	}


	public function parseCommand($text){
		$ex = explode('_',$text);

		$hasil['nama_disaster'] = array_pull($ex, 0);
		$hasil['longitude'] = array_pull($ex, 1);
		$hasil['lattitude'] = array_pull($ex, 2);
		$hasil['judul_laporan'] = array_pull($ex, 3);
		$hasil['isi_laporan'] = array_pull($ex, 4);

		return $hasil;
		
	}
	public function insertDB($arr){
			$this->insert($arr);
	}
}