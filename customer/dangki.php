<?php 
  session_start();
  
  include("includes/db.php");
  include("functions/functions.php")

   ?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TDCN</title>
    <link href="CSS/CSSdangki.css" rel="stylesheet" type="text/css" />  
    <link rel="stylesheet" href="CSS/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
    <div class="vungbao">
        <span class="vunghotro">
            <a href="http://localhost/CafeWeb/Home.html"><span style="color: white"> Trang Chủ </span></a>
            <a href="http://localhost/CafeWeb/thongbao.html"><span style="color: white"> | Order </span></a>
        </span>
        <span class="dangki">
            <a href="dangki.php"><span style="color: white"> Đăng Kí </span></a>
            <a href="dangnhap.php"><span style="color: white"> | Đăng Nhập </span></a>
        </span>
        <div class="vunglogo">
        	<a href="Home.html"><img src="Images/logo1.gif" width="300" height="170" border="0px" /></a>
        </div>
        <div class="vungbanner"><img src="Images/cafe-10.png" width="770" height="150" /></div> 
        <div class="col-md-9" style='padding-top: 50px; padding-left: 400px;'> <!--col md 9 s-->

        <div class="box" >  <!--box s-->
            <div class="box-header">
                <center>
                    <h2>Đăng Kí Tài Khoản</h2>
                </center>
                <form action="dangki.php" method="post" enctype="multipart/form-data">
                    <div class="form-group"> 
                        <label >Your Name</label>
                        <input type="text" class="form-control" name="c_name" required>
                    </div>
                    <div class="form-group"> 
                        <label >Your Email</label>
                        <input type="text" class="form-control" name="c_email" required>
                    </div>
                    <div class="form-group">
                        <label >Your Password</label>
                        <input type="password" class="form-control" name="c_pass" required>
                    </div>
                    <div class="form-group">
                        <label >Your City</label>
                        <input type="text" class="form-control" name="c_city" required>
                    </div>
                    <div class="form-group">
                        <label >Your Address</label>
                        <input type="text" class="form-control" name="c_address" required>
                    </div>
                    <div class="form-group">
                        <label >Your Contact</label>
                        <input type="text" class="form-control" name="c_contact" required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="register">
                        <i class="fa fa-user-md"></i> Xác Nhận
                        </button>
                    </div>  
                </form>
            </div>
        </div>      <!--box e-->
    </div>      <!--col md 9 e-->
<script src="js/bootstrap-337.min.js"></script>
<script src="js/jquery-331.min.js"></script>

</body>
</html>


<?php 

if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass'];
    
    $c_city = $_POST['c_city'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_address = $_POST['c_address'];
    
    $c_ip = getRealIpUser();

    $select_mail = "select * from customers where customer_email = '$c_email'";
        
    $run_mail = mysqli_query($con,$select_mail);

    $check_mail = mysqli_fetch_array($run_mail);

    if($check_mail){

        echo "<script>alert('Mail Này Đã Được Đăng Kí')</script>";

        exit();
    }
        
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_city,customer_contact,customer_address,customer_ip) values ('$c_name','$c_email','$c_pass','$c_city','$c_contact','$c_address','$c_ip')";
    
    $run_customer = mysqli_query($con,$insert_customer);

    if($run_customer){
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('Đăng Kí Tài Khoản Thành Công')</script>";
        
        echo "<script>window.open('Home.html','_self')</script>";
        
    }else{
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('Đăng Kí Tài Khoản Thành Công')</script>";
        
        echo "<script>window.open('http://localhost/CafeWeb/Home.html','_self')</script>";   
    }
    
}

?>