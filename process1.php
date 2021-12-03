<?php
include_once('functions/connd.php');
include_once('index_header.php');
?>
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">Welcome To Web Based Business System<br><br></h3><h4>Available Subcategories</h4>
			</div>
			<?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>			

			<?php 
 				$sql=mysqli_query($connection, "SELECT * FROM subcategory_tbl") or die (mysqli_error($connection));
				$i=0;
			?>
			<div class="row">
				<?php 
				while($row=mysqli_fetch_array($sql)){
					$a=$row['subcat_id'];
					$b=$row['cat_id'];
					$c=$row['subcategory_name'];
					?>
					<div class="col-lg-4 col-md-6">
						<div class="thumbnail card" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;">
							<div class="caption card-body p-lg-5 p-3">
								<h4><?php echo strtoupper($c); ?></h4>
								<span> </span>
								<form action="process2.php" method="post">
								<p><input type="hidden" name="tid" value="<?php echo $a;  ?>" /> <hr><input class="btn btn-success" name="submit" type="submit" value="Buy here"></p>
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