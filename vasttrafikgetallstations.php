<?php

require_once dirname(__FILE__) . '/gtfs-stop-reader/getstopname.php';

// Key from http://labs.vasttrafik.se:

$key = "";
$vtfile = 'fromvasttrafik.json';

// Get all the data if it does not exist:
if(is_file($vtfile) == FALSE)
	{
	file_put_contents($vtfile, file_get_contents('http://api.vasttrafik.se/bin/rest.exe/v1/location.allstops?authKey='.$key.'&format=json'));
	}

// Load the data into a object:
$allvtstops = json_decode(file_get_contents($vtfile));
$finallist = array();
// Loop thrue all the data:
foreach($allvtstops->LocationList->StopLocation as $key => $stop)
	{
		if(isset($stop->gtfs) == FALSE OR $stop->gtfs->id == NULL){
			print "\n". $stop->name.' - > ';
			$gstop = getClosestStation(floatval($stop->lat),floatval($stop->lon));
			$stop->gtfs = new stdClass;
			$stop->gtfs->id = $gstop->stop_id;
			$stop->gtfs->name = $gstop->stop_name;
			$stop->gtfs->lat = $gstop->stop_lat;
			$stop->gtfs->long = $gstop->stop_lon;
			print $gstop->stop_name;
			$finallist[] = $stop;
		}
	}
file_put_contents('complete-gtfs.json',json_encode($finallist));
?>