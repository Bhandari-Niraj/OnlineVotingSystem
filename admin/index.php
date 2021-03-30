<?php
//Validating Login form. 
  if (isset($_POST['btnLogin'])) {
     $err=array();
      if (isset($_POST['email']) && !empty($_POST['email'])) {
         $email= $_POST['email'];
      }else{
        $err['email']="Enter your Email.";
      }

      if (isset($_POST['password']) && !empty($_POST['password'])) {
          $password= $_POST['password'];
      }else{
        $err['password']="Enter your password";  
      }
     
     if (count($err)==0) {
   //calling Admin class
       require_once('class/admin.php');
   //Creating object of Admin class
       $admin= new Admin();
   //Assigning value or parameter of login function into admin object
       $admin->email = $email;
       $admin->password = md5($password);
   //Calling login function.     
       $status = $admin->login();

       if ($status) {
         $smsg = 'Login Successfull !!!';
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

    <title>Admin Login | Online Voting System</title>

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
                     <h2>Admin Login| OVS</h2>
                <div class="login-panel panel panel-default">

                    <div class="panel-heading" align="center">
                        <h3 class="panel-title">Sign in to start your session</h3>
                    </div>
                    <div class="panel-body">
                    <?php 
                      if (isset($smsg)) { ?>
                       <div class="alert alert-success login-success"><?php echo $smsg; ?></div>
                    <?php  }
                    ?>
                    <?php
                     if (isset($emsg)) { ?>
                       <div class="alert alert-danger"><?php echo $emsg; ?></div>
                    <?php }
                    ?>

                        <form role="form" action="index.php" method="post"  id="loginform" >
                            <fieldset>
                                <div class="form-group">

                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required=""> 
                                       <?php if (isset($err['email'])) {
                                        echo $err['email'];
                                          }   
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="" >
                                      <?php
                                        if (isset($err['password'])) {
                                              echo $err['password'];
                                          }  
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
            $('.login-success').fadeOut(500,function(){
              window.location = 'dashboard.php' ;
            });
            });
    </script>
  

</body>

</html>
