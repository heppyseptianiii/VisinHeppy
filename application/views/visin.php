<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Visin Google Charts</title>
<link rel="stylesheet" href="<?php echo base_url('vendor/uikit/css/'); ?>uikit.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Mengambil API visualisasi.
    google.charts.load('current', {'packages':['corechart']});
    google.charts.load('current', {'packages':['table']});

    google.charts.load('current', {'packages':['gauge']});
    google.charts.load('current', {'packages':['corechart']});
      
    google.charts.setOnLoadCallback(drawTable);
    
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawNos);
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawMultSeries);

    function drawMultSeries() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Waktu Hari');
      data.addColumn('number', 'Tingkat Motivasi');
      data.addColumn('number', 'Tingkat Energi');

      data.addRows([
        [{v: [8, 0, 0], f: '8 am'}, 1, .25],
        [{v: [9, 0, 0], f: '9 am'}, 2, .5],
        [{v: [10, 0, 0], f:'10 am'}, 3, 1],
        [{v: [11, 0, 0], f: '11 am'}, 4, 2.25],
        [{v: [12, 0, 0], f: '12 pm'}, 5, 2.25],
        [{v: [13, 0, 0], f: '1 pm'}, 6, 3],
        [{v: [14, 0, 0], f: '2 pm'}, 7, 4],
        [{v: [15, 0, 0], f: '3 pm'}, 8, 5.25],
        [{v: [16, 0, 0], f: '4 pm'}, 9, 7.5],
        [{v: [17, 0, 0], f: '5 pm'}, 10, 10],
      ]);

      var options = {
        title: 'Motivasi dan Tingkat Energi Sepanjang Hari',
        hAxis: {
          title: 'Waktu Hari',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('4'));

      chart.draw(data, options);
    }


    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('1'));
        chart.draw(data, options);
      }



      function drawTable() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sumatera', 'bandung', 'Yogya', 'Papua ', 'Bali', 'Bogor'],
          ['2004/05',  165,      938,         522,             998,           450,      614.6],
          ['2005/06',  135,      1120,        599,             1268,          288,      682],
          ['2006/07',  157,      1167,        587,             807,           397,      623],
          ['2007/08',  139,      1110,        615,             968,           215,      609.4],
          ['2008/09',  136,      691,         629,             1026,          366,      569.6]
        ]);

        var options = {
          title : 'Produksi Kopi Bulanan menurut Negara',
          vAxis: {title: 'Cangkir'},
          hAxis: {title: 'Bulan'},
          seriesType: 'Bar',
          series: {5: {type: 'garis'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('33'));
        chart.draw(data, options);
      }

      function drawNos() {
        var data = google.visualization.arrayToDataTable([
          ['Tahun', 'Penjualan', 'Penghasilan'],
          ['2018',  1000,      400],
          ['2019',  1170,      460],
          ['2020',  660,       1120],
          ['2021',  1030,      540]
        ]);

        var options = {
          title: 'Kinerja Perusahaan',
          hAxis: {title: 'Tahun',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('10'));
        chart.draw(data, options);
      }


    //mengambil data dari variabel PHP
    var region=[];
    region['dataStr'] = '<?php echo $region;?>';        
    region['dataArray'] = JSON.parse(region['dataStr']);  
    
    //menggambar grafik
    google.charts.setOnLoadCallback(function(){
        drawChart(region['dataArray'], 'pie','region');       
    });

    // Menentukan data yang akan ditampilkan
   

</script>
</head>
<body>
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="#">HEPPY SEPTIANI </a>
        <a class="uk-navbar-item uk-logo" href="#"> 1800016155 </a>
    </div>
</nav>
<div class="uk-container">
    <div class="uk-child-width-1-2@s" uk-grid uk-height-match="target: > div > .uk-card">    
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Diagram Produksi Kopi</h3>
                <div id="33" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Diagram Kinerja Perusahaan</h3>
                <div id="10" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Diagram Aktivitas Harian</h3>
                <div id="1" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Diagram Motivasi dan Tingkat Energi Sepanjang Hari</h3>
                <div id="4" style="height:350px;"></div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('vendor/uikit/js/'); ?>uikit.js"></script>
</body>
</html>