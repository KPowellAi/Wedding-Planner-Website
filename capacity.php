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
	font-size:3em;
  text-align:center;
}

</style>
<title>Server side programming</title>
<h1>Wedding Planner coursework</h1>
<h2>Task 3 </h2>
<?php
  
$username = "coa123wuser"; 
$password = "grt64dkh";
$min = $_GET['minCapacity'];
$max = $_GET['maxCapacity'];

 $host='co-project.lboro.ac.uk';
 $dbName='coa123wdb';

 $dsn = "mysql://$username:$password@$host/$dbName"; //Data Source Name

 require_once('MDB2.php'); 
 $db =& MDB2::connect($dsn); //making a connection

 if (PEAR::isError($db)) { 
     die($db->getMessage());
 }
$db->setFetchMode(MDB2_FETCHMODE_ASSOC);
 $sql="SELECT name, weekend_price, weekday_price FROM venue WHERE capacity BETWEEN '$min' AND '$max' AND licensed=1";
 $res =& $db->query($sql);

 if (PEAR::isError($res)) {
     die($res->getMessage());
 }
 
  if($res->numRows()>0){ 
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>"."name"."</td>";
	echo "<td>"."weekend_price"."</td>";
	echo "<td>"."weekday_price"."</td>";
	echo "</tr>";
	while($row = $res->fetchRow()){	
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['weekend_price']."</td>";
		echo "<td>".$row['weekday_price']."</td>";
		echo "</tr>";
	}
	echo "</table>";
  }
 ?>