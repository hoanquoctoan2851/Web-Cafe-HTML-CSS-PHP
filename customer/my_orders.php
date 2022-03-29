<center>
	<h1>Lịch Sử Orders</h1>
	<p class="text-muted">	
		Nếu có vấn đề thắc mắc, mời bạn liên hệ <strong>0963534954</strong></a>. Phục vụ <strong>24/7</strong>
	</p>
</center>
<hr>
<div class="table-responsive" >
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th> Lần: </th>
				<th> ID Sản Phẩm: </th>
				<th> Số Lượng:</th>
				<th> Đơn Giá: </th>
				<th> Thời Gian Order: </th>
				<th> Thanh Toán: </th>
				<th> Trạng thái: </th>
			</tr>	
		</thead>
		<tbody>
		<?php 

				$customer_session = $_SESSION['customer_email'];

				$get_customer = "select * from customers where customer_email='$customer_session'";

				$run_customer = mysqli_query($con,$get_customer);

				$row_customer = mysqli_fetch_array($run_customer);

				$customer_id = $row_customer['customer_id'];

				$get_orders = "select * from customers_order where customer_id='$customer_id'";

				$run_orders = mysqli_query($con,$get_orders);

				$i = 0;

            
				while ($row = mysqli_fetch_array($run_orders)){

				    $order_id = $row['order_id'];

				    $product_id = $row['product_id'];

				    $product_amount = $row['product_amount'];

				    $order_price = $row['order_price'];

				    $order_date = substr($row['order_date'],0,11);
				
				    $order_status = $row['order_status'];

				    $i++;

			 ?>
			
			<tr>
					
				<th> <?php echo $order_id; ?> </th>
				<td> <?php echo $product_id; ?> </td>
				<td> <?php echo $product_amount; ?> </td>
				<td> <?php echo $order_price; ?> </td>
				<td> <?php echo $order_date; ?> </td>
				<td> <?php echo $order_status; ?> </td>
				<td>
					
					<a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_self" class="btn btn-primary btn-sm"> Confirm Paid </a>

				</td>
			</tr>
<?php }?>
		</tbody>
	</table>
</div>




















