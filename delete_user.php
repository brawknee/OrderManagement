<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('admin_header.php');
$id = base64_decode($_REQUEST['as']);
$_SESSION['id']="$id";
?>
<!-- case studies -->
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">Delete Users</h4>
			</div>
			<!-- case studies row -->
			<div class="row">
				<div class="col-lg-0 col-md-6">
				</div>
				<div class="col-lg-12 col-md-6 my-md-0 mt-4">
        <div class="thumbnail card" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;">
                            <div class="caption card-body p-lg-5 p-3">
<?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>
<?php
echo "Are you sure you want to delete the this user record? 
<form action='' method='post'>
<input class='btn btn-success active' type='submit' value='Yes' name='yes' /> 
<input class='btn btn-danger active' type='submit' value='No' name='no' />
</form><br><br>";

if(isset($_POST['yes'])){
$sid = $_SESSION['id'];
$sql=mysqli_query($connection, "SELECT * FROM user_tbl WHERE id='$sid'") or die (mysqli_error($connection));
$num=mysqli_num_rows($sql);
if(!empty($num)){
  $query=mysqli_query($connection, "DELETE FROM user_tbl WHERE id='$sid'") or die (mysqli_error($connection));
  if($query){
    header('Location: view_user.php?s='.urlencode("<b>User Record Successfully Deleted</b>")); 		
    exit;									        
  }
}else{
  header('Location: view_user.php?s='.urlencode("<b>Problem deleting user record, please try again.</b>")); 		
  exit;
}
}

if(isset($_POST['no'])){
header('Location: view_user.php');
exit;
}
?>        
                                 
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