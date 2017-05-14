<?php
$servername = "139.59.235.109";
		$username = "root";
		$password = "ncfv0CG89J";
		$dbname = "AnnotateComment";

		//$id = 100;

		echo "Filling chunk\n";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
$test_query = "SHOW TABLES FROM $dbname";
$result = mysqli_query($test_query);
$tblCnt = 0;
while($tbl = mysqli_fetch_array($result)) {
  $tblCnt++;
  #echo $tbl[0]."<br />\n";
}
if (!$tblCnt) {
  echo "There are no tables<br />\n";
} else {
  echo "There are $tblCnt tables<br />\n";
}
