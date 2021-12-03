<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('admin_header.php');
if(!isset($_SESSION['username'])){
	header("Location: admin.php");
}
?>
<!-- case studies -->
<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h4 class="w3l-sub">View Products</h4>
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
			header('Location: view_product.php?e='.urlencode($error)); exit;
		}

	    header("Location: view_product_ext.php"); 		
           
	}
?>	
       					<form method="post" action="">
							<div class="form-group">
								<label class="col-form-label" ><b>Select Category</b></label>
								<select class="form-control" id="categori" onChange="change_category()" name ="cat_id" required>
									<option value="">=Select=</option>
									<?php
										$sq1=mysqli_query($connection, "SELECT * FROM category");
										$nsq1=mysqli_num_rows($sq1);
										$ni = 0;
										while($nirow = mysqli_fetch_array($sq1)){
	                      					$category_id = $nirow['cat_id'];
	                      					$category_name= $nirow['category_name'];
											echo "<option value='$category_id'>$category_name</option>";	
											$ni++;
										}
									?>    
								</select>
							</div>
							<div class="form-group" id="subcategory">
								<label class="col-form-label" ><b>Select Subcategory</b></label>
								<select class="form-control" name="subcat_id">
									<option value="">=Select=</option>									
								</select>
							</div>
						
                            <div class="form-group" style="padding-left: 40%">
                                <input type="submit" class="btn btn-success" name="submit" value="view Products"  />
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