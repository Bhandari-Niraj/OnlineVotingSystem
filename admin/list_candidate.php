<?php
 $title = 'Candidate List';
 require_once('include/header.php');
?>
<?php
 require_once('class/election.php');
 $election = new Election();
 $electName = $election->selectName();
 $electData = $election->selectAllElection();

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
                 <div class="alert alert-success">Candidate deleted Sucessfully !!!</div>
                  <?php }?>

                  <?php if (isset($_GET['msg']) && $_GET['msg'] == 2) { ?>
                 <div class="alert alert-success">Candidate Updated Sucessfully !!!</div>
                  <?php }?>

                  
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                          <h2>List of Candidate</h2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                             <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="viewtable">
                                    <thead>
                                        <tr>
                                            <th>Candidate Name</th>
                                            <th>ELection Name</th>
                                            <th>Election Position</th>
                                            <th>Detail</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php foreach ($canData as $cd) { ?>
                                    <tr>
                                      <td> <?php echo $cd->Name; ?></td>
                                      <td><b><?php  foreach ($electName as $en) {  
                                            if ($en->Id == $cd->Parent_Id) {
                                                echo $en->Name;
                                            } }  ?></td> 
                                      <td> <?php foreach ($electData as $ed) {
                                       if ($ed->Election_Id == $cd->Election_Id) {
                                         echo $ed->Position;
                                       }
                                      } ?> </b></td>
                                      <td><?php echo $cd->Detail; ?></td>
                                       <td><img src="images/<?php echo $cd->Photo; ?>" alt="<?php echo $cd->Name; ?>" width='100' ></td>
                                       <td><a href="edit_candidate.php?id=<?php echo $cd->Candidate_Id; ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a> 
                                      <a href="delete_candidate.php?id=<?php echo $cd->Candidate_Id; ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete <?php echo $cd->Name; ?> from Candidate?')">
                                       <i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                                  <?php }

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