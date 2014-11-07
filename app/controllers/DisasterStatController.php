<?php

class DisasterStatController extends BaseController {
	public $categories = ['Meninggal', 'Luka', 'Hilang', 'Menderita', 'Mengungsi'];
	public $disasters = [];

	public function __construct()
	{
		$result = DisasterStat::all();

		foreach ($result as $value) {
			$this->disasters[] = $value->Kejadian;
		}

	}

	public function getIndex(){
		return View::make('disaster_stat.index')->with('categories', $this->disasters);
	}

	public function getDisasters(){
		return Response::json(['disasters' => $this->disasters]);
	}

	public function getTimeline(){
		return Response::json(DisasterTimeline::all());
	}

	public function getBencana(){		
		$series = [];
		$result = DisasterStat::all();

		if (Input::get('type') == 'korban') {
			foreach ($result as $value) {
				$data['name'] = $value->Kejadian;
				$data['data'] = [];
				$data['data'][] = $value->Meninggal;
				$data['data'][] = $value->Luka;
				$data['data'][] = $value->Hilang;
				$data['data'][] = $value->Menderita;
				$data['data'][] = $value->Mengungsi;
				$series[] = $data;
			}
			return Response::json(['categories' => $this->categories, 'series' => $series]);
		} else if (Input::get('type') == 'kerugian') {
			foreach ($result as $value) {
				$data['name'] = $value->Kejadian;
				$data['data'] = [];
				$data['data'][] = $value->Kerugian;
				$series[] = $data;
			}
			return Response::json(['categories' => ['kerugian'], 'series' => $series]);
		} else {
			return Response::json(['error' => 'invalid input type']);
		}
	}
}
