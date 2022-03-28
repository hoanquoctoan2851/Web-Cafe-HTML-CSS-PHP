<?php 
  session_start();

  if (!isset($_SESSION['customer_email'])) {

      echo "<script>window.open('http://localhost/CafeWeb/customer/logout.php','_self')</script>";
    
  }else{
    include("includes/db.php");
    include("functions/functions.php");
  
    $customer_session = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$customer_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['customer_id'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TDCN</title>
    <link href="CSS/CSSOder.css" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" href="CSS/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> 
</head>
<body>
    <div class="vungbao">
        <span class="vunghotro">
            <a href="http://localhost/CafeWeb/customer/Home.html"><span style="color: white"> Trang Chủ </span></a>
            <a href="http://localhost/CafeWeb/Order.php"><span style="color: white"> | Order </span></a>
        </span>
        <span class="dangki">
            <a href="http://localhost/CafeWeb/customer/acount.php"><span style="color: white"> Acount </span></a>
            <a href="http://localhost/CafeWeb/customer/logout.php"><span style="color: white"> | Logout </span></a>
        </span>
        <div class="vunglogo">
        	<a href="http://localhost/CafeWeb/customer/Home.html"><img src="Images/logo1.gif" width="300" height="170" border="0px" /></a>
        </div>
        <div class="vungbanner"><img src="Images/cafe-10.png" width="770" height="150" /></div> 
        <div class="order1">
            <h1><i>Khách hàng luôn là ưu tiên số 1 của chúng tôi!</i></h1>
            <h2><p>Danh sách sản phẩm</p></h2>
        </div>
        <div class="order2">
            <img src="Images/Img3.png" width="270" height="270" />
            <img src="Images/Img5.png" width="300" height="325" />
            <img src="Images/Img6.png" width="300" height="350" />
        </div>
        <div class="col-md-9" style='padding-top: 50px; padding-left: 400px;'> <!--col md 9 s-->
        <div class="box" >  <!--box s-->
            <div class="box-header">
                <center>
                    <h2>Order</h2>
                </center>
                <form action="order.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label >Mã Sản Phẩm</label>
                        <input type="text" class="form-control" name="product_id" required>
                    </div>
                    <div class="form-group">
                        <label >Số Lượng</label>
                        <input type="text" class="form-control" name="product_amount" required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="Order">
                        <i class="fa fa-user-md"></i> Xác Nhận
                        </button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
<script src="js/bootstrap-337.min.js"></script>
<script src="js/jquery-331.min.js"></script>
</body>
</html>
<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");

if(isset($_POST['Order'])){
    
    $product_id = $_POST['product_id'];
    
    $product_amount = $_POST['product_amount'];

    $table_order = $_POST['table_order'];
     
    $order_date = date('Y-m-d H:i:s', time()); 

    $select_product = "select * from product where product_id = '$product_id'";
        
    $run_product = mysqli_query($con,$select_product);

    $check_product = mysqli_fetch_array($run_product);

    $product_price = 0;

    if($check_product){

        $product_price = $check_product['product_price']*$product_amount;
    }
    
    if($check_product==0){

        echo "<script>alert('Mã Sản Phẩm Sai Hoặc Đặt Vượt Quá Số Lượng Cho Phép')</script>";
        
        exit();
    }

    $insert_customer_order = "insert into customers_order (customer_id,product_id,order_price,product_amount,order_date,table_order) values ('$customer_id','$product_id','$product_price','$product_amount','$order_date','$table_order')";

    $run_customer_order  = mysqli_query($con,$insert_customer_order);

    if($run_customer_order){
    
            echo "<script>alert('Bạn Đã Đặt Hàng Thành Công. Xem Đơn Hàng Và Thanh Toán Trong Mục Acount!')</script>";
        
            echo "<script>window.open('http://localhost/CafeWeb/order.php','_self')</script>";   
    }
    
}
?>
