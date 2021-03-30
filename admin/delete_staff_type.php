<?php 
$title = 'Delete Staff Type';
require_once('include/header.php');
?>

<?php
  require_once('class/staff.php');
  $staff = new Staff();
  $stData = $staff->selectStaffType();

  if (isset($_POST['btnDelete'])) {
     $err = [];
     if (isset($_POST['staff_type']) && !empty($_POST['staff_type'])) {
      $staff->staff_type = $_POST['staff_type'];
     }else{
      $err['staff_type'] = "Select Staff type need to Delete!!!";
     }

     if (count($err) == 0) {
       $st = $staff->deleteStaffType();
       
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
                           <b>Delete Staff Type</b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                            <?php  
                             if (isset($st)) {
                               if ($st = true) { ?>
                              <div class="alert alert-success"> Staff Type has been Deleted Sucessfully !!!</div> 
                              <?php }else{ ?>
                               <div class="alert alert-danger">Staff Type Cannot be Deleted!!!!!!</div>  
                               <?php }
                             }



                            ?>
                                    <form role="form" action="" method="POST">
                                           
                                         <div class="form-group">
                                            <label>Staff Type</label>
                                           <select name="staff_type" id="staff_type">
                                                <option></option>
                                                <?php
                                                   foreach ($stData as $sd ) { ?>
                                                  <option value="<?php echo $sd->Staff_Type_Id; ?>"><?php echo $sd->Staff_Type; ?></option>
                                                  <?php  }
                                                ?>
                                            </select>
                                        <?php
                                           if (isset($err['staff_type'])) { ?>
                                              <div class="alert alert-warning"> <?php echo $err['staff_type']; ?> </div>  
                                           <?php  }
                                        ?>
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" class="btn btn-default" name="btnDelete" >Delete StaffType</button>
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