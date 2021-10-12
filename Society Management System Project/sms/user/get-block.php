<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


 if(isset($_POST['blockname'])){
 $fnum=$_POST['blockname'];
  $sql3="select * from tblflat where Block=:fnum";
$query3 = $dbh -> prepare($sql3);
    $query3->bindParam(':fnum',$fnum,PDO::PARAM_STR);
$query3->execute();
$result3=$query3->fetchAll(PDO::FETCH_OBJ);

foreach($result3 as $row3)
{          
    ?>  
<option value="<?php echo htmlentities($row3->FlatNum);?>"><?php echo htmlentities($row3->FlatNum);?></option>

<?php }} ?>

