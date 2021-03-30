<?php
 $title = 'Election Result';
?>

<?php require_once("include/header.php");?>

<?php
require_once('admin/class/election.php');
$election = new Election();
$electData = $election->selectAllElection();

$electName = $election->selectName();

require_once('admin/class/result.php');
$result = new Result();

if (isset($_POST['btnResult'])) {
    $err = array();
         if (isset($_POST['election_name']) && !empty($_POST['election_name'])) {
      $result->election_name = $_POST['election_name'];
   }else{
    $err['election_name'] = "Election name must be selected.";
   }

     if (isset($_POST['election_id']) && !empty($_POST['election_id'])) {
        $result->election_id = $_POST['election_id'];
     }else{
        $err['election_id'] = "You need to select Election to view result.";
     }

     if (count($err) == 0 ) { ?>
       
       <script type="text/javascript">
         window.location = "positionwise_result.php?id=<?php echo $result->election_id; ?>";
       </script>   
        
         
       

          
    
    <?php }
 } 



?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <b>View Result</b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                       
                           
                             
                               <form action="" method="post">
                               <div class="form-group">
                                     
                                           <div class="form-group">
                                            <label>Election Name</label>
                                             <select name="election_name" id="Id">
                                                <option></option>
                                                <?php
                                                   foreach ($electName as $en ) { ?>
                                                  <option value="<?php echo $en->Id; ?>"><?php echo $en->Name; ?></option>
                                                  <?php  }
                                                ?>
                                            </select>
                                            </div>

                                            <?php if (isset($err['election_name'])) { ?>
                                           <div class="alert alert-warning"><?php echo $err['election_name']; ?></div> 
                                          <?php  }    ?>  

                                           <label>Position</label>
                                            <select class="form-control" name="election_id" id="election_id">
                                             <option></option>
                                             <?php foreach ($electData as $ed ) { ?>
                                              <option value="<?php echo $ed->Election_Id ;?>"><?php echo $ed->Position;?></option>
                                            <?php } ?>
                                            </select>
                                            </div>
                                          <?php  if (isset($err['election_id'])) { ?>
                                          <div class="alert alert-warning"><?php echo $err['election_id']; ?></div> 
                                            <?php }
                                        ?>
                           <button type="submit" class="btn btn-default" name="btnResult" > View Reult</button>
                                        <button type="reset" class="btn btn-default"> Clear </button>                
                    </form>

                 
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>   

                    </div>
                    <!-- /.col-lg-12 -->

                    
            
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php require_once('include/footer.php');?>