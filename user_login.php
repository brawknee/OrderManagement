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
				<h3 class="w3l-sub">User Login</h4>
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
    	$email=$_POST['email'];
    	$password=$_POST['password'];
		
        $_SESSION['email']="$email";
        $_SESSION['password']="$password";
        
		if (isset($error)) {
			header('Location: user_login.php?e='.urlencode($error)); exit;
		}

		$query="SELECT * FROM registration_tbl WHERE email='$email' and password='$password'";
		$result=mysqli_query($connection, $query) or die (mysqli_error($connection));
		$num=mysqli_num_rows($result);
		if($num > 0){	
			$i = 0;
			while($row = mysqli_fetch_array($result)){
				$registration_id = $row['registration_id'];
				$fullname = $row['fullname'];
				$phone_no = $row['phone_no'];
				$email = $row['email'];
				$address = $row['address'];
				$image = $row['image'];
				$password=$_POST['password'];
                $i++;
            }
            $_SESSION['fullname']="$fullname";
			$_SESSION['phone_no']="$phone_no";
			$_SESSION['email']="$email";
			$_SESSION['password']="$password";
			$_SESSION['address']="$address";
			$_SESSION['image']="$image";
			$_SESSION['registration_id']="$registration_id";
            header('Location: user_dashboard.php');   exit;    
		}else{
			header('Location: user_login.php?e='.urlencode("Invalid Username or Password")); exit;
		}
}
?>	
                            <div class="form-group">
                                <label class="col-form-label"><b>Email</b></label>
                                <input type="text" class="form-control" placeholder="" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label"><b>Password</b></label>
                                <input type="password" class="form-control" placeholder="" name="password" required="">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" name="submit" value="Login" />
                            </div>
							<p>Dont have an account? <a href="create.php">Create Account</a></p>
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