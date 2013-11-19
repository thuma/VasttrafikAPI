<?php
$all = json_decode(file_get_contents('complete-gtfs.json'));
$allout = array();

foreach($all as $key => $stop)
	{
		$pos = new stdClass();
		$pos->lat = $stop->lat;
		$pos->long = $stop->lon;
		$coord = new stdClass();
		$coord->wgs84 = $pos;
		$astop = new stdClass;
		$astop->name = $stop->name;
		$astop->id = $stop->id;
		if(substr($astop->id,-1)==0){
			$astop->type = "STOP_AREA";
		}
		else{
			$astop->type = "STOP_POINT";
			if(isset($stop->track)){
				$astop->track = $stop->track;
			}
			else{
				$astop->track = false;
			}
		}
		$astop->position = $coord;
		$astop->gtfs = $stop->gtfs;
		$allout[] = $astop;
		
	}
file_put_contents('coord-gtfs.json',json_encode($allout));
?>
