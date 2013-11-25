<?php


// Key from http://labs.vasttrafik.se:

$key = "";
$vtfile = 'complete-gtfs.json';

// Load the data into a object:
$allvtstops = json_decode(file_get_contents($vtfile));

foreach($allvtstops as $key => $stop)
	{
		if(substr($stop->id,-2)=="00"){
			file_put_contents('onefiles/'.$stop->gtfs->id,json_encode($stop));
		}
	}
?>