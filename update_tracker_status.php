<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('admin_header.php');
if(!(isset($_SESSION['username']))){
	header("Location: admin.php");
}
?>
<!-- case studies -->
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">Update Order Delivery Status</h4>
			</div>
			<!-- case studies row -->
			<div class="row">
				<div class="col-lg-3 col-md-6">
				</div>
				<div class="col-lg-6 col-md-6 my-md-0 mt-4">
				<div class="thumbnail card" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;">
                            <div class="caption card-body p-lg-5 p-3">
                               <form action="#" method="post">
<?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>
<?php					
	if(isset($_POST['submit'])){
		$order_number=$_POST['order_number'];
		$status = $_POST['status'];


		$query="SELECT * FROM order_tbl WHERE order_number='$order_number'";
		$result=mysqli_query($connection, $query) or die (mysqli_error($connection));
		$num=mysqli_num_rows($result);
		if($num > 0){	
			$querys=mysqli_query($connection, "UPDATE order_tbl SET delivery_status='$status' WHERE order_number='$order_number'") or die (mysqli_error($connection));
			if($querys){
				header('Location: update_tracker_status.php?s='.urlencode("<b>Order Delivery Status Successfully Updated.</b>")); 		
				exit;
			}       
		}else{
			header('Location: update_tracker_status.php?e='.urlencode("Invalid order number.")); 
			exit;
		}
	
	
}
?>	       
							<div class="form-group">
								<label class="col-form-label" ><b>Order Number</b></label>
								<input type="text" class="form-control" placeholder="Order Number" name="order_number" required="">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Order Tracker Status</b></label>
								<select class="form-control" name ="status" required>
									<option value="">=Select=</option>
									<?php
										$sq1=mysqli_query($connection, "SELECT * FROM  tracker_status");
										$nsq1=mysqli_num_rows($sq1);
										$ni = 0;
										while($nirow = mysqli_fetch_array($sq1)){
	                      					$id = $nirow['id'];
	                      					$status= $nirow['status'];
											echo "<option>$status</option>";	
											$ni++;
										}
									?>    
								</select>
							</div>
							
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" name="submit" value="Update" />
                            </div>
                        </form>
                           </div>
                           </div>                         
                    </div>


				</div>
				<div class="col-lg-3 col-md-6 my-lg-0 mt-4">
				</div>
			</div>
			<!-- //case studies row -->
		</div>
	</section>
<?php
include_once("footer.php");
?>