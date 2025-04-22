<?php 

session_start();

include"connection.php";

if (isset($_POST['fname']) && isset($_POST['password'])){

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

	}
	$uname = validate($_POST['fname']);
	$pass = validate($_POST['password']);


	if (empty($uname)) {
		header("Location: index.php? error=Username is required");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php? error=Password is required");
		exit();
	} else{
		$sql= "SELECT * FROM loginDB where username = '$uname'AND password_hash = '$pass'";
		$result= mysqli_query($conn, $sql);

		if (mysqli_num_rows($result)== 1){
			$row= mysqli_fetch_assoc($result);

			if ($row['username']===$uname && $row ['password_hash'] === $pass) {
				$_SESSION['username'] = $row['username'];
				header("Location: adminDashboard.php");
				exit();

			}else{
			("Location: index.php? error=Incorrect username and password");
				exit();
		}

		}else{
			header("Location: index.php? error=Incorrect username and password");
		exit();
		}
	}

}else{
	header("Location: index.php");
	exit();
}



	
