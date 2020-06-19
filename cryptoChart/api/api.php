<?php

//Cryptocurrencychart API stuff.
declare(strict_types=1);
use CryptoCurrencyChart\API\Client;
require 'src/autoload.php';

$client= new Client('84734f7927147dea288e6a2583688421', 'd2df01905a422eb006e744dc853c1bd0');

//Get all available crypto coins. Then loop through them until we get bitcoin and ether id.
$coins = $client->getCoins();
$BTC= 0;
$ETH= 0;
$USDT= 0;
$XRP= 0;
foreach ($coins as $coin){

  if ($coin->symbol == 'BTC'){
    $BTC= $coin->id;
  }
  if ($coin->symbol == 'ETH'){
    $ETH= $coin->id;
  }
  if ($coin->symbol == 'USDT'){
    $USDT= $coin->id;
  }
  if ($coin->symbol == 'XRP'){
    $XRP= $coin->id;
  }

}
	//Make a "viewCoinHistory" API request to https://cryptocurrencychart.com/api/coin/history
	$BTCcoinHistory = $client->viewCoinHistory($BTC, new DateTime('-60 days'), new DateTime('now'), 'price', 'EUR');
	$ETHcoinHistory= $client->viewCoinHistory($ETH, new DateTime('-60 days'), new DateTime('now'), 'price', 'EUR');
	$USDTcoinHistory= $client->viewCoinHistory($USDT, new DateTime('-60 days'), new DateTime('now'), 'price', 'EUR');
	$XRPcoinHistory= $client->viewCoinHistory($XRP, new DateTime('-60 days'), new DateTime('now'), 'price', 'EUR');

	$btc_price_chart= array();
	$btc_date_chart_label= array();
	$eth_price_chart= array();
	$eth_date_chart_label= array();
	$usdt_price_chart= array();
	$usdt_date_chart_label= array();
	$xrp_date_chart_label= array();
	$xrp_price_chart= array();

	//Loop trough the API results and asign custom variables to the price and the dates.
	foreach ($BTCcoinHistory->data as $results) {
		$btc_price= $results->value;
		$btc_date= $results->date;

		array_push($btc_price_chart, $btc_price);
		array_push($btc_date_chart_label, $btc_date);
	}
	foreach ($ETHcoinHistory->data as $results){
		$eth_price= $results->value;
		$eth_date= $results->date;

		array_push($eth_price_chart, $eth_price);
		array_push($eth_date_chart_label, $eth_date);
	}
	foreach ($USDTcoinHistory->data as $results){
                $usdt_price= $results->value;
                $usdt_date= $results->date;

                array_push($usdt_price_chart, $usdt_price);
                array_push($usdt_date_chart_label, $usdt_date);
        }
	foreach ($XRPcoinHistory->data as $results){
                $xrp_price= $results->value;
                $xrp_date= $results->date;

                array_push($xrp_price_chart, $xrp_price);
                array_push($xrp_date_chart_label, $xrp_date);
        }


//Once we've got the data, we push it to MySQL.
addChartDataToDb($btc_price_chart, $btc_date_chart_label, 'btc');
addChartDataToDb($eth_price_chart, $eth_date_chart_label, 'eth');
addChartDataToDb($usdt_price_chart, $usdt_date_chart_label, 'usdt');
addChartDataToDb($xrp_price_chart, $xrp_date_chart_label, 'xrp');

function addChartDataToDb($data, $label, $table){
	$userdb ='root';
        $passdb= 'vialactea';
        $dbname= 'charts';
        $con= mysqli_connect("localhost", $userdb, $passdb, $dbname);
        if (!$con) {die("Connection failed: " . mysqli_connect_error());}

	//Serialize the arrays
	$serialized_data= serialize($data);
	$serialized_labels= serialize($label);

	$query= "INSERT INTO $table(data, labels) VALUES ('$serialized_data','$serialized_labels') ON DUPLICATE KEY UPDATE data='$serialized_data', labels='$serialized_labels'";
	if(mysqli_query($con, $query)){
    		echo "Records added successfully.";
	} else{
    		echo "ERROR: Could not able to execute query. " . mysqli_error($con);
	}

}
?>

