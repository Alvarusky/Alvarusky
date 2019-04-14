mirabalPass();
function mirabalPass() {

  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var v2, v3, v4, v5, v7, v8;

  calc = (200*day)+(3*month);
  v2 = 20000 + calc;
  v3 = 30000 + calc;
  v4 = 40000 + calc;
  v5 = 50000 + calc;
  v7 = 70000 + calc;
  v8 = 80000 + calc;

  document.getElementById('v2').innerHTML = v2;
  document.getElementById('v3').innerHTML = v3;
  document.getElementById('v4').innerHTML = v4;
  document.getElementById('v5').innerHTML = v5;
  document.getElementById('v7').innerHTML = v7;
  document.getElementById('v8').innerHTML = v8;
}
