<?php
include_once('functions/connd.php');
include_once('index_header.php');
?>
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">WELCOME TO CLOUD BASED ORDER MANAGEMENT SYSTEM<br><br></h3><h4>Product Categories</h4>
			</div>
			<?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>			

			<?php 
 				$sql=mysqli_query($connection, "SELECT * FROM category") or die (mysqli_error($connection));
				$i=0;
				$num = mysqli_num_rows($sql);

			?>
			<div class="row">
				<?php 
				while($row=mysqli_fetch_array($sql)){
					$a=$row['cat_id'];
					$b=$row['category_name'];
					?>
					<div class="col-lg-4 col-md-6" style="padding: 10px">
						<div class="thumbnail card" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;">
							<div class="caption card-body p-lg-5 p-3">
								<h4><?php echo strtoupper($b); ?></h4>
								<span> </span>
								<form action="processing1.php" method="post">
								<p><input type="hidden" name="tid" value="<?php echo $a; ?>" /> <hr><input class="btn btn-success" name="submit" type="submit" value="view more"></p>
								</form>	
							</div>
						</div>
					</div>
				
					<?php
					$i++;
				}
				?>
			</div>
			
		</div>
	</section>
<?php
include_once("footer.php");
?>