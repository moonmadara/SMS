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

$visname=$_POST['visname'];

$mobnumber=$_POST['mobilenumber'];

$add=$_POST['address'];
$block=$_POST['block'];
$flatnum=$_POST['flatnum'];
$whomtomeet=$_POST['whomtomeet'];
$reasontomeet=$_POST['reasontomeet'];

$sql="insert into tblvisitor(VisitorName,MobileNumber,Address,WhomtoMeet,ReasontoMeet,Block,FlatNo)values(:visname,:mobnumber,:add,:whomtomeet,:reasontomeet,:block,:flatnum)";
$query=$dbh->prepare($sql);
$query->bindParam(':visname',$visname,PDO::PARAM_STR);
$query->bindParam(':mobnumber',$mobnumber,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':block',$block,PDO::PARAM_STR);
$query->bindParam(':whomtomeet',$whomtomeet,PDO::PARAM_STR);
$query->bindParam(':reasontomeet',$reasontomeet,PDO::PARAM_STR);
$query->bindParam(':flatnum',$flatnum,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Visitors Detail has been added.")</script>';
echo "<script>window.location.href ='add-visitor.php'</script>";
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
<title>Society Mentainence System || Add Visitor</title>

<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="../assets/vendor/parsleyjs/css/parsley.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
<script>
function getblock(val) {
  $.ajax({
type:"POST",
url:"get-block.php",
data:'blockname='+val,
success:function(data){
$("#flatnum").html(data);
}

  });

}</script>
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
                        <h2>Add Visitor</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li> 
                            <li class="breadcrumb-item active">Add Visitor</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Visitor</h2>
                        </div>
                        <div class="body">
                           
                            <form id="basic-form" method="post">
                                <div class="form-group">
                                    <label>Visitor Name</label>
                                   <input type="text" id="visname" name="visname" placeholder="Visitor Name" class="form-control" required="true"></div>
                                
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" class="form-control" maxlength="10" required="true">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                     <textarea name="address" id="address" rows="9" placeholder="Enter Visitor Address..." class="form-control" required="true"></textarea>
                                </div>
                               
                             <div class="form-group">
                                    <label>Block</label>
<select type="text" name="block" id="block" value="" onChange="getblock(this.value)" class="form-control" required="true">
<option value="">Choose Block</option>
                                                        <?php 

$sql2 = "SELECT * from   tblblocks ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->BlockName);?>"><?php echo htmlentities($row->BlockName);?></option>
 <?php } ?> 
            
                                                        
                                                    </select>
                                </div>
                               <div class="form-group">
                                    <label>Flat Number</label>
                                    <select type="text" name="flatnum" id="flatnum" value="" class="form-control" required="true">
<option value="">Choose Flat Number</option>
      
                                                        
                                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Whom to Meet</label>
                                    <input type="text" id="whomtomeet" name="whomtomeet" placeholder="Whom to Meet" class="form-control" required="true">
                                </div>
                                <div class="form-group">
                                    <label>Reason To Meet</label>
                                    <input type="text" id="reasontomeet" name="reasontomeet" placeholder="Reason To Meet" class="form-control" required="true">
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