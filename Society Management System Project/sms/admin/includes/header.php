 <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-brand">
                <a href="dashboard.php">
                   
                    <span class="name">SMS</span>
                </a>
            </div>
            
            <div class="navbar-right">
                <ul class="list-unstyled clearfix mb-0">
                    <li>
                        <div class="navbar-btn btn-toggle-show">
                            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                        </div>                        
                        <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>
                    </li>
                   
                    <li>
                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">
                               
                              
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <i class="icon-bell"></i>
                                        <span class="notification-dot"></span>
                                    </a>
                                    <ul class="dropdown-menu animated bounceIn notifications">
                                        <?php
$sql="SELECT RequestID,ComplainType,ComplainDes,CompRaisedate,Status,AdminRemark, ResolvedDate,Name,ContactNumber,Block,FlatNum,EContactnum,Noofmember,Address,AllotmentDate from tblcomplain join tblallotment on tblcomplain.UserID=tblallotment.ID where tblcomplain.Status is null";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$newcomp=$query->rowCount();

            ?>
                                        <li class="header"><strong>You have <?php echo $newcomp;?> new Complains</strong></li>
                                        <?php 
if($query->rowCount()>0){
                       foreach($results as $row)
{  ?>
                                        <li>
                                            <a href="unresolved-complain.php">
                                               
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-info text-warning"></i>
                                                    </div>
                                                    <div class="media-body">

                                                        <p class="text"><?php echo $row->Name;?> <strong>Block: <?php echo $row->Block;?></strong>Flat Number <?php echo $row->FlatNum;?>.</p>
                                                        <span class="timestamp"><?php echo $row->CompRaisedate;?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>                               
                                        <?php }}  else {?>
                       
                      
                       
                        <li>
                           <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>No Records
                                   
                                </div>
                            </a>
                        </li>
                        <?php } ?>

                                     
                                        <li class="footer"><a href="total-complain-complain.php" class="more">See all notifications</a></li>
                                    </ul>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <img class="rounded-circle" src="assets/images/download.png" width="30" alt="">
                                    </a>
                                    <div class="dropdown-menu animated flipInY user-profile">
                                        <div class="d-flex p-3 align-items-center">
                                            <?php
$aid=$_SESSION['smsaid'];
$sql="SELECT AdminName,Email from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                            <div class="drop-left m-r-10">
                                                <img src="../assets/images/user.jpg" class="rounded" width="50" alt="">
                                            </div>
                                            <div class="drop-right">

                                                <h4><?php  echo $row->AdminName;?></h4>
                                                <p class="user-name"><?php  echo $row->Email;?></p>
                                            </div>
                                        </div>
                                        <?php $cnt=$cnt+1;}} ?>
                                        <div class="m-t-10 p-3 drop-list">
                                            <ul class="list-unstyled">
                                                <li><a href="admin-profile.php"><i class="icon-user"></i>My Profile</a></li>
                                                
                                                <li><a href="change-password.php"><i class="icon-settings"></i>Settings</a></li>
                                                <li class="divider"></li>
                                                <li><a href="logout.php"><i class="icon-power"></i>Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>