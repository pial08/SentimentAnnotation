<?php



class dbmanager
{

	public $servername = "10.130.24.163";
	public $username = "root";
	public $password = "ncfv0CG89J";
	public $dbname = "AnnotateComment";
	public function getComment($n)
	{

		

		$allcomment = array();
		// Create connection
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		mysqli_query($conn,'SET CHARACTER SET utf8'); 
		mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");		
	
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		



		$sql = "SELECT * FROM Comment";
		$result = $conn->query($sql);
		$index = 0;
		//echo "inside" . $name . "<br>";
		if ($result->num_rows > 0) 
		{
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				//echo "Name" . $row["app_name"]. " - OS: " . $row["app_os"]. "Image:" . $row["image"]. "<br>";
				$allcomment[$index] = $row;
				$index += 1;
			}
			
			
			return $allcomment;
			
		} 	
		else 
		{
			echo "0 results";
		}
		$conn->close();
	}


		public function insert($comment)
		{



			//$id = 100;


			// Create connection
			
			

			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
		

			mysqli_query($conn,'SET CHARACTER SET utf8'); 
			mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
				
			// Check connection
			
			$comment = mysqli_real_escape_string($conn, $comment);
		
			$sql = "INSERT INTO Comment (comment)
				VALUES ('$comment')";
				

			if (mysqli_query($conn, $sql)) {
				//echo "Signed Up successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		
		
			mysqli_close($conn);

		}

		public function makeChunk($val)
		{


			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

			mysqli_query($conn,'SET CHARACTER SET utf8'); 
			mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
				
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}


			$comments = $this->getComment(10);
			 
			$chunkid = 1;
			
			$counter = count($comments);
			for($i=1,$id=1;$i<$counter;$i++)
			{
				
				$sql = "UPDATE Comment SET chunkid='$chunkid' WHERE id='$i'";
				//$sql = "UPDATE Comment SET id='$id' WHERE id='$i'";
				$id++;

				if (mysqli_query($conn, $sql)) {
					//echo "data updated\n";
				} else {
					echo "Error: " . $sql . "\n" . mysqli_error($conn);
				}
				
				
				
				
				if($i%$val == 0)
				{
					echo "chunk " . $chunkid . " created\n";
					$chunkid++;
				}

			}
			
		}
		public function signin($email,$pass,$type)
		{


			//$id = 100;


			// Create connection
			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			echo $email . " signin " . $pass;

            $email = mysqli_real_escape_string($conn,$email);
            $pass = mysqli_real_escape_string($conn, $pass);

			$sql = "SELECT * FROM  $type  
				where email = '$email' and password = '$pass'";


			$result = $conn->query($sql);

			//echo "inside if";
			echo $sql;
			if ($result->num_rows > 0) {
				// output data of each row
			
				return 1;
			} 
			else 
			{
				echo "0 results";
				return 0;
			}

			$conn->close();

		}
	public function getchunkinfo()
	{

		$allcomment = array();
		// Create connection
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}



        $user = $this->getuserinfo($_SESSION['user']);

		$sql = "SELECT * FROM Chunk";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				if($row["numberofassigned"] < 2)
				{
					echo "print\n";
                    $uid = $user["uid"];

                    $cid = 100* ($row['id']-1) + 1;
                    $sql1 = "SELECT * FROM AnnotatedComments WHERE cid = '$cid' AND uid = '$uid' ";
                    echo $sql1 ;
                    $_SESSION['shit'] = $sql1;
                    header("Location: test.php");

                    $result1 = $conn->query($sql1);
                    if ($result1->num_rows == 0)
                        break;
					//break;
					//return $row;
				}
			}
			$ccount = $row["numberofassigned"] + 1;
			$chunkid = $row["id"];
			$sql = "UPDATE Chunk SET numberofassigned='$ccount' WHERE id='$chunkid'";
			mysqli_query($conn, $sql);
			
			
			return $row;
			
			
			
		} 	
		else 
		{
			echo "0 results";
		}


	}

		
	public function signup($name,$mail,$occupation,$semester,$age,$place,$pass,$repass)
	{



		//$id = 100;

		echo "WIll sign up now";
		// Create connection
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		// change made to avoid sql injection at on 16 january **********
        $name = mysqli_real_escape_string($conn, $name);
        $mail = mysqli_real_escape_string($conn, $mail);
        $occupation = mysqli_real_escape_string($conn, $occupation);
        $semester = mysqli_real_escape_string($conn, $semester);
        $age = mysqli_real_escape_string($conn, $age);
        $place = mysqli_real_escape_string($conn, $place);
        $pass = mysqli_real_escape_string($conn, $pass);
        $repass = mysqli_real_escape_string($conn, $repass);

        // ********* change done


		if($pass == $repass)
		{


			

			$chunk = $this->getchunkinfo();
			$chunkid = $chunk["id"];
			$ccount = $chunk["numberofassigned"];
			$ccount++;
			echo $chunkid;
			$offset = ($chunkid-1) * 100 + 1;
			$sql = "INSERT INTO User (Name,email,password,chunk,offset,occupation,semester,age,place,initial)
				VALUES ('$name', '$mail','$pass','$chunkid',$offset,'$occupation','$semester',$age,'$place',0)";

			if (mysqli_query($conn, $sql)) {
				echo "Signed Up successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			//update chunk
			//$sql = "UPDATE Chunk SET numberofassigned='$ccount' WHERE id='$chunkid'";
			//mysqli_query($conn, $sql);
			
		}
		else
		{
			echo "password didn't matched, Try again!!!";
		}
		mysqli_close($conn);

	}

	public function sumcalculate()
	{

        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

		$mail = $_SESSION['user'];

        $sql = "SELECT * FROM User 
				where email = '$mail'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row

            $row = $result->fetch_assoc();
            //return $row;
        }
        else
        {
            echo "0 results";
            return 0;
        }

        $sum = $row['sum'];
        $type = $_SESSION['type'];

        if($type == "admin")
        {
			$sum = $sum + 15;
        }
        else
        {
			$sum = $sum + 10;
		}

        $sql = "UPDATE User SET sum='$sum' WHERE email='$mail'";
        mysqli_query($conn, $sql);
        $_SESSION['sum'] = $sum;



        $conn->close();

    }

	public function boo()
	{
		echo "boo!!!";
	}


	public function getuserinfo($mail)
	{





		// Create connection
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		

		$sql = "SELECT * FROM User 
				where email = '$mail'";
			$result = $conn->query($sql);
			//echo "inside if";
			if ($result->num_rows > 0) {
				// output data of each row
			
				$row = $result->fetch_assoc();
				return $row;
			} 
			else 
			{
				echo "0 results";
				return 0;
			}

			$conn->close();


	}
	public function getadmininfo($mail)
	{





		// Create connection
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		

		$sql = "SELECT * FROM Admin 
				where email = '$mail'";
			$result = $conn->query($sql);
			//echo "inside if";
			if ($result->num_rows > 0) {
				// output data of each row
			
				$row = $result->fetch_assoc();
				return $row;
			} 
			else 
			{
				echo "0 results";
				return 0;
			}

			$conn->close();


	}

	public function get10comments($offset,$n)
	{




		
		// Create connection
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

		mysqli_query($conn,'SET CHARACTER SET utf8'); 
		mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$tail = $offset + $n;
		echo $offset . " " . $tail;
		$sql = "SELECT * FROM Comment 
				where id>='$offset' and id<'$tail'";
		$result = $conn->query($sql);

		$index = 0;

		if ($result->num_rows > 0) 
		{
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				//echo "Name" . $row["app_name"]. " - OS: " . $row["app_os"]. "Image:" . $row["image"]. "<br>";
				$comments[$index] = $row;
				$index += 1;
			}
			
			
			return $comments;
			
		} 	
		else 
		{
			echo "hati results";
		}
		$conn->close();
		

	}
	public function increaseoffset($uid)		// not called
	{


		//$id = 100;

		echo "WIll sign up now";
		// Create connection
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}


		$sql = "UPDATE User SET offset='$ccount' WHERE id='$chunkid'";
		mysqli_query($conn, $sql);
			

	}
	
	
	public function fillchunk($chunk)
	{



		//$id = 100;

		echo "Filling chunk\n";
		// Create connection
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		for($i=1;$i<$chunk;$i++)
		{
			$sql = "INSERT INTO Chunk (id,numberofassigned)
			VALUES ($i,0)";

			if (mysqli_query($conn, $sql)) {
				echo "Signed Up successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		}
		
		
		//update chunk
		//$sql = "UPDATE Chunk SET numberofassigned='$ccount' WHERE id='$chunkid'";
		//mysqli_query($conn, $sql);


	mysqli_close($conn);

	}
	
	public function updateinit($email)
	{

		//$id = 100;

		//echo "WIll sign up now";
		// Create connection
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}


		$sql = "UPDATE User SET initial=1 WHERE email='$email'";
		//mysqli_query($conn, $sql);
		
		if (mysqli_query($conn, $sql)) {
				//echo "Signed Up successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

	}




}

$db = new dbmanager();


//$db->makeChunk(100);
//$db->fillchunk(928);



















//$comments = $db->getComment();
//$comment = $comments[0];
//echo "Making chunk completed\n";
//echo $comment["comment"] . "\n";
/*

$count = 0;
echo "Inserting...\n";
$myfile = fopen("cleanedComments.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
	$line = fgets($myfile);
	//$line = utf8_encode($line);
  	//echo $line ;
	$db->insert($line);
	//$count += 1;
	//if($count>6)
		//break;
}
fclose($myfile);

echo "Insert done\n";

*/


/*
$comments = $db->getComment();
$counter = count($comments);

$myfile = fopen("new.txt", "w") or die("Unable to open file!");
//for($i=0;i<$counter;$i++)
foreach ($comments as $comment)
{
	//$comment = $comments[$i];
	echo $comment["comment"] . "\n";
	$data = $comment["comment"] . "\n";
	fwrite($myfile, $data);
	
	
	
}
fclose($myfile);


echo "retrive done\n";


*/


?>







