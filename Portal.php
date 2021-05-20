<?php
	session_start();
	
	if (isset($_POST['Sign'])){
		
	if (!empty($_POST['Name'])){
		$Name=$_POST['Name'];
	}
	$Email=$_POST['Email'];
	if (!empty($_POST['Mobile'])){
		$Mobile=$_POST['Mobile'];
	}
	$Pass=$_POST['Pass'];
	$RePass=$_POST['RePass'];
	if (!empty($_POST['Choice'])){
		$Choice=$_POST['Choice'];
	}	

	if($RePass != $Pass){
		echo "<script type='text/javascript'>
                alert('Re-entered Password needs to match');
            </script>";
	}
	else{
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="HSSH";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if(mysqli_connect_error()){
			
			echo "<script type='text/javascript'>
                alert('Connection error');
            </script>";
		}
		else{
			$equery="SELECT Email FROM users WHERE Email='$Email'";
			$eresult=$conn->query($equery);
			if($eresult->num_rows > 0){
				echo "<script type='text/javascript'>
                alert('Email ID already registered');
            </script>";
			}
			else{
				$stmt=$conn->prepare("INSERT INTO `users`(`Name`, `Email`, `Password`, `Mobile`, `Choice`) VALUES (?,?,?,?,?)");
				$stmt->bind_param("sssis", $Name, $Email, $Pass, $Mobile, $Choice);
				$stmt->execute();

				$_SESSION["Email"]=$Email;

				echo "<script type='text/javascript'>
                alert('Account created succesfully. Welcome');
				</script>";
			}
		}
	}

	}

	else if (isset($_POST['Log'])){
	$U=$_POST['U'];
	$P=$_POST['P'];

	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="HSSH";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if(mysqli_connect_error()){
			
			echo "<script type='text/javascript'>
                alert('Connection error');
            </script>";
		}
		else{
			$SELECT="SELECT * FROM users WHERE Email='$U' AND Password='$P'";
		$result=$conn->query($SELECT);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
			$_SESSION["Email"]=$row["Email"];				
			}
			
			echo "<script type='text/javascript'> 
					alert('Logged in succesfully. Welcome!');
				</script>";
		}
		else{
			echo "<script type='text/javascript'> 
					alert('The password and Emaid ID do not match');
				</script>";
		}
			
		}
	} 
?>