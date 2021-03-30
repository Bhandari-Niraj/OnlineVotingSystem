<?php
require_once('database.php');
Class Result extends Database{
 public $vote_id,  $election_id,  $candidate_id,  $staff_id, $parent_id,  $vote_count;

 function countTotalVote(){
   $sql = "Select count(vote_id) as votes from tbl_vote_count where election_id = '$this->election_id' and parent_id = '$this->parent_id'";
   return $this->select($sql);
 }

  function countEachCandidateVote(){ 
    $sql = "Select candidate_id, count(candidate_id) as votes from tbl_vote_count where election_id = '$this->election_id' and parent_id = '$this->parent_id'  group by candidate_id";
     return $this->select($sql);
 }

  function calculatePercentage($votes, $total_vote){ 
    return $votes / $total_vote * 100;  
 }

  function countEachCandidateVotes(){ 
    $sql = "SELECT candidate_id, max(count)
             FROM (SELECT candidate_id, count(candidate_id) AS count
      FROM tbl_vote_count
      where election_id = '$this->election_id'
      group by candidate_id
      order by count(candidate_id)
      ) AS temp";

     $vote = $this->select($sql);

    

     foreach ($vote as $vo ) {
       return $vo->candidate_id;
     }

    

  

 



 }

}
    



?>