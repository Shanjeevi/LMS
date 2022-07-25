<?php 


include "dbs/dbs_connectivity.php";



$error_message = "";$success_message = "";

// Register user
if(isset($_POST['btnsignup'])){
   $name = trim($_POST['Name']);
   $email = trim($_POST['Email']);
   $phone_No = trim($_POST['Phone_No']);
   $password = trim($_POST['Password']);

   $isValid = true;

   // Check fields are empty or not
   if($name == '' || $email == '' || $phone_No == '' || $password == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }


   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_message = "Invalid Email-ID.";
   }

   if($isValid){

     // Check if Email-ID already exists
     $stmt = $con->prepare("SELECT * FROM mst_user WHERE email_id = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Email-ID is already existed.";
     }

   }

   // Insert records
   if($isValid){
     $insertSQL = "INSERT INTO mst_user(user_name, email_id, phone_number, password ) values(?,?,?,?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("ssss",$name,$email,$phone_No,$password);
     $stmt->execute();
     $stmt->close();
     header('Location: index.php');

     $success_message = "Account created successfully.";
   }
}
?>