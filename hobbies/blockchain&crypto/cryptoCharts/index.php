<?php
  include('../../../nav.html');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>alvaro de miguel | crypto charts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel= 'stylesheet' href= '/fonts.css'>
    <link rel = 'stylesheet' href = '/home.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  </head>
  <body>

    <!-- main content -->
    <div class='container mt-4'><a href='/'><< </a>/<a href='/hobbies/'>hobbies</a>/  <a href='../'>blockchain&crypto</a>/<a href='./'>cryptoCharts</a>/</div>
    <div class='container-fluid mt-5'>
      <h1 class='display-4 text-center fw-bold mb-5'>cryptocharts</h1>
    </div>

    <div class= 'container-fluid'>
      <div class='row justify-content-center py-5'>
        <div class= 'col-8'>
          <p> Some pretty basic charts of some of my favourite cryptocurrencies. On the y-axis it's displayed the price of the coin, and in the x-axis, the date on which that price was recorded.
        </div>
      </div>
    </div>
    <!-- chart container -->
    <div class='container px-2'>
      <div class='row py-5'>

        <div class='col'>
          <canvas id="btc-chart"></canvas>
          <p id='btc-data' class='ps-5 pt-5'></p>
        </div>
        <div class='col'>
          <canvas id="eth-chart"></canvas>
          <p id='eth-data' class='ps-5 pt-5'></p>
        </div>

      </div>
      <div class='row py-5'>

        <div class='col'>
          <canvas id="bat-chart"></canvas>
          <p id='doge-data' class= 'ps-5 pt-5'></p>
        </div>
        <div class='col'>
          <canvas id="doge-chart"></canvas>
          <p id='bat-data' class='ps-5 pt-5'></p>
        </div>

      </div>
    </div>

    <div class='container my-5'><hr></div>

    <div class= 'container-fluid'>
      <div class='row justify-content-center my-5'>
        <div class= 'col-8'>
          <p>Third party software used in the making of this chart:
            <br>
            <br>
            <b>ChartJS:</b> An open-source javascript library that makes charts, url: <a href='https://chartjs.org'>https://chartsjs.org</a>
            <br>
            <b>CoinGecko:</b> To get the coin prices, they have a really useful api. url: <a href='https://www.coingecko.com/en/api'>https://www.coingecko.com/en/api</a>
          </p>
        </div>
      </div>
    </div>
    <div class='container my-4'><a href='../'><a href='/'><< </a>/<a href='../'>blockchain&crypto</a>/<a href='./'>cryptoCharts</a>/</div>

    <!-- chart scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3/dist/chart.min.js"></script>
    <script>

      window.onload = getChartData;

      // make a chart with the data given.
      function makeChart(dataObject, name, id, lineColor){
        var prices = [], labels = [];

        for (var i in dataObject.prices){

          //push the coin prices to the array.
          prices.push(dataObject.prices[i][1]);

          //push the date of the price to the labels.
          var d = new Date(dataObject.prices[i][0]), day = d.getDate(), month = d.getMonth()+1;
          labels.push(day+'/'+month);

        }

        // make the chart using chartjs.org.
        var myChart = new Chart(name, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: name,
              data: prices,
              backgroundColor: [
                  lineColor
              ],
              borderColor: [
                  lineColor
              ],
              borderWidth: 2
            }]
          },
          options: {
            elements: {
              point: {
                radius: 0
              }
            }
          }
        });

        document.getElementById(id).innerHTML = '<b>volume: </b>'+dataObject.total_volumes[180][1]+' €<br />'+'<b>market cap: </b>'+dataObject.market_caps[180][1]+' €';

      }

      // get the data we need to make the charts and then we call the function makeChart() to make it.
      function getChartData() {

        // we get the bitcoin data and make its chart.
        var btcRequest = new XMLHttpRequest();
        btcRequest.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            makeChart(JSON.parse(this.responseText), 'btc-chart', 'btc-data', '#F7931A');
          }
        };
        btcRequest.open("GET", "https://api.coingecko.com/api/v3/coins/bitcoin/market_chart?vs_currency=eur&days=180&interval=daily", true);
        btcRequest.send();

        //get the etherum data and make its chart.
        var ethRequest = new XMLHttpRequest();
        ethRequest.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            makeChart(JSON.parse(this.responseText), 'eth-chart', 'eth-data', '#222222');
          }
        };
        ethRequest.open("GET", "https://api.coingecko.com/api/v3/coins/ethereum/market_chart?vs_currency=eur&days=180&interval=daily", true);
        ethRequest.send();

        //get the bat data and make its chart.
        var batRequest = new XMLHttpRequest();
        batRequest.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            makeChart(JSON.parse(this.responseText), 'bat-chart', 'bat-data', '#274058');
          }
        };
        batRequest.open("GET", "https://api.coingecko.com/api/v3/coins/basic-attention-token/market_chart?vs_currency=eur&days=180&interval=daily", true);
        batRequest.send();

        //get the dogecoin data and make its chart.
        var dogeRequest = new XMLHttpRequest();
        dogeRequest.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            makeChart(JSON.parse(this.responseText), 'doge-chart', 'doge-data', '#BA9F33');
          }
        };
        dogeRequest.open("GET", "https://api.coingecko.com/api/v3/coins/dogecoin/market_chart?vs_currency=eur&days=180&interval=daily", true);
        dogeRequest.send();

      }

    </script>
  </body>
</html>
