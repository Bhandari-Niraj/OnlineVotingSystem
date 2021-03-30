<?php 
 $title = 'Add Candidate';
 require_once('include/header.php');
?>


<?php
require_once('class/election.php');
$election = new Election();
$electName = $election->selectName();
$electData = $election->selectAllElection();


require_once('class/candidate.php');
 $candidate = new Candidate();

if (isset($_POST['btnAdd'])) {
    $err = array();

     if (isset($_POST['election_name']) && !empty($_POST['election_name'])) {
      $candidate->election_name = $_POST['election_name'];
   }else{
    $err['election_name'] = "Election name must be selected.";
   }

   if (isset($_POST['election_id']) && !empty($_POST['election_id'])) {
      $candidate->election_id = $_POST['election_id'];
   }else{
    $err['election_id'] = "Select position for election";
   }

    if (isset($_POST['name']) && !empty($_POST['name'])) {
       $candidate->name = $_POST['name'];
   }else{
    $err['name'] = "Candidate Name is required.";
   }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
       $candidate->email = $_POST['email'];
   }else{
    $err['email'] = "Candidate Email is required.";
   }

    $candidate->candidate_detail = $_POST['candidate_detail'];
//Checking file name for file uploading    
    if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])) {
 //Generating unique file name using function uniqid().   	
    	$pn = uniqid() . '_' . ($_FILES['photo']['name']);
 // Uploading  photo to images folder
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'. $pn);
 // Assign upload file into object       
        $candidate->photo = $pn;
     }else{
     	 $candidate->photo = '';
     }
            
  if (count($err) == 0) {
     
    $st = $candidate->save();
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
                           <b>Add Candidate to Election</b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <?php  
                             if (isset($st)) {
                               if ($st = true) { ?>
                              <div class="alert alert-success">Candidate <?php echo $candidate->name; ?> has been added sucessfully. !!!</div> 
                              <?php }else{ ?>
                               <div class="alert alert-danger">Candidate <?php echo $candidate->name; ?> cannot be been added. !!!</div>  
                               <?php }
                             }



                            ?>

                                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                                        
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
                                            <label>Position </label>
                                            <select class="form-control" name="election_id" id="election_id">
                                             <option></option>
                                             <?php foreach ($electData as $ed ) { ?>
                                              <option value="<?php echo $ed->Election_Id ;?>"><?php echo $ed->Position;?></option>
                                            <?php } ?>
                                            </select> 
                                            <?php if (isset($err['election_id'])) { ?>
                                           <div class="alert alert-warning"><?php echo $err['election_id']; ?></div> 
                                          <?php  }    ?>  
                                        </div>

                                         <div class="form-group">
                                            <label>Candidate Name </label>
                                            <input class="form-control" type="text" name="name"> 
                                            <?php if (isset($err['name'])) { ?>
                                           <div class="alert alert-warning"><?php echo $err['name']; ?></div> 
                                          <?php  }    ?>  
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control">
                                            <?php if (isset($err['email'])) { ?>
                                           <div class="alert alert-warning"><?php echo $err['email']; ?></div> 
                                          <?php  }    ?> 

                                        </div>

                                         <div class="form-group">
                                            <label>Candidate Detail </label>
                                            <textarea class="form-control ckeditor" name="candidate_detail"></textarea>
                                        </div>
   

                                         <div class="form-group">
                                            <label>Candidate Photo</label>
                                            <input type="file" name="photo" class="form-control">
                                        </div>                                                               
                                        
                                        <button type="submit" class="btn btn-default" name="btnAdd" >Add Candidate</button>
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