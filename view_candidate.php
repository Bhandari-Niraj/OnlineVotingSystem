
<?php
 $title = 'Candidate Info';
 require_once('include/header.php');
?>
<?php
if ($_GET['id']) {
require_once('admin/class/candidate.php');
 $candidate = new Candidate();
 $candidate->id = $_GET['id'];
 $canData = $candidate->selectCandidateByELectionId();
}
 require_once('admin/class/election.php');
 $election = new Election();
 $electName = $election->selectName();
 $electData = $election->selectAllElection();

 


?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Staff Dashboard</h1>
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
                          <h3><?php echo $electData[0]->Position; ?> Election | Candidate List</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                             <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="viewtable">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Candidate Name</th>
                                            <th>Election Name</th>
                                            <th>Position</th>
                                            <th>Detail</th>
                                            <th>Photo</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php $i=1; 
                                   foreach ($canData as $cd) { ?>
                                    <tr>
                                    <td><?php echo $i; ?></td>
                                      <td> <?php echo $cd->Name; ?></td>
                                      <td><b><?php  foreach ($electName as $en) {  
                                            if ($en->Id == $cd->Parent_Id) {
                                                echo $en->Name;
                                            } }  ?></b></td> 
                                      <td> <?php foreach ($electData as $ed) {
                                       if ($ed->Election_Id == $cd->Election_Id) {
                                         echo $ed->Position;
                                       }
                                      } ?></td>
                                      
                                      <td><?php echo $cd->Detail; ?></td>
                                       <td><img src="admin/images/<?php echo $cd->Photo; ?>" alt="<?php echo $cd->Name; ?>" width='150' ></td>
                                       
                                    </tr>
                                  <?php $i++;  }

                                   ?>
                                     
                                    </tbody>
                                </table>
                             
                            </div>
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