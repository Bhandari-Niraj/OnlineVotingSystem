
<?php 
$title = 'Assign Election name';
require_once('include/header.php');
?>

<?php
  require_once('class/election.php');
  $election = new Election();
  if (isset($_POST['btnAddname'])) {
     $err = [];
     if (isset($_POST['election_name']) && !empty($_POST['election_name'])) {
      $election->election_name = $_POST['election_name'];
     }else{
      $err['election_name'] = "Assign Name for upcoming election";
     }

     if (count($err) == 0) {
       $st = $election->assignName();
       



     }
  }

?>



<!-- Page Content -->
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <b>Assign ELection Name</b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                            <?php  
                             if (isset($st)) {
                               if ($st = true) { ?>
                              <div class="alert alert-success">Election Name Assigned Sucessfully.</div> 
                              <?php }else{ ?>
                               <div class="alert alert-success">Fail to Assign ELection Name.</div>  
                               <?php }
                             }



                            ?>


                                    <form role="form" action="" method="POST">
                                        
                                        
                                       
                                        
                                       
                                         <div class="form-group">
                                            <label>Election Name</label>
                                            <input type="text" name="election_name">
                                        <?php
                                           if (isset($err['election_name'])) { ?>
                                              <div class="alert alert-warning"> <?php echo $err['election_name']; ?> </div>  
                                           <?php  }
                                        ?>
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" class="btn btn-default" name="btnAddname" >Assign Name</button>
                                        <button type="reset" class="btn btn-default"> Clear </button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                            </div>
                            <!-- /.row (nested) -->
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

<?php require_once('include/footer.php');?>