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
				<h3 class="w3l-sub">Admin Login</h4>
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
    	$username=$_POST['username'];
    	$password=$_POST['password'];
         
        $_SESSION['username']="$username";
        $_SESSION['password']="$password";
        
		if (isset($error)) {
			header('Location: admin.php?e='.urlencode($error)); exit;
		}

		$query="SELECT * FROM admin_tbl WHERE admin_username='$username' and admin_password='$password'";
		$result=mysqli_query($connection, $query) or die (mysqli_error($connection));
		$num=mysqli_num_rows($result);
		if($num > 0){	
$i=0;
			while($row = mysqli_fetch_array($result)){
				$admin_id = $row['admin_id'];
$i++;
			}
$_SESSION['admin_id'] = "$admin_id";
            header('Location: admin_dashboard.php');   exit;    
		}else{
			header('Location: admin.php?e='.urlencode("Invalid Username or Password")); exit;
		}
}
?>	
                            <div class="form-group">
                                <label class="col-form-label" ><b>Username</b></label>
                                <input type="text" class="form-control" placeholder=" enter your username" name="username" required="">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label"><b>Password</b></label>
                                <input type="password" class="form-control" placeholder="enter your password" name="password" id="password" required="">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" name="submit" value="Login"/>
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