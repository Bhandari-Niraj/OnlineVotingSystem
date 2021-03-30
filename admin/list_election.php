<?php
 $title = 'Election List';
 require_once('include/header.php');
?>
<?php
 require_once('class/election.php');
 $election = new Election();
 $electData = $election->selectAllElection();



 $electName = $election->selectName();
 

 require_once('class/candidate.php');
 $candidate = new Candidate();
 $canData = $candidate->selectAllCandidate();


?>
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
                 <div class="alert alert-success">Election has been deleted Sucessfully !!!</div>
                  <?php }?>

                  <?php if (isset($_GET['msg']) && $_GET['msg'] == 2) { ?>
                 <div class="alert alert-success">Election has been Updated Sucessfully !!!</div>
                  <?php }?>

                  
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                          <h2>List of Election</h2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="viewtable">
                                    <thead>
                                        <tr>
                                           <th>Name</th>
                                            <th>Position</th>
                                            <th>Description</th>
                                            <th>Election Date</th>
                                  
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php  
                                    foreach ($electData as $ed) { ?>
                                     <tr>
                                        <td><?php  foreach ($electName as $en) {  
                                            if ($en->Id == $ed->Parent_Id) {
                                                echo $en->Name;
                                            } }  ?></td> 
                                     	<td><b><?php echo $ed->Position;?> </b></td>
                                     	<td><?php echo $ed->Detail; ?></td>
                                     	<td><?php echo $ed->Date; ?></td>
                                    
                                     	<td><a href="edit_election.php?id=<?php echo $ed->Election_Id; ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a> 
                                      <a href="delete_election.php?id=<?php echo $ed->Election_Id; ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete <?php echo $ed->Position; ?> as an Election?')"> <i class="fa fa-trash"></i> Delete</a></td>
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