<?php
 $title = 'Winners List';
 require_once('include/header.php');
?>
<?php
 require_once('admin/class/election.php');
 $election = new Election();
 $electName = $election->selectName();
 $electData = $election->selectAllElection();

 require_once('admin/class/result.php');
 $result = new Result();


 require_once('admin/class/candidate.php');
 $candidate = new Candidate();
 $canData = $candidate->selectAllCandidate();

 if ($_GET['id']) {
    
     $election->parent_id = $_GET['id'];
    $result->parent_id = $_GET['id'];
     $en = $election->selectElectionNameById();
     
    
 }
?>


<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                 <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header" align="center"><?php echo $en[0]->Name;?> </h1> 

                  
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                          <h2>List of Winners</h2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                             <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="viewtable">
                                    <thead>
                                        <tr>
                                            <th>Election Position</th>
                                            <th>Candidate Name</th>
                                           
                                            <th>Selected By</th>
                                        </tr>
                                    </thead>
                                    
                                      <?php $today = gmdate('Y-m-d');
                                       foreach ($electData as $ed) { 
                                          if ($today >= $ed->Date) {  ?>
                                      <tr>
                                      <td><?php echo $ed->Position;  ?> </td>
                                      <td><b><?php foreach ($canData as $cd ) {
                                        if ($ed->Election_Id == $cd->Election_Id) {
                                            //assigning election id to election object.
                                            $election->id = $ed->Election_Id;
                                            //assigning election id to result object.
                                            $result->election_id = $ed->Election_Id;
                                            //counting number of candidates in each election.
                                            $no_of_candidate = $election->countCandidates();
                                            $no_of_candidate = $no_of_candidate[0];
                                            
                                            

                                            if ($no_of_candidate->candidate == 1) {
                                               echo $cd->Name;
                                            }else{
                                                $canInfo = $election->SelectCandidates();

                                            
                                            //Obtaining total number of voting in given position election
                                            $totalVote = $result->countTotalVote();
                                            
                                            $total_vote = $totalVote[0]->votes;

                                           //Obtaing total numer of vote obtained by each candiate of given position election 
                                            $vote_obtained = $result->countEachCandidateVotes();

                                            if ($vote_obtained == $cd->Candidate_Id) {
                                             echo $cd->Name;
                                            }
                                                                                    }
                                      } } ?></b></td>

                                    

                                      <td> <?php if ($no_of_candidate->candidate == 1) {
                                               echo "Lone Candidate";
                                            }else{
                                                echo "Voting";
                                                } ?> </td>
         
                                     <?php             
                                      } }  ?>  
                                     </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php require_once "include/footer.php";?>