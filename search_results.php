<?php

$gold_data = array(

	"0" => Array (
        "tracking_id" => "MMZ301",
        "name" => "Michael Bruce",
        "designation" => "System Architect"
    ),

    "1" => Array (
        "id" => "MMZ385",
        "name" => "Jennifer Winters",
        "designation" => "Senior Programmer"
    ),

);

//encode json to array.
$json = json_encode(array("data" => $gold_data));

//write json to file.
if (file_put_contents("data.json", $json)) {
	echo "json file created";
}else {
	echo "error in creating json file";
}



   




?>