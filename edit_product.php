<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('user_header.php');
if(!isset($_SESSION['registration_id'])){
	header("Location: index.php");
}
$registration_id=$_SESSION['registration_id'];
$product_id = base64_decode($_GET['as']);
$_SESSION['product_id'] = "$product_id";
?>
<!-- case studies -->
<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h4 class="w3l-sub">Edit ADS</h4>
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
    	$location_id=$_POST['location_id'];
		$sublocation_id=$_POST['sublocation_id'];
		$title=$_POST['title'];
		$description=$_POST['description'];
		$price=$_POST['price'];

		if(isset($_POST['negotiable_status'])){
			$negotiable_status=1;
		}else{
			$negotiable_status=0;
		}		
		$registration_id=$_SESSION['registration_id'];
		$product_id = $_SESSION['product_id'];

		if (isset($error)) {
			header('Location: view_my_ads.php?e='.urlencode($error)); exit;
		}

		$query=mysqli_query($connection, "UPDATE product_tbl SET cat_id='$cat_id', subcat_id='$subcat_id', location_id='$location_id', sublocation_id='$sublocation_id', title='$title', description='$description', price='$price', negotiable_status='$negotiable_status', registration_id='$registration_id' WHERE product_id='$product_id'") or die (mysqli_error($connection));
       
        if($query){
            header('Location: view_my_ads.php?s='.urlencode("<b>Ads successfully Updated</b>")); 		
            exit;
		}
	}
?>	
       					<form method="post" action="">
							<div class="form-group">
								<label class="col-form-label" ><b>Select Category</b></label>
								<select class="form-control" id="categori" onChange="change_category()" name ="cat_id">
									<option value="<?php if(isset($_GET['catid'])){ echo $_GET['catid']; } ?>"><?php if(isset($_GET['categoryname'])){ echo base64_decode($_GET['categoryname']); } ?></option>
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
									<option value="<?php if(isset($_GET['subcatid'])){ echo $_GET['subcatid']; } ?>"><?php if(isset($_GET['subcategoryname'])){ echo base64_decode($_GET['subcategoryname']); } ?></option>									
								</select>
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Select Location</b></label>
								<select class="form-control" id ="sublocation" onChange="change_state()" name="location_id" >
									<option value="<?php if(isset($_GET['locationid'])){ echo $_GET['locationid']; } ?>"><?php if(isset($_GET['locationname'])){ echo base64_decode($_GET['locationname']); } ?></option>
									<?php
										$sq1=mysqli_query($connection, "SELECT * FROM location_tbl");
										$nsq1=mysqli_num_rows($sq1);
										$ni = 0;
										while($nirow = mysqli_fetch_array($sq1)){
                      					$location_id = $nirow['location_id'];
                      					$location_name= $nirow['location_name'];
										echo "<option value='$location_id'>$location_name</option>";	
										$ni++;
															
										}
									  ?>
										</select>
										</div>
							<div class="form-group" id="lga">
								<label class="col-form-label" ><b>Select Sublocation</b></label>
								<select class="form-control" name="sublocation_id">
									<option value="<?php if(isset($_GET['sublocationid'])){ echo $_GET['sublocationid']; } ?>"><?php if(isset($_GET['sublocationname'])){ echo base64_decode($_GET['sublocationname']); } ?></option>
		 						</select>
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Title</b></label>
								<input type="text" class="form-control" placeholder="product title" value="<?php if(isset($_GET['title'])){ echo base64_decode($_GET['title']); } ?>" name="title">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Price</b></label>
								<input type="text" class="form-control" placeholder="product price" name="price" value="<?php if(isset($_GET['price'])){ echo base64_decode($_GET['price']); } ?>">
							</div>
							<div>
								<label class="col-form-label" ><b>negotiable status</b></label>
								<input type="checkbox" name="negotiable_status" <?php if(isset($_GET['negotiablestatus']) && base64_decode($_GET['negotiablestatus']) === "Yes"){ echo "checked"; } ?>>
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Description</b></label>
								<textarea rows="5" class="form-control" placeholder="product description" name="description" ><?php if(isset($_GET['description'])){ echo base64_decode($_GET['description']); } ?></textarea>
								<br/>
                            <div class="form-group" style="padding-left: 40%">
                                <input type="submit" class="btn btn-success" name="submit" value="submit"  />
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