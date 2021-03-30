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

<!--- Script for showing result in pie-chart -->
    <script type="text/javascript">
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
        theme: "theme2",
        title:{
            text: "<?php echo $electData[0]->Position;?>"
        },
        data: [
        {
            type: "pie",
            showInLegend: true,
            toolTipContent: "{y} - #percent %",
            yValueFormatString: "#0.#,,. Million",
            legendText: "{indexLabel}",
            dataPoints: [
                {  y: 4181563, indexLabel: "PlayStation 3" },
                {  y: 2175498, indexLabel: "Wii" },
                {  y: 3125844, indexLabel: "Xbox 360" },
                {  y: 1176121, indexLabel: "Nintendo DS"},
                {  y: 1727161, indexLabel: "PSP" },
                {  y: 4303364, indexLabel: "Nintendo 3DS"},
                {  y: 1717786, indexLabel: "PS Vita"}
            ]
        }
        ]
    });
    chart.render();
}
    </script>
    <script src="../js/jquery.canvasjs.min.js"></script>

 
 <script type="text/javascript">
  $(document).keyup(function(){
    $('#staff_id').change(function(){
        console.log('niraj');
    })  

  })
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
                            <a href="#"><i class="fa fa-group "></i> Staff Management<span class ="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="add_staff_type.php"><i class="fa fa-plus"></i> Add Staff Type</a>
                                </li>
                                <li>
                                    <a class="active" href="delete_staff_type.php"><i class="fa fa-user fa-times"></i> Delete Staff Type</a>
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
                                    <a class="active" href="assign_election_name.php"><i class="fa fa-plus-square-o"></i> Assign Election Name</a>
                                </li>
                                <li>
                                    <a class="active" href="create_election.php"><i class="fa fa-plus-square-o"></i> Create Election</a>
                                </li>
                                <li>
                                    <a href="list_election.php"><i class="fa fa-list"></i> View Election</a>
                                </li>

                                <li>
                                    <a class="active" href="delete_election_name.php"><i class="fa fa-user fa-times"></i> Delete Election Name</a>
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
                            <a href="#"><i class="fa fa-th "></i> Result Management<span class ="fa arrow"></span></a>
                            
                            <ul class="nav nav-second-level">
                               <li>
                                    <a class="active" href="search_result.php"><i class="fa fa-bullseye"></i> View Result</a>
                                </li> 
                                <li>
                                    <a class="active" href="search_winners.php"><i class="fa fa-list"></i> Winners List</a>
                                </li>                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-header "></i> Help<span class ="fa arrow"></span></a>
                            
                            <ul class="nav nav-second-level">
                               <li>
                                    <a class="active" href="admin_guide/admin_manual.pdf"><i class="fa fa-book"></i> Admin Guide</a>
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