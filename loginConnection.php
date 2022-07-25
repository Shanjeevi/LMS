<?php
session_start();

if(isset($_POST['txtEmail_Phone']) && isset($_POST['Password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email_Id_Phone_no = validate($_POST['txtEmail_Phone']);
	$password = validate($_POST['Password']);


	if(empty($email_Id_Phone_no)){
		header("Location: index.php?error= Email id is required ");
        exit();

	}else if(empty($password)){
		header("Location: index.php?error= Password is required ");
        exit();

	}
	
	else{
		header("Location: material-dashboard-master/pages/dashboard.php");
	}

}else{
	header("Location: index.php");
	exit();
}



	// session_start();
	// include 'dbs/dbs_connectivity.php';

	// if(isset($_POST['but_submit'])){
	// 	$email_Id_Phone_no = $_POST['txtEmail_Phone'];
	// 	$password = $_POST['Password'];

	// 	$sql = "SELECT * FROM mst_user WHERE email_id = '$email_Id_Phone_no'";
	// 	$query = $con->query($sql);

	// 	if($query->num_rows < 1){
	// 		$_SESSION['error'] = 'Cannot find account with the username';
	// 	}
	// 	else{
	// 		$row = $query->fetch_assoc();
	// 		if(password_verify($password, $row['Password'])){
	// 			$_SESSION['mst_user'] = $row['mst_user_id'];
			
		// 	}
		// 	else{
		// 		$_SESSION['error'] = 'Incorrect email id or password';
		// 	}
		// }
		
	// }
	// else{
	// 	$_SESSION['error'] = 'Input admin credentials first';
	// }

	// header('location: index.php');












































include "dbs/dbs_connectivity.php";

if(isset($_POST['but_submit'])){

    $email_Id_Phone_no = mysqli_real_escape_string($con,$_POST['txtEmail_Phone']);
    $password = mysqli_real_escape_string($con,$_POST['Password']);

    if ($email_Id_Phone_no != "" && $password != ""){

        $sql_query = "select count(*) as mst_user_id from mst_user where email_id='".$email_Id_Phone_no."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['mst_user_id'];

        if($count > 0){
            $_SESSION['Email_Phone'] = $email_Id_Phone_no;
			$_SESSION['name'] = $_POST['Email_Phone'];
            header('Location: material-dashboard-master/pages/dashboard.php');
        }else{
            $_SESSION['error'] = 'Incorrect password';

            $result = "Incorrect password";
            header('Location: index.php');
            
        }

    }

}

echo isset($result) ? 'sUCESS password' :'Incorrect password';


?>






	// session_start();
	// include 'dbs/dbs_connectivity.php';

	// if(isset($_POST['but_submit'])){
	// 	$email_Id_Phone_no = $_POST['txtEmail_Phone'];
	// 	$password = $_POST['Password'];

	// 	$sql = "SELECT * FROM mst_user WHERE email_id = '$email_Id_Phone_no'";
	// 	$query = $con->query($sql);

	// 	if($query->num_rows < 1){
	// 		$_SESSION['error'] = 'Cannot find account with the email id or phone no.';
	// 	}
	// 	else{
	// 		$row = $query->fetch_assoc();
	// 		if(password_verify($password, $row['Password'])){
	// 			$_SESSION['mst_user'] = $row['email_id'];
	// 		}
	// 		else{
	// 			$_SESSION['error'] = 'Incorrect password';
	// 		}
	// 	}
		
	// }
	// else{
	// 	$_SESSION['error'] = 'Input admin credentials first';
	// }

	// header('location: material-dashboard-master/pages/dashboard.php');


