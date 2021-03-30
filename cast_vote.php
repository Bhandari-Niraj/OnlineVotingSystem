<?php
  $title = 'Casting Vote';
  require_once('include/header.php');
?>


<?php
  if ($_GET['id']) {
   require_once('admin/class/candidate.php');
   $candidate = new Candidate();
   $candidate->id = $_GET['id'];

   $canData = $candidate->selectCandidateByELectionId();
  
   
   require_once('admin/class/election.php');
   $election = new Election();
   
   $election->id = $_GET['id'];
   $parent_id = $election->getParentId();
   $electData = $election->selectElectionById();
   $canInfo = $election->SelectCandidates();
   $no_of_candidate = $election->countCandidates();
  $no_of_candidate = $no_of_candidate[0];
 
  } 
  
?>
<?php
  require_once('admin/class/staff.php');
   $staff = new Staff();

    $staff->staff_id = $_SESSION['staff_id'];
     $staff->election_id = $election->id;
     $staff->parent_id = $parent_id[0]->parent_id;

    
    $si = $_SESSION['staff_id'];
    $staff->staff_id == $_SESSION['staff_id'];
//Checking  if staff has already casted vote or not   
    $status = $staff->validStaff();



    
  if (isset($_POST['btnVote'])) {
   $err = array();
   if (isset($_POST['candidates']) && !empty($_POST['candidates'])) {
     $staff->candidates = $_POST['candidates'];
      
     }else{
      $err['candidates'] = "Candidate must be selected to vote !!!";
     }

    
     
     if (count($err) == 0 && $status == false) {
      

       $st = $staff->CastVote();
     }
}

?>

<!-- Page Content -->
       <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                     <h1 class="page-header" align="center"><?php echo $electData[0]->Position;?> Position</h1> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                 <div class="row">
                <div class="col-lg-12">
                              <h2 class="page-header" align="center"> 
                               <?php     $today = gmdate('Y-m-d');     if (isset($status)) { 
                                if ($status == true && $today == $electData[0]->Date )  {
                                ?>
                                <div class="alert alert-success">You have already voted in this <?php echo $electData[0]->Position;?> Election !!!.</div>   
                               
                            <?php }  }?>
                              

                             <?php  $today = gmdate('Y-m-d');
                                  if ($no_of_candidate->candidate == 1 && $today == $electData[0]->Date) { ?>

                                    <div class="alert alert-success"><?php echo $canInfo[0]->Name.  ' already elected as '. $electData[0]->Position. ' [lone Candidate]' ;?></div> 
                                 <?php }
                               ?>                        
                        

                        <?php if ($electData[0]->Date < $today) { ?>
                                           <div class="alert alert-info" align="center"><b>This election has been EXPIRED!!!</b></div> 
                                          <?php  } ?>

                                          <?php if ($electData[0]->Date > $today) { ?>
                                           <div class="alert alert-info" align="center"><b>Election day coming soon!!!</b></div> 
                                          <?php  } ?>

                                       </h2>   
                   
                       

                  
                    <div class="panel panel-default">
                      <div class="panel-heading" align="center">
                          <?php if (isset($err['candidates'])) { ?>
                                           <div class="alert alert-danger"><b><?php echo $err['candidates']; ?></b></div> 
                                          <?php  } ?>

                     


                      
                 <?php         if (isset($st) ) {
                               if ($st == true) { ?>
                              <script type="text/javascript">
                           window.location = "sucess_vote.php";
                                 </script>   
                              <?php }else { ?>
                               <div class="alert alert-danger"><b>Your vote is failed. PLease vote agaiin !!!</b></div>  
                               <?php } }    ?> 

                               
                          </div>  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
        
          <?php if (isset($status)) {
            if ($status == false && $electData[0]->Date == $today) { ?>

               <form action="" method="POST">
                             <div class="dataTable_wrapper" >
                                <table width="100%"  >
                                <thead>

                                        <tr>
                                            <th>S.N</th>
                                            <th>Candidate Name</th>
                                            <th>Photo</th>
                                            <th>Select</th>
                                          
                                        </tr>
                                    </thead>
                                <?php $i = 1; foreach ($canData as $cd) { ?>
                                    <tbody>
                                     <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $cd->Name;?></td>
                                      <td><img src="admin/images/<?php echo $cd->Photo; ?>" alt="<?php echo $cd->Name; ?>" width='150' ></td>
                                      <td><input type="radio" name="candidates" value="<?php echo $cd->Candidate_Id;?>"></td>
                                     </tr> <br/>
                                    </tbody>
                               <?php $i++; } 
                                ?>
                                  <tfoot>
                                    <tr>
                                      <td colspan="4" align="right"><input type="submit" class="btn btn-success btn-lg "  value="vote" <?php $today = gmdate('Y-m-d');
                                       if ($today == $electData[0]->Date && $no_of_candidate->candidate != 1) {
                                           echo "enabled";
                                         }else{
                                          echo "disabled";
                                          } ?> name = "btnVote" id="btnVote"  ></td>
                                    </tr>
                                  </tfoot> 
                                </table>
                         </div>
                            <!-- /.table-responsive -->
                        </form> 

                        <?php  }
                        } ?>           
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


<?php require_once('include/footer.php'); ?>