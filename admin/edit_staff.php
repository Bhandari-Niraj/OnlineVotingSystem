<?php 
$title = 'Edit Staff';
require_once('include/header.php');
?>

<?php
 require_once('class/staff.php');
   $staff =  new Staff();
   $std = $staff->selectStaffType();

 if ($_GET['id']) {
 	$id = $_GET['id'];
   $staff->id = $id;
   $sdata = $staff->selectStaffById();
 
   $sdata = $sdata[0];

 }

?>




<?php

if (isset($_POST['btnUpdate'])) {

    $err = array();

    if (isset($_POST['staff_id']) && !empty($_POST['staff_id'])) {
      $staff->staff_id = $_POST['staff_id'];
    }else{
     $err['staff_id'] = "Enter Staff Id";   
    }
   

   if (isset($_POST['name']) && !empty($_POST['name'])) {
      $staff->name = $_POST['name'];
   }else{
    $err['name'] = "Enter Staff Name";
   }

    if (isset($_POST['staff_type_id']) && !empty($_POST['staff_type_id'])) {
       $staff->staff_type_id = $_POST['staff_type_id'];
   }else{
    $err['staff_type_id'] = "Select Staff Type";
   }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
       $staff->email = $_POST['email'];
   }else{
    $err['email'] = "Enter Staff Email";
   }

    if (isset($_POST['mobile_no']) && !empty($_POST['mobile_no'])) {
       $staff->mobile_no = $_POST['mobile_no'];
   }else{
    $err['mobile_no'] = "Enter Staff Mobile Number";
   }

  

   $staff->status = $_POST['status'];
   $staff->last_login = date('Y-m-d H:i:s');

  if (count($err) == 0) {
    $st = $staff->edit();

    if ($st) { ?>
     <script type="text/javascript">
      window.location = 'view_staff.php?msg=2';
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
                           <b>Add Staff</b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                            

                                    <form role="form" action="" method="POST">
                                        
                                        <div class="form-group">
                                            <label>Staff Id</label>
                                            <input class="form-control" type="text" name="staff_id" value="<?php echo $sdata->Staff_Id ;?>">
                                        <?php
                                           if (isset($err['staff_id'])) {
                                               echo $err['staff_id'];
                                           }
                                        ?> 
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="<?php echo $sdata->Name;   ?>">
                                        <?php
                                           if (isset($err['name'])) {
                                               echo $err['name'];
                                             }
                                        ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Staff Type</label>
                                            <select name="staff_type_id" id="staff_type_id" class="form-control">
                                              <option></option>
                                              <?php
                                                foreach ($std as $s) {
                                                  if ($s->Staff_Type_Id == $sdata->Staff_Type_Id) {  ?>
                                               <option value="<?php echo $s->Staff_Type_Id; ?>" selected=""><?php echo $s->Staff_Type;?></option>
                                                 <?php  }else{ ?>
                                               <option value="<?php echo $s->Staff_Type_Id; ?>"><?php echo $s->Staff_Type;?></option>
                                               <?php   }
                                                }
                                              ?>  
                                                
                                            </select>
                                        <?php
                                           if (isset($err['staff_type'])) {
                                               echo $err['staff_type'];
                                             }
                                        ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" value="<?php echo $sdata->Email; ?>">
                                        <?php
                                           if (isset($err['email'])) {
                                               echo $err['email'];
                                             }
                                        ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input class="form-control" type="number" name="mobile_no" value="<?php echo $sdata->Mobile_No;  ?>" min= 0 >
                                        <?php
                                           if (isset($err['mobile_no'])) {
                                               echo $err['mobile_no'];
                                             }
                                        ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Status</label>
                                            <?php if ($sdata->Status == 1) { ?>
                                           <input type="radio" name="status" value="1" checked="">Active
                                           <input type="radio" name="status" value="0"> De-Active
                                         <?php   } else{ ?>
                                            <input type="radio" name="status" value="1" >Active
                                            <input type="radio" name="status" value="0" checked=""> De-Active
                                           <?php 	} ?>
                                            
                                        </div>
                                         
                                        
                                        <button type="submit" class="btn btn-default" name="btnUpdate" >Edit Staff</button>
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