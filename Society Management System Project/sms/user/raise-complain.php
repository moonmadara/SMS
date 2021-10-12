<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['smsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$uid=$_SESSION['smsuid'];
$requestid=mt_rand(100000000, 999999999);
$comtype=$_POST['comtype'];
$comdes=$_POST['comdes'];

$sql="insert into tblcomplain(RequestID,UserID,ComplainType,ComplainDes)values(:requestid,:uid,:comtype,:comdes)";
$query=$dbh->prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':requestid',$requestid,PDO::PARAM_STR);
$query->bindParam(':comtype',$comtype,PDO::PARAM_STR);
$query->bindParam(':comdes',$comdes,PDO::PARAM_STR);
$query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Complain has been raised.")</script>';
echo "<script>window.location.href ='raise-complain.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!doctype html>
<html lang="en">

<head>
<title>Society Mentainence System || Raise Complain</title>

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
                        <h2>Raise Complain</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li> 
                            <li class="breadcrumb-item active">Raise Complain</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Raise Complain</h2>
                        </div>
                        <div class="body">
                           
                            <form id="basic-form" method="post">
                                <div class="form-group">
                                    <label>Complain Type</label>
                                   <select type="text" id="comtype" name="comtype" class="form-control" required="true">
<option value="">Choose Complain Type</option>
<option value="Carpenter">Carpenter</option>
<option value="Electrical">Electrical</option>
<option value="Plumbing">Plumbing</option>
<option value="Common Area">Common Area</option>
<option value="Security">Security</option>
<option value="Fire">Fire</option>
<option value="Lift">Lift</option>
<option value="Security">Sports & Recreational</option>
<option value="Parking">Parking</option>
<option value="Billing & Payment">Billing & Payment</option>
<option value="Events">Events</option>
<option value="Landscaping">Landscaping</option>
<option value="RWA Memebership">RWA Memebership</option>
<option value="DG">DG</option>
<option value="STP">STP</option>
<option value="Gym">Gym</option>
<option value="Other">Other</option>
                                   </select></div>
                                
                              
                                <div class="form-group">
                                    <label>Complain Description</label>
                                     <textarea name="comdes" id="comdes" rows="9" placeholder="Enter Visitor Address..." class="form-control" required="true"></textarea>
                                </div>
                           
                                <br>
                                <button type="submit" class="btn btn-primary" name="submit" id="submit">Add</button>
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