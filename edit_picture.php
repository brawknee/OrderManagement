<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('user_header.php');
if(!isset($_SESSION['registration_id'])){
	header("Location: index.php");
}
$registration_id=$_SESSION['registration_id'];
$picture_id = base64_decode($_GET['as']);
$_SESSION['picture_id'] = "$picture_id";
?>
<!-- case studies -->
<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h4 class="w3l-sub">Edit ADS PICTURE</h4>
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

		$mypic = $_FILES['upload']['name'];
		$type = $_FILES['upload']['type'];
		$size = $_FILES['upload']['size'];
		$temp = $_FILES['upload']['tmp_name'];

		$picture_id=$_SESSION['picture_id'];
		
		if(($type=="image/jpeg") || ($type=="image/jpg") || ($type=="image/bmp") || ($type=="image/png")){
			$dir = "user_products/$registration_id/";		
			move_uploaded_file($temp, "$dir/".$mypic);
			$query=mysqli_query($connection, "UPDATE picture_tbl SET picture_name='$mypic' WHERE picture_id='$picture_id'") or die (mysqli_error($connection));
		}else{
			echo "Please load a valid jpeg, jpg, png or bmp! And size must be less than 10k!";
		}
        
        if($query){
            header('Location: view_my_ads.php?as='.$picture_ids.'&s='.urlencode("<b>Update Successful.</b>")); 		
            exit;
		 }
	}
?>	
       					<form enctype="multipart/form-data" method="post" action="">
						
                           <div class="form-group">
								<label class="col-form-label" ><b>Product Image</b></label>
								<input type="file" class="form-control" placeholder="Your Product Image" name="upload">
							</div>
          					
                            </div>
                            <div class="form-group" style="padding-left: 40%">
                                <input type="submit" class="btn btn-success" name="submit" value="Save & Update"  />
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