
<?php 
$title = 'Add Staff';

?>

<?php
 require_once('class/staff.php');
  $staff = new Staff();
  $std = $staff->selectStaffType();
if (isset($_POST['btnSave'])) {

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

    if (isset($_POST['password']) && !empty($_POST['password'])) {
       $staff->password = $_POST['password'];
   }else{
    $err['password'] = "Assign Password For Staff";
   }

   $staff->status = $_POST['status'];
   $staff->last_login = date('Y-m-d H:i:s');

  if (count($err) == 0) {
    $st = $staff->save();
  }

}
?>

<?php
  session_start();
  if (!isset($_SESSION ['email'])) {
    header('location: index.php');
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
    <title> <?php echo $title; ?> | Online Voting System </title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!--Linking css for view staff table -->
     <link href="dist/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script> 
 <script type="text/javascript">
  //jquery load
  $(document).ready(function (){

    //caputring keyup event
    $('#id').keyup(function(){
      //get value of username field
      var staff_id = $(this).val();
      

      $.ajax({
        url:'check_staffid.php',
        data:{'id' :staff_id},
        dataType:'text',
        method:'post',
        success:function(resp){
          if (resp == 'Staff Id Available.') {
            $('#err_name').css({'color':'green'});
          } else {
            $('#err_name').css({'color':'red'});
          }
          $('#err_name').text(resp);
        }
      });
    });

  });

  </script>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Online Voting System Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Welcome || <b><?php echo $_SESSION ['name']; ?></b>  <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                         <li>
                            <a href="#"><i class="fa   fa-male "></i> Staff Management<span class ="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="add_staff_type.php"><i class="fa fa-plus"></i> Add Staff Type</a>
                                </li>
                                <li>
                                    <a class="active" href="add_staff.php"><i class="fa fa-plus"></i> Add Staff</a>
                                </li>
                                <li>
                                    <a href="view_staff.php"><i class="fa fa-list"></i> View Staff</a>
                                </li>
                                 <li>
                                    <a class="active" href="activate_staff.php"><i class="fa fa-user fa-check"></i> Activate Staff</a>
                                </li>
                                 <li>
                                    <a class="active" href="deactivate_staff.php"><i class="fa fa-user fa-times"></i> De-Activate Staff</a>
                                </li>
                                 
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                         </li>

                         <li>
                            <a href="#"><i class="fa  fa-list-alt"></i> Election Management<span class ="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a class="active" href="assign_election_name.php"><i class="fa fa-plus-square-o"></i> Assign Name</a>
                                </li>
                                <li>
                                    <a class="active" href="create_election.php"><i class="fa fa-plus-square-o"></i> Create Election</a>
                                </li>
                                <li>
                                    <a href="list_election.php"><i class="fa fa-list"></i> View Election</a>
                                </li>
                               
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href="#"><i class="fa   fa-female "></i> Candidate Management<span class ="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                <li>
                                    <a class="active" href="add_candidate.php"><i class="fa fa-plus"></i> Add Candidate</a>
                                </li>
                                                                <li>
                                    <a class="active" href="list_candidate.php"><i class="fa fa-list"></i> View Candidate</a>
                                </li>
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <li>
                            <a href="#"><i class="fa   fa-female "></i> Result Management<span class ="fa arrow"></span></a>
                            
                            <ul class="nav nav-second-level">
                               <li>
                                    <a class="active" href="search_result.php"><i class="fa fa-plus"></i>View Result</a>
                                </li>
                               
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>



                       

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>



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
                            <?php  
                             if (isset($st)) {
                               if ($st = true) { ?>
                              <div class="alert alert-success">Staff Registered Successfully !!!</div> 
                              <?php }else{ ?>
                               <div class="alert alert-danger">Staff Registeration Failed !!!</di>  
                               <?php }
                             }



                            ?>


                                    <form role="form" action="" method="POST">
                                        
                                        <div class="form-group">
                                            <label>Staff Id</label>
                                            <input class="form-control" type="text" name="staff_id" id="id"> 
                                            <span id="err_name"></span><br>
                                             <?php
                                           if (isset($err['staff_id'])) { ?>
                                           <div class="alert alert-warning"><?php echo $err['staff_id']; ?></div> 
                                              
                                         <?php  }
                                        ?> 
                                       
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name">
                                        <?php
                                           if (isset($err['name'])) { ?>
                                          <div class="alert alert-warning"><?php echo $err['name']; ?></div> 
                                            <?php }
                                        ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Staff Type</label>
                                            <select name="staff_type_id" id="staff_type_id" class="form-control">
                                                <option></option>
                                                <?php
                                                   foreach ($std as $s ) { ?>
                                                  <option value="<?php echo $s->Staff_Type_Id;?>"><?php echo $s->Staff_Type; ?></option>
                                                  <?php  }
                                                ?>
                                                
                                            </select>
                                        <?php
                                           if (isset($err['staff_type_id'])) { ?>
                                            <div class="alert alert-warning"><?php echo $err['staff_type_id']; ?></div> 
                                         <?php    }
                                        ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" >
                                            
                                        <?php
                                           if (isset($err['email'])) { ?>
                                            <div class="alert alert-warning"><?php echo $err['email']; ?></div> 
                                           <?php  }
                                        ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input class="form-control" type="number" name="mobile_no" min= 0 >
                                        <?php
                                           if (isset($err['mobile_no'])) { ?>
                                            <div class="alert alert-warning"><?php echo $err['mobile_no']; ?></div> 
                                        <?php      }
                                        ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Status</label>
                                            <input type="radio" name="status" value="1" checked="">Active
                                            <input type="radio" name="status" value="0"> De-Active
                                        </div>
                                         <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password">
                                        <?php
                                           if (isset($err['password'])) { ?>
                                             <div class="alert alert-warning"><?php echo $err['password']; ?></div> 
                                          <?php   }
                                        ?>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default" name="btnSave" >Save Staff</button>
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