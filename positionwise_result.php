<?php 
$title = 'Position Wise Result';
?>

<?php
 
 require_once('admin/class/result.php');
 $result = new Result();
 
 require_once('admin/class/election.php');
 $election = new Election();
 $electData = $election->selectAllElection();
 $electName = $election->selectName();



 require_once('admin/class/candidate.php');
 $candidate = new Candidate();
 $canData = $candidate->selectAllCandidate();

 if ($_GET['id']) {
 //Obtaining parent Id of the election and storing it on result parent id variable  
  $election->id = $_GET['id'];

  $ed = $election->selectElectionById();

 
  $parent_id = $election->getParentId();
  //changing obtained array result into object and getting specific parent id value
  $result->parent_id = $parent_id[0]->parent_id;
 //storing current position election_id into result election_id 
  $result->election_id = $_GET['id'];
//Obtaining number of candidates in particular election
 $no_of_candidate = $election->countCandidates();
 $no_of_candidate = $no_of_candidate[0];

 $canInfo = $election->SelectCandidates();


//Obtaining total number of voting in given position election
  $totalVote = $result->countTotalVote();
  $total_vote = $totalVote[0]->votes;
 //Obtaing total numer of vote obtained by each candiate of given position election 
  $vote_obtained = $result->countEachCandidateVote();
}

?>
<?php
  session_start();
  if (!isset($_SESSION ['staff_id'])) {
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
     <link href="admin/dist/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
         window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
        theme: "theme2",
        title:{
            text: "<?php echo $ed[0]->Position. ' Election Result' ;?>"
        },
        data: [
        {
            type: "pie",
            showInLegend: true,
            toolTipContent: "{y} votes out of <?php echo $total_vote; ?> votes. ",
            yValueFormatString: "",
            legendText: "{indexLabel}",
            dataPoints: [
               <?php 
                  foreach ($vote_obtained as $vo) { ?>
                     {  y: "<?php echo $vo->votes; ?>", indexLabel: "Candidate Id - <?php echo $vo->candidate_id; ?>" },
               <?php   }

               ?>
            ]
        }
        ]
    });
    chart.render();
}
    </script>
    <script src="admin/js/jquery.canvasjs.min.js"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


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
                            <a href="#"><i class="fa  fa-list-alt"></i> Election<span class ="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="election_list.php"><i class="glyphicon glyphicon-eye-open"></i> View Election</a>
                                </li>

                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa  fa-list-alt"></i> Result<span class ="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                 <li>
                                    <a class="active" href="search_result.php"><i class="fa fa-bullseye"></i> View Result</a>
                                </li>  
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href="#"><i class="fa fa-th"></i> Winners<span class ="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                 <li>
                                    <a class="active" href="search_winner.php"><i class="fa fa-list"></i> Winner List</a>
                                </li>
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href="#"><i class="fa fa-header "></i> Help<span class ="fa arrow"></span></a>
                            
                            <ul class="nav nav-second-level">
                               <li>
                                    <a class="active" href="admin/admin_guide/staff_manual.pdf"><i class="fa fa-book"></i> Staff Guide</a>
                                </li>                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
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
                     <h1 class="page-header" align="center"><?php echo $ed[0]->Position;?> Position</h1> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                 <div class="row">
                <div class="col-lg-12">
            
                  
                    <div class="panel panel-default">
                      <div class="panel-heading" align="center">
                             
                          </div>  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

          
                    <?php $today = gmdate('Y-m-d');
                     if ($no_of_candidate->candidate == 1 && $today >= $ed[0]->Date) { ?>
                       <div class="alert alert-success" align="center"><h2><?php echo $canInfo[0]->Name.  ' elected as '. $ed[0]->Position. ' [lone Candidate]' ;?></h2></div>  
              <?php      } elseif ($today > $ed[0]->Date) {    ?> 
             
                             <div class="dataTable_wrapper" >
                                <table width="100%" class="table table-striped table-bordered table-hover" id="viewtable" >
                                <thead>

                                        <tr>
                                            <th>Candidate Id </th>
                                            <th>Candidate Name</th>
                                            <th>Photo</th>
                                            <th>Number of Votes </th>
                                            <th>Percentage</th>
                                          
                                        </tr>
                                    </thead>
                                <?php foreach ($vote_obtained as $vo) { ?>
                                 <tbody>
                                     <tr>
                                     <td><?php echo $vo->candidate_id; ?></td>
                                     <?php foreach ($canData as $cd) {
                                         if ($vo->candidate_id == $cd->Candidate_Id) { ?>

                                        <td><?php echo $cd->Name; ?> </td>
                                        <td><img src="admin/images/<?php echo $cd->Photo; ?>" alt="<?php echo $cd->Name; ?>" width='150' ></td>
                                       <?php  }
                                      ?>
                                     
                                    <?php } ?>

                                      <td> <?php echo $vo->votes; ?></td>
                                      <td><?php $votes = $vo->votes;  echo $result->calculatePercentage($votes, $total_vote). ' %' ; ?></td>
                       
                                      
                                    </tr>
                                    </tbody>

                                <?php }  ?>
                                    
                                     
                                  </tfoot> 
                                </table>
                         </div>
                            <!-- /.table-responsive -->                                                      
                        </div>
                        <!-- /.panel-body -->


                        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                           <b> Result Analysis based on pie chart </b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                            <div id="chartContainer" style="height: 500px; width: 100%;"></div>
                                

                            </div>
                        </div>
                        <!-- /.panel-body -->

                        
                    </div>
                    <!-- /.panel -->
                </div>
                  <?php  }else{ ?>
                    <div class="alert alert-danger"><h1 align="center">Election must be completed to view result.</h1></div> 
                <?php    } ?>

                    </div>  


                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


<?php require_once('include/footer.php'); ?>