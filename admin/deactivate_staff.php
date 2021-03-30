
<?php 
$title = 'De-Activate Staff';
require_once('include/header.php');
?>

<?php
  require_once('class/staff.php');
  $staff = new Staff();
  $std = $staff->selectStaffType();
  if (isset($_POST['btnDeactive'])) {
     $err = [];
     if (isset($_POST['staff_type_id']) && !empty($_POST['staff_type_id'])) {
      $staff->staff_type_id = $_POST['staff_type_id'];
     }else{
      $err['staff_type_id'] = "Select staff type to be Deactivated";
     }
     $sdata = $staff->selectAllStaff();

     if (count($err) == 0) {
       $sts = $staff->deactivate();
       

       if ($sts) { ?>
     <script type="text/javascript">
      window.location = 'view_staff.php?msg=3';
     </script>
  <?php  }


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
                           <b>De-Activate Staff</b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                            <?php  
                             if (isset($st)) {
                               if ($st = true) { ?>
                              <div class="alert alert-success"><?php echo $staff->staff_type;?> Staffs has been Deactivated   !!!</div> 
                              <?php }else{ ?>
                               <div class="alert alert-success"><?php echo $staff->staff_type;?> Staffs Cannot be deactivated  !!!!!!</di>  
                               <?php }
                             }



                            ?>


                                    <form role="form" action="" method="POST">
                                        
                                        
                                       
                                        
                                       
                                        <div class="form-group">
                                            <label>Staff Type</label>
                                            <select name="staff_type_id">
                                                <option></option>
                                                <?php
                                                   foreach ($std as $s ) { ?>
                                                  <option value="<?php echo $s->Staff_Type_Id;?>"><?php echo $s->Staff_Type; ?></option>
                                                  <?php  }
                                                ?>
                                            </select>
                                        <?php
                                           if (isset($err['staff_type_id'])) { ?>
                                            <div class="alert alert-warning"><?php echo $err['staff_type_id']; ?></div>
                                          <?php   }
                                        ?>
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" class="btn btn-default" name="btnDeactive" >Deactivate Staff</button>
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