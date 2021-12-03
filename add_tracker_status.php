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
				<h3 class="w3l-sub">Add Tracker Status</h4>
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
		$status=$_POST['status'];
    
		if (isset($error)) {
			header('Location: add_tracker_status.php?e='.urlencode($error)); exit;
		}

		$query="SELECT * FROM tracker_status WHERE status='$status'";
		$result=mysqli_query($connection, $query) or die (mysqli_error($connection));
		$num=mysqli_num_rows($result);
		if($num > 0){	
            header('Location: add_tracker_status.php?e='.urlencode("Tracker Status Already Exist")); exit;
		}
        
        $query=mysqli_query($connection, "INSERT INTO tracker_status(`status`) VALUES ('$status')") or die (mysqli_error($connection));
        if($query){
            header('Location: add_tracker_status.php?s='.urlencode("<b>Tracker Status Successfully Added</b>")); 		
            exit;
		}
}
?>	       
							<div class="form-group">
								<label class="col-form-label" ><b>Status</b></label>
								<input type="text" class="form-control" placeholder="" name="status" required="">
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