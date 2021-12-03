<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('index_header.php');
?>
<!-- case studies -->
<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">Create Account</h4>
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


		$fullname=$_POST['fullname'];
    	$phone_no=$_POST['phone_no'];
    	$email=$_POST['email'];
		$password=$_POST['password'];
		$address=$_POST['address'];

		if (isset($error)) {
			header('Location: create.php?e='.urlencode($error)); exit;
		}

		$query="SELECT * FROM registration_tbl WHERE email='$email'";
		$result=mysqli_query($connection, $query) or die (mysqli_error($connection));
		$num=mysqli_num_rows($result);
		if($num > 0){	
            header('Location: create.php?e='.urlencode("Username Already Exist")); exit;
		}

		if(($type=="image/jpeg") || ($type=="image/jpg") || ($type=="image/bmp") || ($type=="image/png")){
			$dir = "user_passports/$email";
			mkdir($dir, 0777, true);
			move_uploaded_file($temp, "$dir/".$mypic);
		}else{
			echo "Please load a valid jpeg, jpg, png or bmp! And size must be less than 10k!";
		}
        
        $query=mysqli_query($connection, "INSERT INTO registration_tbl(`fullname`,`address`,`phone_no`,`email`,`password`,`image`) VALUES ('$fullname','$address','$phone_no','$email','$password','$mypic')") or die (mysqli_error($connection));
        if($query){
            header('Location: create.php?s='.urlencode("<b>Account Successfully Created.</b>")); 		
            exit;
		 }
	}
?>	
       					<form enctype="multipart/form-data" method="post" action="">
							<div class="form-group">
								<label class="col-form-label" ><b>Fullname</b></label>
								<input type="text" class="form-control" placeholder=" Your Fullname" name="fullname" required="">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Phone Number</b></label>
								<input type="text" class="form-control" placeholder="Your Phone" name="phone_no" required="">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Email</b></label>
								<input type="email" class="form-control" placeholder="Your Email" name="email" required="">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Address</b></label>
								<input type="text" class="form-control" placeholder="Your Address" name="address" required="">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Image</b></label>
								<input type="file" class="form-control" placeholder="Your Image" name="upload">
							</div>
                            <div class="form-group">
                                <label for="password" class="col-form-label"><b>Password</b></label>
                                <input type="password" class="form-control" placeholder="Your Password" name="password" id="password" required="">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" name="submit" value="Register" />
                            </div>
                        </form>
							<p>Already have an account? <a href="user_login.php">Login</a></p>
                       
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