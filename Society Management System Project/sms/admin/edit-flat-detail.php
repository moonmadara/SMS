<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['smsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$smsaid=$_SESSION['smsaid'];
$eid=$_GET['editid'];
$flatnum=$_POST['flatnum'];
$floor=$_POST['floor'];
$block=$_POST['block'];
$ftype=$_POST['ftype'];
$mcharge=$_POST['mcharge'];

$sql="update tblflat set FlatNum=:flatnum,Floor=:floor,Block=:block,FlatType=:ftype,MCharge=:mcharge where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':flatnum',$flatnum,PDO::PARAM_STR);
$query->bindParam(':floor',$floor,PDO::PARAM_STR);
$query->bindParam(':block',$block,PDO::PARAM_STR);
$query->bindParam(':ftype',$ftype,PDO::PARAM_STR);
$query->bindParam(':mcharge',$mcharge,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

  echo '<script>alert("Flat detail has been updated")</script>';

  }

?>
<!doctype html>
<html lang="en">

<head>
<title>Society Mentainence System || Update Flat</title>

<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="../assets/vendor/parsleyjs/css/parsley.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">

</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="../assets/images/thumbnail.png" width="48" height="48" alt="Mplify"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>

<div id="wrapper">

   <?php include_once('includes/header.php');?>

  <?php include_once('includes/sidebar.php');?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>Update Flat</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Update Flat</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Update Flat</h2>
                        </div>
                        <div class="body">
                           
                            <form id="basic-form" method="post">
                                <?php
                   $eid=$_GET['editid'];
$sql="SELECT * from tblflat where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <div class="form-group">
                                    <label>Flat No</label>
                                    <input type="text" name="flatnum" id="flatnum" class="form-control" value="<?php  echo htmlentities($row->FlatNum);?>" required="true"></div>
                                
                                <div class="form-group">
                                    <label>Floor</label>
                                    <input type="text" name="floor"  class="form-control" required="true" value="<?php  echo htmlentities($row->Floor);?>">
                                </div>
                                <div class="form-group">
                                    <label>Block</label>
                                    <select type="text" name="block" id="block" value="" class="form-control" required="true">
<option value="<?php  echo htmlentities($row->Block);?>"><?php  echo htmlentities($row->Block);?></option>
                                                        <?php 

$sql2 = "SELECT * from   tblblocks ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->BlockName);?>"><?php echo htmlentities($row1->BlockName);?></option>
 <?php } ?> 
            
                                                        
                                                    </select>
                                </div>
                               
                             <div class="form-group">
                                    <label>Flat Type</label>
                                    <select type="text" name="ftype" id="ftype" value="" class="form-control" required="true">
<option value="<?php echo htmlentities($row->FlatType);?>"><?php echo htmlentities($row->FlatType);?></option>
<option value="1 bhk">1 bhk</option>                                                      
<option value="2 bhk">2 bhk</option> 
<option value="3 bhk">3 bhk</option>
<option value="4 bhk">4 bhk</option>
 <option value="5 bhk">5 bhk</option>
 <option value="Duplex">Duplex</option> 
 <option value="Suits">Suits</option>          
                                                        
                                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Maintenance Charge</label>
                                    <input type="text" name="mcharge"  class="form-control" required="true" value="<?php  echo htmlentities($row->MCharge);?>">
                                </div>
                               <?php $cnt=$cnt+1;}} ?> 
                                <br>
                                <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
</div>

<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="../assets/vendor/parsleyjs/js/parsley.min.js"></script>
    
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/bundles/morrisscripts.bundle.js"></script>
<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>
</body>
</html>

<?php }  ?>