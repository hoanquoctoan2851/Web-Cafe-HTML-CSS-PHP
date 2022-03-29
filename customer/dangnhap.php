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
    <link href="CSS/CSSdangnhap.css" rel="stylesheet" type="text/css" />  
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
<div class="box" > <!-- Box -->
    <div class="box-header" >   <!-- Box header -->
        <center> 
            <h1>Đăng Nhập</h1>
        </center>
    </div>  <!-- Box header -->
    <form method="post" action="dangnhap.php">  
        <div class="form-group">    
            <label > Email </label>
            <input name="c_email" type="text" class="form-control" required>
        </div>
        <div class="form-group"> 
            <label > Password </label>
            <input name="c_pass" type="password" class="form-control" required>
        </div>
        <div class="text-center">
            <button name="login" value="Login" class="btn btn-primary">  
                <i class="fa fa-sign-in"> </i> Xác Nhận
            </button>
        </div>
    </form>
    <center>
        <a href="dangki.php">
            <h3> Bạn chưa có tài khoản? Click vào đây</h3>
        </a>
    </center>
</div>          <!-- Box -->
</div>  <!--col md 9 e-->
    </div>
</body>
</html>

<?php 

    if (isset($_POST['login'])) {

        $customer_email = $_POST['c_email'];

        $customer_pass = $_POST['c_pass'];

        $select_customer = " select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
        
        $run_customer = mysqli_query($con,$select_customer);

        $get_ip = getRealIpUser();

        $check_customer = mysqli_num_rows($run_customer);

        if ($check_customer==0) {

            echo "<script> alert('Email Hoặc Mật Khẩu Sai!') </script>";

            exit();
        }

        else {

            $_SESSION['customer_email']= $customer_email;

            echo "<script> alert('Đăng Nhập Thành Công') </script>";

            echo "<script> window.open('Home.html','_self') </script>"; 
        }
    }
?>