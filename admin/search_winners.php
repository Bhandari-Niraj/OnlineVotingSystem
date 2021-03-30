<?php
 $title = 'Search Winners';
?>

<?php require_once("include/header.php");?>

<?php
require_once('class/election.php');
$election = new Election();

//$electData = $election->selectAllElection();
$electName = $election->selectName();

require_once('class/result.php');
$result = new Result();

if (isset($_POST['btnWinner'])) {
    $err = array();
         if (isset($_POST['id']) && !empty($_POST['id'])) {
      $result->id = $_POST['id'];
   }else{
    $err['id'] = "Election name must be selected.";
   }


     if (count($err) == 0) { ?>
       
       <script type="text/javascript">
         window.location = "winners_list.php?id= <?php echo $result->id; ?> ";
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
                           <h3><b>View Winners</b></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                       
                           
                             
                               <form action="" method="post">
                               <div class="form-group">
                                     
                                           <div class="form-group">
                                            <label>Election Name</label>
                                             <select name="id" id="id">
                                                <option></option>
                                                <?php
                                                   foreach ($electName as $en ) { ?>
                                                  <option value="<?php echo $en->Id; ?>"><?php echo $en->Name; ?></option>
                                                  <?php  }
                                                ?>
                                            </select>
                                            </div>

                                            <?php if (isset($err['id'])) { ?>
                                           <div class="alert alert-warning"><?php echo $err['id']; ?></div> 
                                          <?php  }    ?>  

                                           
                           <button type="submit" class="btn btn-default" name="btnWinner" > View Winners</button>
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