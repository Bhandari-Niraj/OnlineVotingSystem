<?php
 $title = 'List of Election';
 require_once('include/header.php');
?>
<?php
 require_once('admin/class/election.php');
 $election = new Election();
 $electName = $election->selectName();
 $electData = $election->selectAllElection();

 require_once('admin/class/candidate.php');
 $candidate = new Candidate();
 $canData = $candidate->selectAllCandidate();


?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                 <div class="row">
                <div class="col-lg-12">
                

                  
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
                                            <th>Election Name</th>
                                            <th>Position</th>
                                            <th>Detail</th>
                                            <th>Election Date</th>
                                            <th>Candidates</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                  <?php  
                                    foreach ($electData as $ed) { ?>
                                     <tr>
                                      <td><b><?php  foreach ($electName as $en) {  
                                            if ($en->Id == $ed->Parent_Id) {
                                                echo $en->Name;
                                            } }  ?></b></td> 
                                     	<td><b><?php echo $ed->Position;?></b> </td>
                                     	<td><?php echo $ed->Detail; ?></td>
                                     	<td><?php echo $ed->Date; ?></td>

                                     	 <td><table>
                                        <?php $i=1; 
                                          foreach ($canData as $cd) {
                                          if ($cd->Election_Id == $ed->Election_Id) { ?>
                                           <tr>
                                           <td><?php echo $i; ?></td> <td><?php echo $cd->Name; ?></td>
                                         </tr>
                                          
                                        <?php $i++; }
                                        
                                      
                                          }
                                        ?>
                                      </table></td>
                                     	<td><a href="view_candidate.php?id=<?php echo $ed->Election_Id; ?>" class="btn btn-info">Candidate Info</a> 
                                      <a href="cast_vote.php?id=<?php echo $ed->Election_Id; ?>" class="btn btn-primary"  >Cast Vote</a></td>
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