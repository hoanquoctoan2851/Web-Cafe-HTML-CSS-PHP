 <?php 


  session_start();

  if (!isset($_SESSION['customer_email'])) {

      echo "<script>window.open('http://localhost/CafeWeb/customer/logout.php','_self')</script>";
    
  }else{
    include("includes/db.php");
    include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="CSS/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/CSSAcount.css">
    <title>TDCN</title>
</head>
<body>
    <div class="vungbao">
        <span class="vunghotro">
            <a href="Home.html"><span style="color: white"> Trang Chủ </span></a>
            <a href="http://localhost/CafeWeb/Order.php"><span style="color: white"> | Order </span></a>
        </span>
        <span class="dangki">
            <a href="http://localhost/CafeWeb/customer/acount.php"><span style="color: white"> Acount </span></a>
            <a href="logout.php"><span style="color: white"> | Logout </span></a>
        </span>
        <div class="vunglogo">
        	<a href="Home.html"><img src="Images/logo1.gif" width="300" height="170" border="0px" /></a>
        </div>
        <div class="vungbanner"><img src="Images/cafe-10.png" width="770" height="150" /></div> 
        <div class="container1">
            <span class="col-md-3">
            <?php 
              include("includes/sidebar.php") 
            ?>
            </span>
            <div class="col-md-8" style='margin-top: 75px;'>   <!--col md 9-->
                <div class="box" >     <!--box-->
                <?php 
                if (isset($_GET['my_orders'])) {
                include("my_orders.php");   
                    }
                ?>
                <?php 
                    if (isset($_GET['edit_acount'])) {    
                    include("edit_acount.php");   
                    }
                ?>
                <?php 
                    if (isset($_GET['change_pass'])) {
                    include("change_pass.php");   
                    }
                ?>
                </div>           <!--box-->
            </div>       <!--col md 9-->
        </div>
    </div>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/jquery-331.min.js"></script>
</body>
</html>
<?php } ?>
