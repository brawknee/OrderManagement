<?php
include_once('functions/connd.php');
include_once('index_header.php');
?>
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">CLOUD BASED ORDER MANAGEMENT SYSTEM<br><br></h3><h4><u>Product Sub Categories</u></h4>
			</div>
			<?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>			

			<?php 
				$cat_id = $_POST['tid'];
 				$sql=mysqli_query($connection, "SELECT * FROM subcategory_tbl where cat_id='$cat_id'") or die (mysqli_error($connection));
				$i=0;
				$num = mysqli_num_rows($sql);
				if($num >= 1){
			?>
			<div class="row">
				<?php 
				while($row=mysqli_fetch_array($sql)){
					$a=$row['subcat_id'];
					$b=$row['cat_id'];
					$c=$row['subcategory_name'];
					?>
					<div class="col-lg-4 col-md-6" style="padding: 10px;">
						<div class="thumbnail card" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;">
							<div class="caption card-body p-lg-5 p-3">
								<h4><?php echo strtoupper($c); ?></h4>
								<span> </span><hr>
								<?php
								echo "<a class='btn btn-success' href='view_product_ext_user.php?as=$a&bs=$b'>View Products</a>";
								?>
							</div>
						</div>
					</div>
				
					<?php
					$i++;
				}
				?>
			</div>
			
		<?php
				}else{
?>
				<div class="row">
				<h4 style="color: red; font-size: 24px; text-align: centre; text-decoration: bold">OOPS! No Sub Category Product Available for the category you click.</h4>

			</div>

<?php
				}
			?>

		</div>
	</section>
<?php
include_once("footer.php");
?>