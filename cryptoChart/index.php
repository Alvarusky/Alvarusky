<?php
include "/config.php";
session_start();
// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: /login.php');
}

/* CREATE CHARTS */

	//Add PHPChartJS stuff.
	require_once 'vendor/autoload.php';
	use Halfpastfour\PHPChartJS\Factory;


	//Get cached chart data from MySQL.
	function getCachedChartData($data, $labels, $table){
		$userdb ='root';
        	$passdb= 'vialactea';
        	$dbname= 'charts';
        	$con= mysqli_connect("localhost", $userdb, $passdb, $dbname);

        	$sql = mysqli_query($con,"SELECT * FROM $table");
        	$unserialized_data;
        	$unserialized_labels;
        	if (mysqli_num_rows($sql) > 0) {
                	while($row =mysqli_fetch_assoc($sql)){
                        	$data = unserialize($row['data']);
                        	$labels= unserialize($row['labels']);
                	}
        	}
		mysqli_close($con);
		return array($data, $labels);
	}

	//Get data and labels for each coin.
	list($btc_data, $btc_labels) = getCachedChartData($btc_data, $btc_labels, 'btc');
	list($eth_data, $eth_labels)= getCachedChartData($eth_data, $eth_labels, 'eth');
	list($usdt_data, $usdt_labels)= getCachedChartData($usdt_data, $usdt_labels, 'usdt');
	list($xrp_data, $xrp_labels)= getCachedChartData($xrp_data, $xrp_labels, 'xrp');

	//Create the BTC chart using PHPChartJS.
        $factory= new Factory();
        $btc_line = $factory->create($factory::LINE);
        $btc_line->setId('btcChart');

        //Set labels.
        $btc_line->labels()->exchangeArray($btc_labels);

        //Then add datasets
        $btc_dataSet = $btc_line->createDataSet();
        $btc_dataSet->setLabel('BTC')
                 ->setFill(false)
                ->setLineTension(0.1)
                ->setBackgroundColor('rgba(247,147,26,0.4)')
                ->setBorderColor('rgba(247,147,26,1)')
                ->setBorderCapStyle('butt')
                ->setBorderDash([])
                ->setBorderDashOffset(0.0)
                ->setBorderJoinStyle('miter')
                ->setPointBorderColor('rgba(247,147,26,1)')
                ->setPointBackgroundColor('rgba(247,147,26,0.7)')
                ->setPointBorderWidth(1)
                ->setPointHoverRadius(5)
                ->setPointHoverBackgroundColor('rgba(247,147,26,1)')
                ->setPointHoverBorderColor('rgba(220,220,220,1)')
                ->setPointHoverBorderWidth(2)
                ->setPointRadius(1)
                ->setPointHitRadius(10)
                ->setSpanGaps(false)
                ->data()->exchangeArray($btc_data);
        $btc_line->addDataSet($btc_dataSet);


	//Then create the ETH chart
        $eth_line = $factory->create($factory::LINE);
        $eth_line->setId('ethChart');

        //Set labels.
        $eth_line->labels()->exchangeArray($eth_labels);

        //Then add datasets
        $eth_dataSet = $eth_line->createDataSet();
        $eth_dataSet->setLabel('ETH')
                 ->setFill(false)
                ->setLineTension(0.1)
                ->setBackgroundColor('rgba(68,67,65,0.4)')
                ->setBorderColor('rgba(68,67,65,1)')
                ->setBorderCapStyle('butt')
                ->setBorderDash([])
                ->setBorderDashOffset(0.0)
                ->setBorderJoinStyle('miter')
                ->setPointBorderColor('rgba(68,67,65,1)')
                ->setPointBackgroundColor('rgba(68,67,65,0.7)')
                ->setPointBorderWidth(1)
                ->setPointHoverRadius(5)
                ->setPointHoverBackgroundColor('rgba(68,67,65,1)')
                ->setPointHoverBorderColor('rgba(220,220,220,1)')
                ->setPointHoverBorderWidth(2)
                ->setPointRadius(1)
                ->setPointHitRadius(10)
                ->setSpanGaps(false)
                ->data()->exchangeArray($eth_data);
        $eth_line->addDataSet($eth_dataSet);


	//Then create the USDT chart
        $usdt_line = $factory->create($factory::LINE);
        $usdt_line->setId('usdtChart');

        //Set labels.
        $usdt_line->labels()->exchangeArray($usdt_labels);

        //Then add datasets
        $usdt_dataSet = $usdt_line->createDataSet();
        $usdt_dataSet->setLabel('TETHER')
                 ->setFill(false)
                ->setLineTension(0.1)
                ->setBackgroundColor('rgba(89,162,121,0.4)')
                ->setBorderColor('rgba(89,162,121,1)')
                ->setBorderCapStyle('butt')
                ->setBorderDash([])
                ->setBorderDashOffset(0.0)
                ->setBorderJoinStyle('miter')
                ->setPointBorderColor('rgba(89,162,121,1)')
                ->setPointBackgroundColor('rgba(89,162,121,0.7)')
                ->setPointBorderWidth(1)
                ->setPointHoverRadius(5)
                ->setPointHoverBackgroundColor('rgba(89,162,121,1)')
                ->setPointHoverBorderColor('rgba(220,220,220,1)')
                ->setPointHoverBorderWidth(2)
                ->setPointRadius(1)
                ->setPointHitRadius(10)
                ->setSpanGaps(false)
                ->data()->exchangeArray($usdt_data);
        $usdt_line->addDataSet($usdt_dataSet);

	//Then create the XRP chart
        $xrp_line = $factory->create($factory::LINE);
        $xrp_line->setId('xrpChart');

        //Set labels.
        $xrp_line->labels()->exchangeArray($usdt_labels);

        //Then add datasets
        $xrp_dataSet = $xrp_line->createDataSet();
        $xrp_dataSet->setLabel('RIPPLE')
                 ->setFill(false)
                ->setLineTension(0.1)
                ->setBackgroundColor('rgba(88,166,208,0.4)')
                ->setBorderColor('rgba(88,166,208,1)')
                ->setBorderCapStyle('butt')
                ->setBorderDash([])
                ->setBorderDashOffset(0.0)
                ->setBorderJoinStyle('miter')
                ->setPointBorderColor('rgba(88,166,208,1)')
                ->setPointBackgroundColor('rgba(88,166,208,0.7)')
                ->setPointBorderWidth(1)
                ->setPointHoverRadius(5)
                ->setPointHoverBackgroundColor('rgba(88,166,208,1)')
                ->setPointHoverBorderColor('rgba(220,220,220,1)')
                ->setPointHoverBorderWidth(2)
                ->setPointRadius(1)
                ->setPointHitRadius(10)
                ->setSpanGaps(false)
                ->data()->exchangeArray($xrp_data);
        $xrp_line->addDataSet($xrp_dataSet);

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset= 'utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Add jQuery, bootstrap and custom fonts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel= 'stylesheet' href= '/fonts.css'>
    <link rel= 'stylesheet' href= 'cryptoChart.css'>

    <title>CryptoChart | Alvarusky</title>

  </head>
  <body class= 'pt-5'>

    <!-- Navigation Bar -->
    <nav class= 'navbar navbar-expand-md fixed-top navbar-dark bg-dark'>
      <a class= 'navbar-brand' href='/home'>
        <img src= '/images/logo.jpeg' width= '30' height= '30' alt='' loading='lazy'>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class= 'collapse navbar-collapse' id= 'navbarTogglerDemo02'>
        <div class='navbar-nav mr-auto openSans'>
          <a class= 'nav-item nav-link mx-3' href = '/home/'>Home</a>
          <a class= 'nav-item nav-link mx-2' href = '#'>DHT11-T&H</a>
          <a class= 'nav-item nav-link mx-2' href = '#'>MirabalPass</a>
          <a class= 'nav-item nav-link mx-2 active' href = '#'>CryptoCharts</a>
        </div>
        <div class= 'navbar-nav ml-auto openSans'>
          <a class= 'nav-item nav-link mx-2'  href = '/about'>About</a>
          <span class= 'navbar-text mx-2'>|</span>
          <a class= 'nav-item nav-link mx-2' href= '#' data-toggle='modal' data-target= '#logoutModal'>Log Out</a>
        </div>
      </div>
    </nav>


    <!-- Log Out modal -->
    <div class= 'modal fade' id= 'logoutModal' tabindex= '-1' role= 'dialog' aria-labelledby= 'logoutModalLabel' aria-hidden= 'true'>
      <div class= 'modal-dialog'>
        <div class= 'modal-content bg-dark'>
          <div class= 'modal-header'>
            <h4 class= 'modal-title text-white openSans' id= 'logoutModalLabel'>Sign Up</h4>
            <button type= 'button' class= 'close' data-dismiss= 'modal' aria-label= 'Close'> 
              <span aria-hidden= 'true' style= 'color: white'>&times;</span>
            </button>
          </div>
          <div class= 'modal-body'>
            <p class= 'text-white raleway'> Are you sure you wanna log out? You won't be able to see any content published on this page.</p>
            <p class= 'text-white raleway'> Press "Log Out" below to end your current session</p>
          </div>
          <div class= 'modal-footer openSans'>
            <button type= 'button' class= 'btn btn-outline-secondary' data-dismiss= 'modal'>Cancel</button>
            <button type= 'button' class= 'btn btn-light' onclick= 'window.location="/logout.php"'>Log Out</button>
          </div>
        </div>
      </div>
    </div>

    <div class= 'container-fluid mt-5'>
      <h1 class='display-2 text-center openSans'>Crypto Charts</h1>
      <br>
      <hr class= 'my-4 ml-5 mr-5'>
    </div>

      <!-- Chart rows -->
      <div class= 'container pt-5 pb-5'>

	<div class= 'row mt-5 pb-5'>
	  <div class= 'col-md-6'>
            <!-- BTC chart -->
            <?php echo $btc_line->render(true);?></canvas>
	  </div>
	  <div class= 'col-md-6'>
	    <?php echo $eth_line->render(true);?></canvas>
          </div>
	</div>

        <div class= 'row mt-5'>
	  <div class= 'col-md-6'>
	    <?php echo $usdt_line->render(true);?></canvas>
	  </div>
	  <div class= 'col-md-6'>
	    <?php echo $xrp_line->render(true);?></canvas>
	  </div>
	</div>
      </div>

      <div class= 'container pt-5'>
	<p class= 'text-left raleway'><b>See: </b><a href= '/how-to/cryptocharts/'>How I did it</a>.</p>
      </div>

    <!-- ChartJS CDN-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
  </body>
</html>
