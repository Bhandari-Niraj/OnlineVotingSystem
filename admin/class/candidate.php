<?php
require_once('database.php');
 Class Candidate extends Database{
  public $candidate_id, $name, $election_id, $email, $detail, $photo, $parent_id;

   public function save(){
    $sql = " Insert into tbl_candidate (election_id, name, email, detail, photo, parent_id ) Values ('$this->election_id', '$this->name', 
    	    '$this->email', '$this->candidate_detail', '$this->photo', '$this->election_name') "; 
    return $this->insert($sql);
   }

   function selectAllCandidate(){
   	$sql = "Select * from tbl_candidate ";
   	return $this->select($sql);
   }

   function remove(){
   $sql = "Delete from tbl_candidate where candidate_id = '$this->id' ";
   return $this->delete($sql);
   }

   function selectCandidateById(){
    $sql = "Select * from tbl_candidate where candidate_id ='$this->id' ";
    return $this->select($sql);
   }

   function edit() {
    $sql = "Update tbl_candidate set election_id = '$this->election_id', name = '$this->name', email = '$this->email', 
      detail = '$this->candidate_detail', photo = '$this->photo', parent_id = '$this->election_name' where candidate_id = '$this->id' ";
     return $this->update($sql);

   }

    function selectCandidateByElectionId(){
       $sql = "Select * from tbl_candidate where election_id ='$this->id' ";
    return $this->select($sql);

    }

    function selectAllCandidateById(){
       $sql = "Select * from tbl_candidate where election_id ='$ed->election_Id' ";
    return $this->select($sql);

    }

    

 }




?>