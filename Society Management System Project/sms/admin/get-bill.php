<?php

if(!empty($_POST["units_price"])) 
{
 $id=$_POST['units_price'];
$dta=explode("$",$id);
$id=$dta[0];
$id1=$dta[1];
?>
<option  value="<?php echo $id*$id1?>"><?php echo $id*$id1?></option>
<?php
}
?>