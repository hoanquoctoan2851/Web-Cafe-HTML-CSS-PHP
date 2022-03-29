<?php 


  session_start();

  if (!isset($_SESSION['customer_email'])) {

      echo "<script>window.open('logout.php','_self')</script>";
    
  }
  else{

  include("functions/functions.php"); 
  include("includes/db.php");

    $customer_session = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$customer_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['customer_id'];

    if (isset($_GET['order_id'])) {

      $order_id = $_GET['order_id'];
    
    }

  ?>
  <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TDCN</title>
    <link href="CSS/CSSAcount.css" rel="stylesheet" type="text/css" /> 
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
        <div class="col-md-9" style='margin-top: 100px;'>   <!--col md 9-->
            <div class="box" >     <!--box-->
                <h1 align="center">Confirm</h1>
                <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multpart/form-data">  
                <div class="form-group">
                    <label >Số Tiền Thanh Toán</label>
                    <input type="text" class="form-control" name="amount_sent" required>
                </div>  
                <div class="form-group">
                    <label >Chọn Hình Thức Thanh Toán:</label>
                    <select name="payment_mode" class="form-control">
                        <option class="text-hide" > Select Payment Mode </option>
                        <option > Visa </option>
                        <option > Vietel Pay </option>
                        <option > MOMO Payment</option>
                        <option > Internet Banking </option>
                    </select>
                </div>  
            </div>  
            <div class="text-center">
                <button class="btn btn-primary btl-lg" name="confirm_payment">
                    <i class="fa fa-user-md"></i> Xác nhận thanh toán
                </button>
            </div>
            </form>
            <?php 

              date_default_timezone_set("Asia/Ho_Chi_Minh");

              $payment_date = date('Y-m-d H:i:s', time());

              $complete = "Đã Thanh Toán";

              if (isset($_POST['confirm_payment'])) {

                $price = 0;

                $update_id = $_GET['update_id'];

                $amount_sent = $_POST['amount_sent'];

                $payment_mode = $_POST['payment_mode'];

                $check_price = "select * from customers_order where order_id ='$update_id'";
        
                $run_price = mysqli_query($con,$check_price);

                $check = mysqli_fetch_array($run_price);

                $price = $check['order_price'];

                if ($price != $amount_sent){

                    echo "<script>alert('Bạn Đã Nhập Sai Giá Đơn Hàng!')</script>";

                    echo "<script>window.open('acount.php?my_orders','_self')</script>";
                    
                }
                else{

                $insert_payment = "insert into payment (customer_id,order_id,payment_mode,paid,payment_date) values ('$customer_id','$update_id',' $payment_mode','$amount_sent','$payment_date')";

                $update_customer_order = "update customers_order set order_status='$complete' where order_id='$update_id'";

                $run_customer_order = mysqli_query($con,$update_customer_order);

                    if ($run_customer_order) {

                        echo "<script>alert('Thanh Toán Thành Công')</script>";
                        echo "<script>window.open('acount.php?my_orders','_self')</script>";
                    }
                }
            }

             ?>
        </div>    
    </div>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/jquery-331.min.js"></script>
</body>
</html>
<?php } ?>