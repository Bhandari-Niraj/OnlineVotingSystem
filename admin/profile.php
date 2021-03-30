<?php
$title = 'My Profile';
require_once('include/header.php');
?>
<?php 
  @session_start();

  
?>
<?php
 require_once('class/admin.php');
 $admin = new Admin();
 if (isset($_POST['btnSubmit'])) {
    $err = [];
        
    if (isset($_POST['password1']) && !empty($_POST['password1'])) {
        $password1 = $_POST['password1'];
       
    }else{
       $err['password1'] = 'Eneter new password.'; 
    }
    if (isset($_POST['password2']) && !empty($_POST['password2'])) {
       $password2 = $_POST['password2'];
    }else{
       $err['password2'] = 'Re-type new password must be enetered.' ;
    }

    $admin->admin_id = $_SESSION['admin_id'];
    $admin->password1 = md5($password1);

    if (count($err) == 0 && $password1 == $password2) {
      $st = $admin->editPassword();
    }else{
      $errmsg = "Password doesn't match."; 
    }
 }
;
?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" align="center">
                    <div class="col-lg-12">
                        <h1 class="page-header">Change Password</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-3">
                    
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                    
                        </div>
                        <div class="panel-body">
                            <div class="info">
                                <div class="col-lg-6">
                                 <form method="Post" action="">
                                    <table>
                                     <thead>
                                       <?php if (isset($errmsg)) { ?>
                                          <div class="alert alert-danger"><?php echo $errmsg; ?></div> 
                                   <?php    } ?>  

                                   <?php if (isset($st)) { ?>
                                          <div class="alert alert-success">Password Changed.</div> 
                                   <?php    } ?>   
                                     </thead>
                                     <tbody>
                                        <tr>
                                           <td>New Password:</td> 
                                        </tr>
                                        <tr>
                                          <td><input type="password" name="password1" ></td>
                                        </tr>

                                        <tr>
                                           <td><?php
                                           if (isset($err['password1'])) { ?>
                                          <div class="alert alert-warning"><?php echo $err['password1']; ?></div> 
                                            <?php }
                                        ?></td> 
                                        </tr>
                                         

                                        <tr>
                                           <td>Re-Password:</td> 
                                        </tr>
                                        <tr>
                                          <td><input type="password" name="password2" ></td> 
                                        </tr>
                                        <tr>
                                        <tr>
                                           <td><?php
                                           if (isset($err['password2'])) { ?>
                                          <div class="alert alert-warning"><?php echo $err['password2']; ?></div> 
                                            <?php }
                                        ?></td> 
                                        </tr>
                                          <td><input type="submit" value="Save" class="btn btn-info" name="btnSubmit"></td>  
                                        </tr>
                                        </tbody>
                                    </table>
            
                                 </form>                
                               
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