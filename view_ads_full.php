<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('admin_header.php');
if(!isset($_SESSION['username'])){
	header("Location: index.php");
}
$product_id = $_GET['as'];
?>
<!-- case studies -->
<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h4 class="w3l-sub"> Product Details</h4>
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
	$sql=mysqli_query($connection, "SELECT product_tbl.*, category.category_name, subcategory_tbl.subcategory_name, location_tbl.location_name, sublocation_tbl.sublocation_name FROM product_tbl INNER JOIN category ON product_tbl.cat_id=category.cat_id INNER JOIN subcategory_tbl ON product_tbl.subcat_id=subcategory_tbl.subcat_id INNER JOIN location_tbl ON product_tbl.location_id=location_tbl.location_id INNER JOIN sublocation_tbl ON product_tbl.sublocation_id=sublocation_tbl.sublocation_id  WHERE product_tbl.product_id='$product_id'") or die (mysqli_error($connection));
    $i=0;
    $num = mysqli_num_rows($sql);
    while($row=mysqli_fetch_array($sql)){
        $cat_id=$row['cat_id'];
        $subcat_id=$row['subcat_id'];
        $location_id =$row['location_id'];
        $sublocation_id=$row['sublocation_id'];
        $title=$row['title'];
        $description=$row['description'];
        $price=$row['price'];
        $negotiable_status=$row['negotiable_status'];
		$date_posted=$row['date_posted'];
		$category_name=$row['category_name'];
        $subcategory_name=$row['subcategory_name'];
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

		$query = mysqli_query($connection, "SELECT * FROM picture_tbl WHERE product_id='$product_id'") or die(mysqli_error($connection));
		$qnum = mysqli_num_rows($query);
		$pic = array();
		if($qnum >= 1){
			$k=0;
			while($rw = mysqli_fetch_array($query)){
				$pic[$k] = $rw['picture_name'];
				$k++;
			}
		}
		echo "
        <div class='col-md-12' style='padding-top: 20px'>
        <div class='thumbnail card' style='background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;'>
        <div class='caption card-body p-lg-5 p-3'>

        <table class='table table-bordered' style='font-size:12'>
            <thead>
                <tr>
                    <th>Catgory Name</th>
                    <th>Sub Category Name</th>
                    <th>Location</th>
                    <th>Sub Location</th>
                    <th>Product Title</th>                   
                </tr>           
                <tr>
                    <td>$category_name</td>
                    <td>$subcategory_name</td>
                    <td>$location_name</td>
                    <td>$sublocation_name</td>
                    <td>$title</td>
                    
                </tr>
                <tr>
                    <th colspan='2'>Product Description</th>
                    <th>Amount</th>                   
                    <th>Date Posted</th>
                    <th>Negotiable</th>
                </tr>
                <tr>
                    <td colspan='2'>$description</td>
                    <td>&#8358;".number_format($price,2)."</td>                   
					<td>$date_posted</td>
					<td>$negotiable_status</td>
                    ";
					echo "</tr></thead><tbody></tbody></table>";					
						for($l=0; $l<sizeof($pic); $l++){
							echo "<a href='user_products/$registration_id/$pic[$l]'>";
							echo "<img src='user_products/$registration_id/$pic[$l]' alt='Ads Picture' width='250' height='250' />&nbsp;&nbsp;&nbsp;&nbsp;";
							echo "</a>";
						}
					echo"</div></div></div>";
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