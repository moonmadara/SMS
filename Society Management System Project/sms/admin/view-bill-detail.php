<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['smsaid']==0)) {
  header('location:logout.php');
  } else{
    

?>
<!doctype html>
<html lang="en">

<head>
<title>Society Maintenance System || View Bill</title>

<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/vendor/sweetalert/sweetalert.css"/>

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
<style>
    td.details-control {
    background: url('../assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }
</style>
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
                        <h2>View Bill</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">View Bill</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>View Bill</h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
<?php 
$block=$_GET['bviewid'];
$flatnum=$_GET['viewid'];

?>            
                          <table border="1" class="table table-bordered">
    <tr>
    <th>Block</th>
    <td><?php  echo ($block);?></td>
    <th>Flat Number</th>
    <td><?php  echo ($flatnum);?></td>
  </tr>
</table>

<?php

$sql="SELECT tblallotment.Name,tblallotment.ContactNumber,tblallotment.Block,tblallotment.FlatNum,tblallotment.EContactnum,tblallotment.Noofmember,tblallotment.Address,tblallotment.AllotmentDate,tblflat.Floor,tblflat.FlatType,tblflat.MCharge from  tblallotment join  tblflat on (tblallotment.FlatNum=tblflat.FlatNum and  tblallotment.Block=tblflat.Block) where(tblallotment.Block=:block and tblallotment.FlatNum=:flatnum)";
$query = $dbh -> prepare($sql);
$query->bindParam(':block',$block,PDO::PARAM_STR);
$query->bindParam(':flatnum',$flatnum,PDO::PARAM_STR);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <table border="1" class="table table-bordered">
                                  <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Allotment Details</td></tr>

    <tr>
    <th>Name</th>
    <td><?php  echo ($row->Name);?></td>
    <th>Mobile Number</th>
    <td><?php  echo ($row->ContactNumber);?></td>
  </tr>
  
  <tr>
    <th>Emergency Contact Number</th>
    <td><?php  echo ($row->EContactnum);?></td>
     <th>No of Member</th>
    <td><?php  echo ($row->Noofmember);?></td>
  </tr>

  <tr>
   
    <th>Address</th>
    <td colspan="3"><?php  echo ($row->Address);?></td>
     
  </tr>
  <tr>
    <th>Block</th>
    <td><?php  echo ($row->Block);?></td>
    <th>Flat No</th>
    <td><?php  echo $fno=$row->FlatNum;?></td>
  </tr>
   <tr>
   
    <th>Floor</th>
    <td><?php  echo ($row->Floor);?></td>
     <th>Flat Type</th>
    <td><?php  echo ($row->FlatType);?></td>
  </tr>
  <tr>
   
    <th>Maintenance Charge</th>
    <td ><?php  echo $mcharge=$row->MCharge;?></td>
   <th>Allotment Date</th>
    <td><?php  echo ($row->AllotmentDate);?></td>   
  </tr>
  

 
   
<?php $cnt=$cnt+1;} ?>
                                </table>
   

<h4 style="font-size:20px;color:blue" align="center">
 Electricity Bill Detail</h4>
 <?php
$sql="SELECT * from tblbill where Block=:block and FlatNum=:flatnum";
$query = $dbh -> prepare($sql);
$query->bindParam(':block',$block,PDO::PARAM_STR);
$query->bindParam(':flatnum',$flatnum,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row1)
{    
 ?>
   <table border="1" class="table table-bordered">


<tr>
   
    <th>Date of Bill</th>
    <td colspan="3" style="color: red" ><?php  echo ($row1->BillDate);?></td>
     
  </tr>
 <tr> 
   <th >Unit Consumed</th>
    <td colspan="3"><?php  echo ($row1->UnitCons);?>*<?php  echo ($row1->PricepUnit);?>(Price Per Unit)</td>   
  </tr>
  <tr>
   
    <th>Electricity Charge</th>
    <td ><?php  echo $echarge=$row1->Echarge;?></td></tr>
    <tr>

        <tr>
    <th>Maintenance  Charge</th>
    <td ><?php echo $mcharge;?></td></tr>
    <tr>
   <th>Total Charge</th>
    <td><?php  echo $mcharge+$echarge ;?></td>   
  </tr>


 </table> 
    <?php $cnt=$cnt+1;}} ?>                         
   <?php } else {?>
    <h3 align="center" style="color:red"> Flat not alloted</h3>
<?php } ?>

                            </div>
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

<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>

<script src="../assets/vendor/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js --> 


<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/bundles/morrisscripts.bundle.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
</body>
</html>
<?php }  ?>