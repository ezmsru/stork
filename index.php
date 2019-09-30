<!DOCTYPE html>
<html>
<head>
	<title>Погода в твоем городе</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="main_back fonts">
<div class="centr">
<?php
$url = "https://api.openweathermap.org/data/2.5/weather?id=524901&units=metric&appid=bf842d6e5939669ace89ce1ce80221de&lang=ru";

$contents = file_get_contents($url);
$weather = json_decode($contents);

$temp_now = $weather->main->temp."°C";
$icon = $weather->weather[0]->icon.".png";
$cityname = $weather->name;
$vlaga = $weather->main->humidity."%";
$veter = $weather->wind->speed."км/ч";
$davlenie = $weather->main->pressure."мм рт.ст.";
$today = date("j.m.Y, H:i");


echo 
"<div class='line'>".$cityname."</div>".
"<div><img src='https://openweathermap.org/img/wn/" . $icon ."' class='condition img_weather'/>".$temp_now."</div>".
"<div><img src='/img/water.png'/>".$vlaga."</div>".
"<div><img src='/img/wind.png'/>".$veter."</div>".
"<div><img src='/img/thermometer.png'/>".$davlenie."</div>";
?>
</div>
<!--
<div id="openweathermap-widget-15"></div>
<script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 15,cityid: '524901',appid: 'bf842d6e5939669ace89ce1ce80221de',units: 'metric',containerid: 'openweathermap-widget-15',  });
  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";
script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);
  })();</script>
-->
<div class="time">Дата: <?php echo $today; ?></div>
</body>
</html>