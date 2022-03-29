
	<div class="panel panel-default sidebar-menu" style='margin-top: 100px; margin-left:100px;'>	<!-- panel begin-->
		<div class="panel-heading" >	<!-- panel heading begin-->
			<?php 

				$customer_session = $_SESSION['customer_email'];

				$get_customer = "select * from customers where customer_email='$customer_session'";

				$run_customer = mysqli_query($con,$get_customer);

				$row_customer = mysqli_fetch_array($run_customer);

				$customer_name = $row_customer['customer_name'];

				if (!isset($_SESSION['customer_email'])) {
					
				}else{

					echo "

					<h3 class='panel-title' align='center'> 
							Name: $customer_name
					</h3>

					";
				}
			 ?>
		</div>	<!-- panel heading end-->
		<div class="panel-body">	<!-- panel body begin-->
			
			<nav class="nav-pills nav-stacked nav">
				
				<li class="<?php if(isset($_GET['my_orders'])){echo"active";} ?>">
					
					<a href="acount.php?my_orders">

						<i class="fa fa-list"></i> My Orders

					</a>

				</li>

				<li class="<?php if(isset($_GET['edit_acount'])){echo"active";} ?>">
					
					<a href="acount.php?edit_acount">
						
						<i class="fa fa-pencil"></i> Edit Account

					</a>

				</li>

				<li class="<?php if(isset($_GET['change_pass'])){echo"active";} ?>">
					
					<a href="acount.php?change_pass">
						
						<i class="fa fa-user"></i> Change Password

					</a>

				</li>

			</nav>

		</div> <!-- panel body end-->

	</div>	<!-- panel end-->