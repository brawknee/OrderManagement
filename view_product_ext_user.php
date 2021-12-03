<?php
session_start();
ob_start();
include_once('functions/connd.php');
if(isset($_SESSION['registration_id'])){
	include_once('user_header.php');
	$registration_id=$_SESSION['registration_id'];
}else{
	include_once('index_header.php');
}
if(isset($_SESSION['cat_id'])){
	$category_id = $_SESSION['cat_id'];
}else{
	$category_id = $_GET['as'];
}
if(isset($_SESSION['subcat_id'])){
	$subcategory_id = $_SESSION['subcat_id'];
}else{
	$subcategory_id = $_GET['bs'];
}
//generate order number
if(!isset($_SESSION['order_number'])){
	$orderNo = rand(0000000000, 9999999999);
	$_SESSION['order_number'] = "$orderNo";
}

if(isset($_POST['checkout'])){
	$orderNo =  $_POST['order_number'];
	//select order details into order table
	$sql=mysqli_query($connection, "SELECT cart_tbl.*, product_tbl.title, product_tbl.price FROM cart_tbl INNER JOIN product_tbl ON cart_tbl.product_id=product_tbl.product_id WHERE cart_tbl.order_number='$orderNo'") or die (mysqli_error($connection));
    $i=0;
    $num = mysqli_num_rows($sql);
    while($row=mysqli_fetch_array($sql)){
        $product_id=$row['product_id'];    
        $title=$row['title'];
        $price=$row['price'];
        $order_number=$row['order_number'];
        $username=$row['username'];
		//insert to order table
		$quer=mysqli_query($connection, "INSERT INTO order_tbl(`username`,`order_number`,`product_id`,`product_title`,`price`) VALUES ('$username','$orderNo','$product_id','$title','$price')") or die (mysqli_error($connection));
		$i++;
	}
	header("location: order_summary.php?order=$orderNo");
	exit;
}
?>
<!-- case studies -->
<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h4 class="w3l-sub">View All Products</h4>
			</div>
			<!-- case studies row -->
<?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>		
		     
<?php
    //echo "<div class='row'>";
    $sql=mysqli_query($connection, "SELECT product_tbl.*, location_tbl.location_name, sublocation_tbl.sublocation_name FROM product_tbl INNER JOIN location_tbl ON product_tbl.location_id=location_tbl.location_id INNER JOIN sublocation_tbl ON product_tbl.sublocation_id=sublocation_tbl.sublocation_id  WHERE product_tbl.cat_id='$category_id' and product_tbl.subcat_id='$subcategory_id'") or die (mysqli_error($connection));
    $i=0;
    $num = mysqli_num_rows($sql);
    while($row=mysqli_fetch_array($sql)){
        $product_id=$row['product_id'];
        $cat_id=$row['cat_id'];
        $subcat_id=$row['subcat_id'];
        $location_id =$row['location_id'];
        $sublocation_id=$row['sublocation_id'];
        $title=$row['title'];
        $description=$row['description'];
        $price=$row['price'];
        $negotiable_status=$row['negotiable_status'];
        $date_posted=$row['date_posted'];
        $location_name=$row['location_name'];
		$sublocation_name=$row['sublocation_name'];
		$registration_id=$row['registration_id'];
        if($negotiable_status == 1){
            $negotiable_status = "Yes";
        }else{
            $negotiable_status = "No";
        }
        $first = base64_encode($product_id);
        $desc = base64_encode($description);
        $pric = base64_encode($price);
        $titl = base64_encode($title);
        $negotiable_statu = base64_encode($negotiable_status);
        $location_nam = base64_encode($location_name);
        $sublocation_nam = base64_encode($sublocation_name);

		$query = mysqli_query($connection, "SELECT * FROM picture_tbl WHERE product_id='$product_id' LIMIT 1") or die(mysqli_error($connection));
		$qnum = mysqli_num_rows($query);
		if($qnum >= 1){
			while($rw = mysqli_fetch_array($query)){
				$pic = $rw['picture_name'];
			}
		}
		?>

        <form action="" method="post">
        <input type="hidden" name="order_number" value="<?php if(isset($_SESSION['order_number'])){ echo $_SESSION['order_number']; } ?>" />
        <input type="submit" name="checkout" value="Checkout" class="btn btn-success" />
        </form>
        <br>

		<?php
		echo "
		<a style='color: #000' href='view_product_full_user.php?as=$product_id'>
        <div class='col-md-12' style='padding-top: 20px'>
        <div class='thumbnail card' style='background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;'>
        <div class='caption card-body p-lg-5 p-3'>
		
        <table class='table borderless' style='font-size:12'>
            <thead>
                <tr style='border: none;'>";					
					if(isset($pic)){ 
                    	echo "<th rowspan='3' style='border: none;'><img src='user_products/$registration_id/$pic' alt='Product Picture' width='250' height='250' /></th>";
					}else{
						echo "<th rowspan='3' style='border: none; text-align: center'>No Product <br>Picture Uploaded</th>";
					}
					echo "
					<th style='border: none; color: #666'><h3>$title </h3></th>
					<th style='color: green; border: none;'><h3>&#8358;".number_format($price,2)."</h3></t h>	
                  
				</tr>    
				<tr style='border: none;'>
					<td style='border: none;'>$description  </td>		
					<th style='border: none;'></th>
				</tr>   
				<tr style='border: none;'>
					<td style='border: none;'>$location_name. $sublocation_name </td>
					<th style='border: none;'></th>
				</tr>   
               
             </thead><tbody></tbody></table></div></div></div></a>";
                 
                $i++;
        }
?>      

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