<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['smsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$vid=$_GET['viewid'];
$remark=$_POST['remark'];
$status=$_POST['status'];
$sql="update tblcomplain set AdminRemark=:remark,Status=:status where ID=:vid";
$query=$dbh->prepare($sql);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
 $query->execute();

  echo '<script>alert("Complain has been updated")</script>';

  }

?>
<!doctype html>
<html lang="en">

<head>
<title>Society Mentainence System || Complain Detail</title>

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
                        <h2>Complain Detail</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Complain Detail</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                       <?php
                   $vid=$_GET['viewid'];
$sql="SELECT RequestID,ComplainType,ComplainDes,CompRaisedate,Status,AdminRemark, ResolvedDate,Name,ContactNumber,Block,FlatNum,EContactnum,Noofmember,Address,AllotmentDate from tblcomplain join tblallotment on tblcomplain.UserID=tblallotment.ID where tblcomplain.ID=:vid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                        <div class="header">
                            <h2 style="color: red;text-align: center;">Complain By Block: <?php  echo $row->Block;?> Flat Num: <?php  echo $row->FlatNum;?>  </h2>
                        </div>
                        <div class="body">
                           
                            
                               
                              <table border="1" class="table table-bordered mg-b-0">
                                            <tr>
    <th>Requet ID</th>
    <td><?php  echo $row->RequestID;?></td>
    <th>Complain Type</th>
    <td><?php  echo $row->ComplainType;?></td>
  </tr>
  

  <tr>
    <th>Complain Description</th>
    <td><?php  echo $row->ComplainDes;?></td>
    <th>Complian Raised Date</th>
    <td><?php  echo $row->CompRaisedate;?></td>
  </tr>
  <tr>
    <th>Complain Raised By</th>
    <td><?php  echo $row->Name;?></td>
    <th>Mobile Number</th>
    <td><?php  echo $row->ContactNumber;?></td>
      </tr>
      <tr>
    
      </tr>
      <tr>
    <th>Block</th>
    <td><?php  echo $row->Block;?></td>
    <th>Flat</th>
    <td><?php  echo $row->FlatNum;?></td>
      </tr>
   
      <tr>
    <th>Status</th>
    <td colspan="3"> <?php  
if($row->Status=="")
{
  echo "Not Updated Yet";
}
else
{
  echo ($row->Status);
}

     ;?></td>
  </tr>
  <?php $cnt=$cnt+1;}} ?> 
 <?php if($row->Status=="" || $row->Status=="In Progress"){ ?>
    <form method="post">
         <tr>
    <th>Admin Remark :</th>
    <td colspan="3">
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control" required="true"></textarea></td>
  </tr>  
  <tr>
    <th>Status</th>
    <td colspan="3"><select type="text" name="status" required="true" class="form-control">
      <option value="In Progress">In Progress</option>
      <option value="Resolved">Resolved</option>
    </select></td>
  </tr>                             
 <tr align="center">
    <td colspan="4"><button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button></td>
  </tr>
                                        </form>
               <?php } else { ?>

  <tr>
    <tr>
    <th>Admin Remark</th>
   
    <td><?php  echo $row->AdminRemark;?></td>
  <th>Resolved Date</th>
   
    <td><?php  echo $row->ResolvedDate;?></td>
  </tr>
  
    <?php } ?>

 

</table> 
                            
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