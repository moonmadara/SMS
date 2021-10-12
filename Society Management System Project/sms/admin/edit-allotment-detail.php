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
$name=$_POST['name'];
$contnum=$_POST['contnum'];
$block=$_POST['block'];
$flatnum=$_POST['flatnum'];
$econtnum=$_POST['econtnum'];
$memfamily=$_POST['memfamily'];
$address=$_POST['address'];



$sql="update tblallotment set Name=:name,ContactNumber=:contnum,Block=:block,FlatNum=:flatnum,EContactnum=:econtnum,Noofmember=:memfamily,Address=:address where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':contnum',$contnum,PDO::PARAM_STR);
$query->bindParam(':block',$block,PDO::PARAM_STR);
$query->bindParam(':flatnum',$flatnum,PDO::PARAM_STR);
$query->bindParam(':econtnum',$econtnum,PDO::PARAM_STR);
$query->bindParam(':memfamily',$memfamily,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

   echo '<script>alert("Allotment detail has been updated")</script>';


}
?>
<!doctype html>
<html lang="en">

<head>
<title>Society Mentainence System || Update Allotment Detail</title>

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
                        <h2>Update Allotment Detail</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Update Allotment Detail</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Update Allotment Detail</h2>
                        </div>
                        <div class="body">
                           
                            <form id="basic-form" method="post">
                                <?php
                   $eid=$_GET['editid'];
$sql="SELECT * from tblallotment where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlentities($row->Name);?>" required="true"></div>
                                
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="contnum" id="contnum" class="form-control" required="true" maxlength="10" pattern="[0-9]+" value="<?php echo htmlentities($row->ContactNumber);?>">
                                </div>
                                <div class="form-group">
                                    <label>Block</label>
<select type="text" name="block" id="block" value="" onChange="getblock(this.value)" class="form-control" required="true">
<option value="<?php echo htmlentities($row->Block);?>"><?php echo htmlentities($row->Block);?></option>
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
                                    <label>Flat Number</label>
                                    <select type="text" name="flatnum" id="flatnum" value="" class="form-control" required="true">
<option value="<?php echo htmlentities($row->FlatNum);?>"><?php echo htmlentities($row->FlatNum);?></option>
      
                                                        
                                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Emergency Contact Number</label>
                                    <input type="text" name="econtnum" id="econtnum" class="form-control" required="true" maxlength="10" pattern="[0-9]+" value="<?php echo htmlentities($row->EContactnum);?>">
                                </div>
                                 <div class="form-group">
                                    <label>Total member of family</label>
                                    <input type="text" name="memfamily" id="memfamily" class="form-control" required="true" value="<?php echo htmlentities($row->Noofmember);?>">
                                </div>
                                <div class="form-group">
                                    <label>Permanent Address(if any)</label>
                                    <textarea type="text" name="address" id="address" rows="4" cols="4" class="form-control"><?php echo htmlentities($row->Address);?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Allotment Date</label>
                                    <input type="text" name="AllotmentDate" id="AllotmentDate" class="form-control" readonly="true" value="<?php echo htmlentities($row->AllotmentDate);?>">
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