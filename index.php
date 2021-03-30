<?php
require_once('admin/class/staff.php');
$staff = new Staff();
$std = $staff->selectStaffType();


//Validating Login form. 
  if (isset($_POST['btnLogin'])) {
     $err=array();
      if (isset($_POST['staff_id']) && !empty($_POST['staff_id'])) {
         $staff_id= $_POST['staff_id'];
      }else{
        $err['staff_id']="Staff Id is required";
      }
       if (isset($_POST['staff_type']) && !empty($_POST['staff_type'])) {
         $staff_type = $_POST['staff_type'];
       }else{
        $err['staff_type'] = "Select your staff type";
       }

      if (isset($_POST['password']) && !empty($_POST['password'])) {
          $password= $_POST['password'];
      }else{
        $err['password']="Enter your password";  
      }

      if (count($err) == 0) {
        $staff->staff_id = $staff_id;
        $staff->staff_type = $staff_type;
        $staff->password = md5($password);
        $status = $staff->login();

        if ($status) {
         header('location: dashboard.php');
       }else{
        $emsg = 'Login Failed !!!';
       }
        
      }
     
   }   
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff Login | Online Voting System</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4" align="center">
            <h2>Staff Login | OVS</h2>
                <div class="login-panel panel panel-default">

                    <div class="panel-heading" align="center">
                        <h3 class="panel-title">Login to start your session</h3>
                    </div>
                    <div class="panel-body">
                    
                    <?php
                     if (isset($emsg)) { ?>
                       <div class="alert alert-danger"><?php echo $emsg; ?></div>
                    <?php }
                    ?>

                        <form role="form" action="index.php" method="post"  id="loginform" >
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Staff Id" name="staff_id" type="text" autofocus required="" > 
                                       <?php
                                           if (isset($err['staff_id'])) { ?>
                                             <div class="alert alert-warning"><?php echo $err['staff_id']; ?></div> 
                                         <?php    }
                                        ?>
                                </div>
                               
                                 <div class="form-group">
                                            <select name="staff_type" id="staff_type_id" class="form-control" required="" >
                                               <option>Select Staff Type</option>
                                                <option></option>
                                                <?php
                                                   foreach ($std as $s ) { ?>
                                                  <option value="<?php echo $s->Staff_Type_Id;?>"><?php echo $s->Staff_Type; ?></option>
                                                  <?php  }
                                                ?>
                                                
                                            </select>
                                        <?php
                                           if (isset($err['staff_type'])) { ?>
                                            <div class="alert alert-warning"><?php echo $err['staff_type']; ?></div> 
                                         <?php    }
                                        ?>
                                        </div>


                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="" >
                                       <?php
                                           if (isset($err['password'])) { ?>
                                             <div class="alert alert-warning"><?php echo $err['password']; ?></div> 
                                         <?php    }
                                        ?>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="btnLogin">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    
    <!---Jquery validation-->
    <script src="js/validation/dist/jquery.validate.min.js"></script>
    
            
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
 
     <script type="text/javascript">
          $(document).ready(function(){
            $('#loginform').validate();
            $('.login-success').fadeOut(200,function(){
              window.location = 'dashboard.php' ;
            });
            });
    </script>
  

</body>

</html>
