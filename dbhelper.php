<?php

class dbHelper
{
	
	public function begin()
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		//$id = 100;


		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		return $conn;


	}

	public function insert($name,$mail,$pass,$repass)
	{

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		//$id = 100;


		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if($pass == $repass)
		{	
			echo $name;
			$sql = "INSERT INTO User ( userName, email,password)
				VALUES ('$name', '$mail','$pass')";

			if (mysqli_query($conn, $sql)) {
				echo "Signed Up successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
		else
		{
			echo "password didn't matched, Try again!!!";
		}
		mysqli_close($conn);

	}


	public function signUp($mail,$pass)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		//$id = 100;


		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$flag = 0;
		//$conn = begin();
		$sql = "SELECT email, password FROM User";
		$result = $conn->query($sql);
		//echo "inside if";
		if ($result->num_rows > 0) {
		    // output data of each row
			
			while($row = $result->fetch_assoc()) 
			{
				//echo "email " . $row["email"]. " Password " . $row["password"];
				if($row["email"] == $mail && $row["password"] == $pass )
		 
				 {
					$flag = 1;
					echo 'id and password matched <br>' ;
				    //$_SESSION['user'] = $row['id'];
					//header("Location: home.php");
					return 1;
				 }
			}
			echo "password didnt matched";
			if($flag==0)
			{
				//header("Location: loginFailed.php");
				return 0; 
			}
		} 
		else 
		{
			echo "0 results";
		}

		$conn->close();
		
		
	}
	public function boo()
	{
		echo "you are here";
	}


	public function getAppInfo($name)
	{
		

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$flag = 0;
		$sql = "SELECT * FROM Application";
		$result = $conn->query($sql);
		//echo "inside" . $name . "<br>";
		if ($result->num_rows > 0) 
		{
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				//echo "Name" . $row["app_name"]. " - OS: " . $row["app_os"]. "Image:" . $row["image"]. "<br>";
				if($row["app_name"] == $name)
				{
					//echo "matched"; 
					return $row;
				}
			}
			
			
			return $flag;
			
		} 	
		else 
		{
			echo "0 results";
		}
		$conn->close();
	}
	public function insertAppInfo($name,$image,$download,$rating,$type,$company,$os,$price,$downloads,$description)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";


		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
			
		echo $name;
		$sql = "INSERT INTO Application (app_name,image,download_link,rating,app_type,app_company,app_os,app_price,downloads,description)
			VALUES ('$name','$image','$download','$rating','$type','$company','$os','$price','$downloads','$description')";

		if (mysqli_query($conn, $sql)) {
			echo "Data entered successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		
		mysqli_close($conn);
		
	}
	
	public function getSortdList()
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";


		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT app_name FROM Application ORDER BY  downloads DESC";
		$result = $conn->query($sql);
		$count = 0;
		
		if ($result->num_rows > 0) 
		{
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				
				if($count<4)
				{
					$arr[$count] = $row['app_name'];
					
					//echo $arr[$count] .  "<br>";
					$count+=1;
				
				}
			}
			return $arr;
		} 	
		else 
		{
			echo "0 results";
		}
		$conn->close();
		

		

	}


	public function getCategorizedData($category,$compared)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";


		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM Application ORDER BY  downloads DESC";
		$result = $conn->query($sql);
		$count = 0;
		//echo $category . " " . $compared;
		if ($result->num_rows > 0) 
		{
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				//echo $row['app_os'] ;
				if($count<4 && $row[$category]==$compared)
				{

					$arr[$count] = $row['app_name'];
					
					//echo $arr[$count] . " " . $row[$category] . "<br>";
					$count+=1;
				
				}
			}
			return $arr;
		} 	
		else 
		{
			echo "0 results";
		}
		$conn->close();
		

		

	}

	public function buyApp($type,$cardnumber,$pin)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		//$id = 100;


		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$flag = 0;
		//$conn = begin();
		$sql = "SELECT * FROM CreditCard";
		$result = $conn->query($sql);
		//echo "inside if";
		if ($result->num_rows > 0) {
		    // output data of each row
			
			while($row = $result->fetch_assoc()) 
			{
				//echo "email " . $row["email"]. " Password " . $row["password"];
				if($row["cardtype"] == $type && $row["cardnumber"] == $cardnumber && $row['pin'] == $pin)
		 		{
					
					//echo 'id and password matched <br>' ;
				    //$_SESSION['user'] = $row['id'];
					//header("Location: home.php");
					return 1;
				 }
			}
			//echo "password didnt matched";
			if($flag==0)
			{
				//header("Location: loginFailed.php");
				return 0; 
			}
		} 
		else 
		{
			echo "0 results";
		}

		$conn->close();
	}


	public function forgetPass($email,$key)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$flag = 1;
		$sql = "SELECT * FROM ForgetPass";
		$result = $conn->query($sql);
		echo "inside" . $flag . "<br>";
		
			// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			//echo "Name" . $row["app_name"]. " - OS: " . $row["app_os"]. "Image:" . $row["image"]. "<br>";
			if($row['code'] == $key && $row['email'] == $email)
			{
				echo "matched"; 
				
				//return $row;
				$flag = 0;
				
			}
			
			
		}
		$name = "pial";
		echo $name;

		//$sql = "INSERT INTO User ( userName, email,password)
			//	VALUES ('$name', '$mail','$key')";
		
		if($flag == 1)
		{

			$sql = "INSERT INTO ForgetPass (email,code)
					VALUES ('$email','$key')";
			echo "<br>" . $sql . "<br>";

			if (mysqli_query($conn, $sql)) {
				echo "Signed Up successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		
		
		return false;
			
		} 	
		
		$conn->close();
	}


	public function resetpass($email,$pass)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE User SET password='$pass' WHERE email='$email'";
		
		if(mysqli_query($conn, $sql)) 
		{
			echo "Record updated successfully";
		} 
		else 
		{
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}

	public function checkdownload($email,$name)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		echo $name . " inside dbhelper " . $email . "<br>";
		$sql = "SELECT * FROM UserDownloads
				where email = '$email' and app_name = '$name' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    
			return 1;
		} 
		else 
		{

			//echo "0 results";
			return 0;
		}

		$conn->close();

	}


	public function rateapp($name,$rate)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		//echo $name . " inside dbhelper " . $email . "<br>";
		$sql = "SELECT * FROM Application
				where app_name = '$name' ";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    
		    echo "executed";
		    $row = $result->fetch_assoc();
		    $final = ($row['rating']*$row['downloads'])/($row['downloads']+1);
		    echo $final;
		    $final = round($final, 1); 
		    $sql = "UPDATE Application SET rating='$final' WHERE app_name='$name'";
		    $result1 = $conn->query($sql);

			//return 1;
		} 
		else 
		{

			echo "0 results";
			//return 0;
		}

		$conn->close();
	}


	public function insertdownloadlist($email,$name)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		//echo $name . " inside dbhelper " . $email . "<br>";
		$sql = "INSERT INTO UserDownloads (email,app_name)
					VALUES ('$email','$name')";

		if(mysqli_query($conn, $sql)) 
		{
			echo "Download List updated successfully";
		} 
		else 
		{
			echo "Error updating record: " . $conn->error;
		}
	}

	
	public function signUpAdmin($email,$pass)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		//$id = 100;


		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$flag = 0;
		//$conn = begin();
		//echo $email
		$sql = "SELECT email, password FROM Admin 
				where email = '$email' and password = '$pass' ";
		$result = $conn->query($sql);
		//echo "inside if";
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


	public function updatedata($name,$attribute,$data)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE Application SET $attribute='$data' WHERE app_name='$name'";
		
		if(mysqli_query($conn, $sql)) 
		{
			echo "Record updated successfully";
		} 
		else 
		{
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}

	public function deleteData($attribute,$data)
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "OnlineAppStore";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "DELETE FROM Application WHERE '$attribute' = '$data' ";
		echo $sql . "<br>";
		if(mysqli_query($conn, $sql)) 
		{
			echo "Record deleted successfully";
		} 
		else 
		{
			echo "Error updating pials record: " . $conn->error;
		}

		$conn->close();
	}







	
	
	

}

	$db = new dbHelper();

	// $sql = "DELETE FROM MyGuests WHERE id=3";


?> 
