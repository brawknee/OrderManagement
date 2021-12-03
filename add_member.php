<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('admin_header.php');
if(!(isset($_SESSION['email']))){
	header("Location: admin.php");
}
?>
<!-- case studies -->
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">Create Users</h4>
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
		$fullname=$_POST['fullname'];
    	$phone=$_POST['phone_no'];
    	$email=$_POST['email'];
		$password=$_POST['password'];
		  
		if (isset($error)) {
			header('Location: add_member.php?e='.urlencode($error)); exit;
		}

		
		$query="SELECT * FROM registration_tbl WHERE email='$email'";
		$result=mysqli_query($connection, $query) or die (mysqli_error($connection));
		$num=mysqli_num_rows($result);
		if($num > 0){	
            header('Location: add_member.php?e='.urlencode("Username Already Exist")); exit;
		}
        
        $query=mysqli_query($connection, "INSERT INTO user_tbl(`fullname`,`phone_no`,`email`,`password`) VALUES ('$fullname','$phone','$email','$password')") or die (mysqli_error($connection));
        if($query){
            header('Location: add_member.php?s='.urlencode("<b>Member Successfully Registered.</b>")); 		
            exit;
		}
}
?>	       
							<div class="form-group">
								<label class="col-form-label" ><b>Fullname</b></label>
								<input type="text" class="form-control" placeholder="" name="fullname" required="">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Phone Number</b></label>
								<input type="text" class="form-control" placeholder="" name="phone_no" required="">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Email</b></label>
								<input type="email" class="form-control" placeholder="" name="email" required="">
							</div>
                            <div class="form-group">
                                <label for="password" class="col-form-label"><b>Password</b></label>
                                <input type="password" class="form-control" placeholder="your password" name="password" id="password" required="">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" name="submit" value="Save" />
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