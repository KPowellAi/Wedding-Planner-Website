<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Catering Task</title>
</head>
<style>
body {
    background-color: #DF0101; 
  font-size:2.5em; 
  text-align:center;
}

</style>
<title>Server side programming</title>
<h1>Wedding Planner coursework</h1>
<h2>Task 1 </h2>
<?php 
$min = $_GET['min'];
$max = $_GET['max'];
$c1 = $_GET['c1'];
$c2 = $_GET['c2'];
$c3 = $_GET['c3'];
$c4 = $_GET['c4'];
$c5 = $_GET['c5'];

echo '<table border="3" <table align="center"><tr> 
      <td>cost per person</td><td>'.$c1.'</td><td>'.$c2.'</td><td>'.$c3.'</td><td>'.$c4.'</td><td>'.$c5.'</td>
      </tr>';
for($i=$min;$i<=$max;$i=$i+5){
echo '<tr>';
echo '<td>'.$i.'</td>';
echo '<td>'.$i*$c1.'</td>';
echo '<td>'.$i*$c2.'</td>';
echo '<td>'.$i*$c3.'</td>';
echo '<td>'.$i*$c4.'</td>';
echo '<td>'.$i*$c5.'</td>';
echo '</tr>';
}
echo '</table>';
?>
</body>
</html>


