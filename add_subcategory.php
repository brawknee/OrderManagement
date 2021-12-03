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
				<h3 class="w3l-sub">Add Product Sub Category</h4>
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
		$td=$_POST['td'];
    	$mnop=$_POST['mnop'];
	
		if (isset($error)) {
			header('Location: add_subcategory.php?e='.urlencode($error)); exit;
		}
        
        $query=mysqli_query($connection, "INSERT INTO subcategory_tbl(`cat_id`,`subcategory_name`) VALUES ('$td','$mnop')") or die (mysqli_error($connection));
        if($query){
            		header('Location: add_subcategory.php?s='.urlencode("<b>Product Subcategory Successfully Added.</b>")); 	
		}
}
?>	       
								<div class="form-group">
								<label class="col-form-label" ><b>Select Category</b></label>
								<select class="form-control" name="td" >
									<option>=Select=</option>
									<?php
										$sq1=mysqli_query($connection, "SELECT * FROM category");
										$nsq1=mysqli_num_rows($sq1);
										$ni = 0;
										while($nirow = mysqli_fetch_array($sq1)){
                      $id = $nirow['cat_id'];
                      $td = $nirow['category_name'];
											echo "<option value='$id'>$td</option>";	
											$ni++;
										}
									?>    
								</select>
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Product Sub Category Name</b></label>
								<input type="text" class="form-control" placeholder="" name="mnop" required="">
							</div>
							
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" name="submit" value="Save" />
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