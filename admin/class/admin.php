<?php
require_once('class/database.php');
class Admin extends Database{
 public $admin_id, $name, $email, $mobile_no, $status, $password, $last_login;

 function login() {
//Generating query for admin login with parameters. 	
   $sql = "Select * from tbl_admin where email = '$this->email' and password = '$this->password' and status = 1 ";
// Database Connection 
   $conn = new mysqli('localhost','root','','db_election');
//Checking error in database connection.  
    if ($conn->connect_errno != 0) {
      die('Error in database Connection: '. $conn->connect_error);
    }
//Executing query.
    $res = $conn->query($sql);
//Checking number of rows in the result set.   
     if ($res->num_rows == 1) {
// Updating last login value of the Admin.
     $date = date('Y-m-d H:i:s');
     $sql = "Update tbl_admin set last_login= '$date' where email = '$this->email' ";
     $conn->query($sql);	
//Storing matched record from table admin as an object.
      $da = $res->fetch_object();
// Storing useful admin data into session.
     
     session_start();
     $_SESSION['email'] = $this->email;
     $_SESSION['name'] = $da->Name;
     $_SESSION['admin_id'] = $da->Admin_Id;
//redirecting valid users to dashboard file.     	
     return true;
     }else{
      return false;
     }
    

 }

 function editPassword(){
    $sql ="Update tbl_admin set password = '$this->password1' where admin_id ='$this->admin_id' ";
    return $this->update($sql);
    }

}








?>