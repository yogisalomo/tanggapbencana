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

		foreach ($hasil_json->messages as $row) {
			$temp = [];
			if ($row->status == "received") {
				$this->insert($this->parseCommand($row->body));
			}
		}
	}


	public function parseCommand($text){
		$ex = explode('_',$text);

		$hasil['nama_disaster'] = "-";
		$hasil['longitude'] = "-1";
		$hasil['lattitude'] = "-1";
		$hasil['judul_laporan'] = "-";
		$hasil['isi_laporan'] = "-";

		if (isset($ex[0]) || array_key_exists(0, $ex)) $hasil['nama_disaster'] = $ex[0];
		if (isset($ex[1]) || array_key_exists(1, $ex)) $hasil['longitude'] = $ex[1];
		if (isset($ex[2]) || array_key_exists(2, $ex)) $hasil['lattitude'] = $ex[2];
		if (isset($ex[3]) || array_key_exists(3, $ex)) $hasil['judul_laporan'] = $ex[3];
		if (isset($ex[4]) || array_key_exists(4, $ex)) $hasil['isi_laporan'] = $ex[4];

		return $hasil;
		
	}
	public function insert($arr){
			$this->fill($arr);
			$this->save();
	}
}