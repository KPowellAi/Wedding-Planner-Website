<html>
<head>
<title> The Wedding Planner
 </title>
 
 <!-- Setting the css of the page -->
 <style type="text/css">
body {
	background-image: url("wedding-rings-wallpaper1.jpg");

}
.center {
	text-align:center;
}
body,td,th {
	color: #DF0101; 
}
.larger {
	font-size:larger;
	text-align:right;
}
table {
	margin-left:auto;
	margin-right:auto;
}
</style>
 <body> <!--Creating the page with all the settings-->
 <?php
 if(isset($_REQUEST['submit'])){
	 
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

while($row = $res->fetchRow()){
	$name = $row[strtolower('name')] . "?n <br ?>";
	
	echo "$row";
}
 }else{
?> 
<div style="height:500px">
<div style='background-color:white; width:100%; height:150px; overflow:hidden'>
<h1 style="font-size:3em"><center>THE WEDDING PLANNER</center></h1>
</div>
<div id="planner"  style='background-color:; width:60%; height:350px; float:left; overflow:hidden'>
<h2 style="margin:25px"><center> Welcome to book a venue.</center></h2>

  <form action="<? $_SERVER['PHP_SELF'] ?>" method="get" id="wedding">
    <table border="1">
      <tr>
        <th scope="col">Key</th>
        <th scope="col">Value</th>
      </tr>
      <tr>
        <td><label for="date">Date as yyyy-mm-dd (date)</label></td>

        <td>
          <input name="date" type="text" class="larger" id="date" value="29/01/2014" size="12" />
        </td>
      </tr>
      <tr>
        <td><label for="partySize">Party size (partySize)</label></td>
        <td><input name="partySize" type="text" class="larger" id="partySize" value="150" size="5" /></td>
      </tr>
      <tr>
        <td><label for="partySize">Catering Grade</label></td>
        <td><input name="cateringGrade" type="text" class="larger" id="cateringGrade" value="150" size="5" /></td>
      </tr>
      <tr>
        <td>List names and costs of available venues for the given date and party size</td>
        <td><input type="submit" name="submit" id="submit" value="Submit" class="larger" /></td>
      </tr>
    </table>
  </form>
</div>
 
        
        </div>
<?php
 }
 ?>
 </body>
 </html>
