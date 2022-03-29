
<?php 
	
	$customer_session = $_SESSION['customer_email'];

	$get_customer = "select * from customers where customer_email='$customer_session'";

	$run_customer = mysqli_query($con,$get_customer);

	$row_customer = mysqli_fetch_array($run_customer);

	$customer_id = $row_customer['customer_id'];

	$customer_name = $row_customer['customer_name'];

	$customer_email = $row_customer['customer_email'];

	$customer_address = $row_customer['customer_address'];

	$customer_contact = $row_customer['customer_contact'];

 ?>



<h1 align="center"> Edit Your Account </h1>

<form action="" method="post" enctype="multipart/form-data">   <!-- Form-->
	 

	<div class="form-group">
		
		<label > Customer Name: </label>

		<input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>

	</div>

	<div class="form-group">
		
		<label > Customer Email: </label>

		<input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>

	</div>


	<div class="form-group">
		
		<label > Customer Address: </label>

		<input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>

	</div>


	<div class="form-group">
		
		<label > Customer Contact: </label>

		<input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>

	</div>


	<div class="text-center">
		
		<button name="update" class="btn btn-primary">
			
			<i class="fa fa-user-md"></i> Update Now

		</button>

	</div>


</form>			<!-- Form-->


<?php 

	if (isset($_POST['update'])) {

		$update_id = $customer_id;

		$c_name = $_POST['c_name'];

		$c_email = $_POST['c_email'];

		$c_address = $_POST['c_address'];

		$c_contact = $_POST['c_contact'];

		$c_image = $_FILES['c_image']['name'];

		$update_customer = "update customers set customer_name = '$c_name',customer_email='$c_email',customer_address='$c_address',customer_contact='$c_contact' where customer_id='$update_id'";

		$run_customer = mysqli_query($con,$update_customer);

		if ($run_customer) {

			echo "<script>alert('Thay đổi thông tin thành công, bạn hãy đăng nhập lại')</script>";

			echo "<script>window.open('logout.php','_self')</script>";
			
		}
		
	}


 ?>