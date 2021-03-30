<?php
require_once('database.php');
class Election extends database{
  public $election_id, $position, $detail, $date, $parent_id;

  function save(){
    	$sql = "Insert into tbl_election (parent_id,position, detail, date) Values ('$this->election_name' , '$this->position', 
  		  '$this->detail', '$this->date')";
       return $this->insert($sql);
  }

  function selectAllElection(){
    $sql = "Select * from tbl_election";
    return $this->select($sql);
  }

   function remove(){
    $sql = "Delete from tbl_election where election_id = '$this->id' ";
    return $st = $this->delete($sql);
  }

   function selectElectionNameById(){
    $sql = "Select * from tbl_election_name where id = '$this->parent_id'";
    return $this->select($sql);
  }

  function selectElectionById(){
    $sql = "Select * from tbl_election where election_id = '$this->id'";
    return $this->select($sql);
  }

  function edit() {
    $sql = "Update tbl_election set parent_id = '$this->election_name', position = '$this->position', detail = '$this->detail', date = '$this->date' where election_id = '$this->id'  ";
      return $this->update($sql);
  }

  function assignName(){
    $sql = "Insert into tbl_election_name(name) Values ('$this->election_name') ";
    return $this->insert($sql);
  }

  function selectName(){
    $sql = "Select * from tbl_election_name ";
    return $this->select($sql);
  }

  function deleteName(){
   echo $sql ="Delete from tbl_election_name where Id = '$this->election_name' ";
   return $this->delete($sql);
  }

  function getParentId(){
    $sql = "Select parent_id from tbl_election where election_id='$this->id' ";
    return $this->select($sql);
  }

  function countCandidates(){
     $sql = "Select count(candidate_id) as candidate from tbl_candidate where election_id='$this->id' ";
      return $this->select($sql);
    }

 function SelectCandidates(){
     $sql = "Select * from tbl_candidate where election_id='$this->id' ";
      return $this->select($sql);
    }



}



?>