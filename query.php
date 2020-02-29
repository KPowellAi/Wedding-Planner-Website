<?php
require_once 'MDB2.php';

include "/diska/www/include/coa123-13-connect.php"; //to provide $username,$password 

//define $host and $dbName 
$host='co-project.lboro.ac.uk';
$dbName='coa123wdb';
// make connection to the server 
$dsn = "mysql://$username1:$password1@$host/$dbName"; 
$db =& MDB2::connect($dsn); 

if(PEAR::isError($db)){ 
    die($db->getMessage());
}
$date = $_GET['date'];
$cgrade = $_GET['cateringGrade'];
$psize = $_GET['partySize'];
$db->setFetchMode(MDB2_FETCHMODE_ASSOC);

$sql = "SELECT * FROM venue 
WHERE venue_id NOT IN 
(SELECT venue_id FROM venue_booking WHERE date_booked = '$date')
AND venue.venue_id = catering.venue_id
AND capacity <= $psize 
AND grade = $cgrade";
$res =& $db->query($sql); 

if (PEAR::isError($res)) {
    die($res->getMessage());
}

while($row = $res->fetchRow())
{
	
	echo "$row";
}
?>

     
    