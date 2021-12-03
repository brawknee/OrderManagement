<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('user_header.php');
if(!isset($_SESSION['registration_id'])){
	header("Location: index.php");
}
if(isset($_GET['order'])){
	$orderNo = $_GET['order'];
}
?>
<!-- case studies -->
<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h4 class="w3l-sub">Order Summary</h4>
			</div>
			<!-- case studies row -->
			<div class="row">
				<div class="col-lg-3 col-md-6">
				</div>
				<div class="col-lg-6 col-md-6 my-md-0 mt-4">
				<div class="thumbnail card" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;">
                            <div class="caption card-body p-lg-5 p-3">
<?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>
<?php	
	if(isset($_POST['submit'])){
		$cat_id=$_POST['cat_id'];
        $subcat_id=$_POST['subcat_id'];
        
        $_SESSION['cat_id'] = "$cat_id";
        $_SESSION['subcat_id'] = "$subcat_id";
   
		if (isset($error)) {
			header('Location: view_product_user.php?e='.urlencode($error)); exit;
		}

	    header("Location: view_product_ext_user.php"); 	
	}
	if(isset($_POST['complete_order'])){
		$orderNo = $_POST['order_number'];
		//update status to completed
		$query=mysqli_query($connection, "UPDATE order_tbl SET completed_status='Completed' WHERE order_number='$orderNo'") or die(mysqli_error($connection));
		if($query){
			header('Location: view_product_ext_user.php?s='.urlencode("<b> Order Successful. Order Number: $orderNo.</b>")); 	
			unset($_SESSION['order_number']);	
			exit;
		}	
	}
?>	

<?php

echo "
        <table class='table table-bordered' style='font-size:12'>
            <thead>
				<tr>
					<th colspan='2'>Order Number: $orderNo</th>					               
				</tr> 
                <tr>
                    <th>Product Title</th>
                    <th>Product Price</th>              
                </tr>";

	//select order details into order table
	$sql=mysqli_query($connection, "SELECT * FROM order_tbl WHERE order_number='$orderNo'") or die (mysqli_error($connection));
    $i=0;
	$sum = 0;
    $num = mysqli_num_rows($sql);
    while($row=mysqli_fetch_array($sql)){
        $product_id=$row['product_id'];    
        $title=$row['product_title'];
        $price=$row['price'];
        $order_number=$row['order_number'];
        $username=$row['username'];
		$sum += (float)$price;

		echo "<tr>
                    <td>$title</td>
                    <td>&#8358;".number_format($price,2)."</td>                    
                </tr>";       
		$i++;
	}
	echo "

				<tr>
				<td style='text-align: right;'><b>TOTAL</b></td><td><b>&#8358;".number_format($sum,2)."</b></td>
				</tr>

				<tr>
				<td style='text-align: right;'><b>PAYMENT MODE</b></td><td><b>Pay on Delivery</b></td>
				</tr>
				
                <tr>
                    <td colspan='2'>";  
					?>

        <form action="" method="post">
        <input type="hidden" name="order_number" value="<?php if(isset($orderNo)){ echo $orderNo; } ?>" />
        <input type="submit" name="complete_order" value="Complete Order" class="btn btn-success" />
        </form>
        <br>

		<?php		
					echo "</td>                
				</tr>
			</thead><tbody></tbody></table>";					

						?>

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

	<script type="text/javascript">
		function change_category(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","ajax.php?subcategories="+document.getElementById("categori").value,false);
			xmlhttp.send(null);
			document.getElementById("subcategory").innerHTML = xmlhttp.responseText;
		}
		function change_state(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","ajax.php?states="+document.getElementById("sublocation").value,false);
			xmlhttp.send(null);
			document.getElementById("lga").innerHTML = xmlhttp.responseText;
		}
	</script>
									
<?php
include_once("footer.php");
?>