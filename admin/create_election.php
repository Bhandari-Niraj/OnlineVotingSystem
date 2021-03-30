
<?php 
$title = 'Create Election';
require_once('include/header.php');
?>

<?php
require_once('class/election.php');
 $election = new Election();

 $electName = $election->selectName();
if (isset($_POST['btnCreate'])) {
    $err = array();

     if (isset($_POST['election_name']) && !empty($_POST['election_name'])) {
      $election->election_name = $_POST['election_name'];
   }else{
    $err['election_name'] = "Election name must be selected.";
   }

   if (isset($_POST['position']) && !empty($_POST['position'])) {
      $election->position = $_POST['position'];
   }else{
    $err['position'] = "Select position for election";
   }


    if (isset($_POST['date']) && !empty($_POST['date'])) {
       $election->date = $_POST['date'];
   }else{
    $err['date'] = "Election date is required";
   }

    
     
      $election->detail = $_POST['detail'];
   

  if (count($err) == 0) {
    $st = $election->save();

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
                           <b>Create Election</b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <?php  
                             if (isset($st)) {
                               if ($st = true) { ?>
                              <div class="alert alert-success">Election for <?php echo $election->position; ?> created sucessfully. !!!</div> 
                              <?php }else{ ?>
                               <div class="alert alert-danger">Election for <?php echo $election->position; ?> failed to create. !!!</div>  
                               <?php }
                             }



                            ?>

                                    <form role="form" action="" method="POST">

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
                                       
                                      


                                         <div class="form-group">
                                            <label>Position</label>
                                            <input class="form-control" type="text" name="position"> 
                                            <?php if (isset($err['position'])) { ?>
                                           <div class="alert alert-warning"><?php echo $err['position']; ?></div> 
                                          <?php  }    ?>  
                                        </div>

                                        <div class="form-group">
                                            <label>Election Detail</label>
                                            <textarea name="detail" class="form-control"></textarea>  
                                        </div>
                                         <div class="form-group">
                                            <label>Election Date</label>
                                            <input class="form-control" type="date" name="date">
                                            <?php if (isset($err['date'])) { ?>
                                           <div class="alert alert-warning"><?php echo $err['date']; ?></div> 
                                          <?php  }    ?>  
                                        </div>
                                        
                                       
                                        
                                        <button type="submit" class="btn btn-default" name="btnCreate" >Create ELection</button>
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