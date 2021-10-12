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

$name=$_POST['name'];
$contnum=$_POST['contnum'];
$block=$_POST['block'];
$flatnum=$_POST['flatnum'];
$econtnum=$_POST['econtnum'];
$memfamily=$_POST['memfamily'];
$address=$_POST['address'];
$ret="select ID from tblallotment where FlatNum=:flatnum and Block=:block";
$query1=$dbh->prepare($ret);
$query1->bindParam(':flatnum',$flatnum,PDO::PARAM_STR);
$query1->bindParam(':block',$block,PDO::PARAM_STR);
$query1->execute();
$result1=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
 echo '<script>alert("In this block, this flat already Alloted to some one.")</script>';
    } else {

$sql="insert into tblallotment(Name,ContactNumber,Block,FlatNum,EContactnum,Noofmember,Address)values(:name,:contnum,:block,:flatnum,:econtnum,:memfamily,:address)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':contnum',$contnum,PDO::PARAM_STR);
$query->bindParam(':block',$block,PDO::PARAM_STR);
$query->bindParam(':flatnum',$flatnum,PDO::PARAM_STR);
$query->bindParam(':econtnum',$econtnum,PDO::PARAM_STR);
$query->bindParam(':memfamily',$memfamily,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Allotment detail has been added.")</script>';
echo "<script>window.location.href ='add-allotment.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}

?>
<!doctype html>
<html lang="en">

<head>
<title>Society Mentainence System || Allotment Detail</title>

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
                        <h2>Allotment Detail</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li> 
                            <li class="breadcrumb-item active">Allotment Detail</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Allotment Detail</h2>
                        </div>
                        <div class="body">
                           
                            <form id="basic-form" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required="true"></div>
                                
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="contnum" id="contnum" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
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
                                    <label>Emergency Contact Number</label>
                                    <input type="text" name="econtnum" id="econtnum" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                </div>
                                 <div class="form-group">
                                    <label>Total member of family</label>
                                    <input type="text" name="memfamily" id="memfamily" class="form-control" required="true">
                                </div>
                                <div class="form-group">
                                    <label>Permanent Address(if any)</label>
                                    <textarea type="text" name="address" id="address" rows="4" cols="4" class="form-control"></textarea>
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