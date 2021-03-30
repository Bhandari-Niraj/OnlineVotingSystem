
<?php 
 $title = 'Staff List';
require_once ('include/header.php');
?>

<?php
require_once('class/staff.php');
$staff = new Staff();
//Calling Function to select Staff type detail from  staff type table.
$std = $staff->selectStaffType();
//Calling Function to select Staff detail from staff table.
$sdata = $staff->selectAllStaff();
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
                <?php if (isset($_GET['msg']) && $_GET['msg'] == 1) { ?>
                 <div class="alert alert-success">Staff has been deleted Sucessfully !!!</div>
                  <?php }?>

                  <?php if (isset($_GET['msg']) && $_GET['msg'] == 2) { ?>
                 <div class="alert alert-success">Staff has been Updated Sucessfully !!!</div>
                  <?php }?>

                  <?php if (isset($_GET['msg']) && $_GET['msg'] == 3) { ?>
                  <div class="alert alert-success"> Selected Staff Type has been Deactivated   !!!</div> 
                  <?php }?>

                   <?php if (isset($_GET['msg']) && $_GET['msg'] == 4) { ?>
                  <div class="alert alert-success"> Selected Staff Type has been Activated   !!!</div> 
                  <?php }?>
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                          <h2>List of Staff</h2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="viewtable">
                                    <thead>
                                        <tr>
                                            <th>Staff Id</th>
                                            <th>Name</th>
                                            <th>Staff Type</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                       foreach ($sdata as $sd) { ?>
                                        <tr >
                                            <td> <?php echo $sd->Staff_Id; ?> </td>
                                            <td> <?php echo $sd->Name;  ?> </td>

                                            <td><?php  foreach ($std as $s) {  
                                            if ($sd->Staff_Type_Id == $s->Staff_Type_Id) {
                                                echo $s->Staff_Type;
                                            } }  ?></td> 
                                            <td> <?php echo $sd->Email;  ?> </td>
                                            <td> <?php echo $sd->Mobile_No;  ?> </td>
                                            <td><?php if ($sd->Status == 1) {
                                                echo "Active";
                                            }else{
                                                echo "Deactive";
                                                }   ?></td>
                                            <td> <a href="edit_staff.php?id=<?php echo $sd->Staff_Id; ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="delete_staff.php?id=<?php echo $sd->Staff_Id; ?>" class="btn btn-danger" 
                                            onclick="return confirm('Are you sure, you want to delete <?php echo $sd->Name; ?> from staff table?')">
                                            <i class="fa fa-trash" > </i> Dlelete </a> </td>
                                        </tr>
                                      
                                     <?php  }
                                    ?>
                                     
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