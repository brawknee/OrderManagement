<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('admin_header.php');
if(!(isset($_SESSION['username']))){
	header("Location: admin.php");
}
$id = base64_decode($_REQUEST['as']);
$b = base64_decode($_REQUEST['bs']);
$c = base64_decode($_REQUEST['cs']);
$d = base64_decode($_REQUEST['ds']);
$e = base64_decode($_REQUEST['es']);
$_SESSION['registration_id']="$id";
?>
<!-- case studies -->
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">Edit Users</h4>
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
    	$phone_no=$_POST['phone_no'];
    	$email=$_POST['email'];
		$password=$_POST['password'];
		$registration_id = $_SESSION['registration_id'];

		if (isset($error)) {
			header('Location: edit_member.php?e='.urlencode($error)); exit;
		}
   
        $query=mysqli_query($connection, "UPDATE registration_tbl SET fullname='$fullname', phone_no='$phone_no', email='$email',password='$password' WHERE registration_id='$registration_id'") or die (mysqli_error($connection));
		
		if($query){
            header('Location: view_member.php?s='.urlencode("<b>Member Successfully Updated.</b>")); 		
            exit;
		}
}
?>	       
							<div class="form-group">
								<label class="col-form-label" ><b>Fullname</b></label>
								<input type="text" class="form-control" placeholder="" name="fullname" required="" value="<?php echo $b; ?>">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Phone Number</b></label>
								<input type="text" class="form-control" placeholder="" name="phone_no" required=""  value="<?php echo $c; ?>">
							</div>
							<div class="form-group">
								<label class="col-form-label" ><b>Email</b></label>
								<input type="email" class="form-control" placeholder="" name="email" required=""  value="<?php echo $d; ?>">
							</div>
                            <div class="form-group">
                                <label for="password" class="col-form-label"><b>Password</b></label>
                                <input type="password" class="form-control" placeholder="your password" name="password" id="password" required=""  value="<?php echo $e; ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" name="submit" value="Save & Update" />
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