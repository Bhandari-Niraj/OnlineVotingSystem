<?php
require_once('database.php');
 class Staff extends Database{
   public $staff_id, $name, $staff_type_id, $email, $mobile_no, $status, $password, $last_login;

  function save(){
      $sql ="Insert into tbl_staff(staff_id, name, staff_type_id, email, mobile_no, status, password) Values('$this->staff_id', 
    	'$this->name', '$this->staff_type_id', '$this->email', '$this->mobile_no', '$this->status', md5('$this->password'))  ";
     return $this->insert($sql);
   }

  function selectAllStaff(){
    $sql = " Select * from tbl_staff ";
    return $this->select($sql);
  } 

  function remove(){
    $sql = "Delete from tbl_staff where staff_id = '$this->id' ";
    return $st = $this->delete($sql);
  }

  function selectStaffById() {
    $sql ="Select * from tbl_staff where staff_id = '$this->id' ";
    return $this->select($sql);
    }

  function edit() {
    
    $sql = "Update tbl_staff set staff_id='$this->staff_id', name='$this->name', staff_type_id='$this->staff_type_id', email='$this->email',
            mobile_no='$this->mobile_no', status='$this->status' where staff_id = '$this->id' ";
    return $this->update($sql);
  } 

  function deactivate() {
    $sql = "Update tbl_staff set status = 0 where staff_type_id = '$this->staff_type_id' ";
    return $this->update($sql);
  } 

   function activate() {
    $sql = "Update tbl_staff set status = 1 where staff_type_id = '$this->staff_type_id' ";
    return $this->update($sql);
  } 

  function addStaffType(){
    $sql = "Insert into tbl_staff_type(staff_type) values('$this->staff_type')";
    return $this->insert($sql);
  }

  function selectStaffType(){
    $sql = " Select * from tbl_staff_type ";
    return $this->select($sql);
  }

  function deleteStaffType(){
    $sql = "Delete from tbl_staff_type where staff_type_id = '$this->staff_type'";
    return $this->delete($sql);

  }

  function login(){
    $sql = "Select * from tbl_staff where staff_id = '$this->staff_id' and staff_type_id = '$this->staff_type' and password = '$this->password' and status =1 ";
    $conn = new mysqli('localhost','root','','db_election');
     if ($this->conn->connect_errno != 0) {
     die('Error in database Connection: '. $conn->connect_error);
   } 
    $res = $conn->query($sql);
     
     if ($res->num_rows == 1) {
      $ds = $res->fetch_object();

      session_start();
      $_SESSION['name'] = $ds->Name;
      $_SESSION['staff_id'] = $ds->Staff_Id;
      $_SESSION['email'] = $ds->Email;
      $_SESSION['mobile_no'] = $ds->Mobile_No;
      $_SESSION['staff_type_id'] = $ds->Staff_Type_Id;

       return true;
     }else{
      return false;
     }
   
  }

    function editPassword(){
     $sql ="Update tbl_staff set password = '$this->password1' where staff_id ='$this->staff_id' ";
     return $this->update($sql);
    }
  
    function validStaff(){
    $sql = "Select * from tbl_vote_count where staff_id = '$this->staff_id' and election_id = '$this->election_id' ";
      return $this->select($sql);
    } 

    function CastVote(){
     $sql = "Insert into tbl_vote_count (election_id, candidate_id, staff_id, parent_id, votecount) Values ('$this->election_id', '$this->candidates', '$this->staff_id', '$this->parent_id', 1 ) ";
     return $this->insert($sql);

    }

}






?>