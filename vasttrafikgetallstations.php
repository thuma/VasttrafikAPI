<?php
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

// Loop thrue all the data:
foreach($allvtstops->LocationList->StopLocation as $key => $stop)
	{

	}

?>