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
<h2>Task 4 </h2>
<?php
require_once 'MDB2.php';

include "/diska/www/include/coa123-13-connect.php";

$servername = "co-project.lboro.ac.uk";
$username = "coa123wuser";
$password = "grt64dkh";
$dbname = "coa123wdb";

$dsn="mysql://$username:$password@$servername/$dbname";
$db =& MDB2::connect($dsn); //Making a connection

if(PEAR::isError($db)){
	die($db->getMessage());
}

$db->setFetchMode(MDB2_FETCHMODE_ASSOC);



$partySize = $_GET['partySize'];
$date_booked = $_GET['date'];
$timestamp = strtotime(($_GET['date']));
$day = date('D', $timestamp);

//echo $day;

$sql = "SELECT * FROM venue WHERE venue_id NOT IN (SELECT venue_id FROM venue_booking WHERE date_booked = '$date_booked') AND capacity <= $partySize"; //Used select statement from phpmyadmin 
$result =& $db->query($sql); 
$numRows=$result->numRows();
if(PEAR::isError($result)){
	die($db->getMessage());
}

//echo $numRows;
if ($result->numRows() > 0) {
	if($day="Thu"){
		echo "<table border='3'><tr><th>venue_id</th><th>name</th><th>capacity</th><th>weekday_price</th><th>licensed</th></tr>";
		while($row = $result->fetchRow()) {
			echo "<tr><td>".$row["venue_id"]."</td><td>".$row["name"]."</td><td>".$row["capacity"]."</td><td>".$row["weekday_price"]."</td><td>".$row["licensed"]."</td></tr>";
		}
		echo "</table>";
		}else{
			echo "<table><tr><th>venue_id</th><th>name</th><th>capacity</th><th>weekend_price</th><th>licensed</th></tr>";
		while($row = $result->fetchRow()) {
			echo "<tr><td>".$row["venue_id"]."</td><td>".$row["name"]."</td><td>".$row["capacity"]."</td><td>".$row["weekend_price"]."</td><td>".$row["licensed"]."</td></tr>";
		}
	}
	echo "</table>";
}

?>
