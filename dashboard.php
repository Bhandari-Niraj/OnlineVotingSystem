<?php
 $title = 'Dashboard';
?>
<?php
  require_once('admin/class/election.php');
  $election = new Election();
   $electData = $election->selectAllElection();

    $today = gmdate('Y-m-d');
     if ($today == $electData[0]->Date) {
      $available =  "You have ". $electData[0]->Position." Election Today !!!";
         }else{
     $unavailable = "You have no election today !!!";
     } 

?>

<?php require_once("include/header.php");?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center"> 
                         <?php if (isset($available)) { ?>
                           <div class="alert alert-success"><?php echo $available; ?></div> 
                          <?php   }else{ ?>
                            <div class="alert alert-danger"><?php echo $unavailable; ?></div> 
                       <?php }

                            ?>
                        </h1>
                    <h1>Rules for Voting</h1>
                    <h3>1. For any election voting duration will be 1 day [24 hours].</h3>
                    <h3>2. In special position voting day only eligible candidates will be able to login to the system.</h3>
                    <h3>3. You can vote only 1 candidate and only once.</h3>
                    <h3>4. The vote button will get enable only in election day.</h3>


                    </div>
                    <!-- /.col-lg-12 -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php require_once('include/footer.php');?>