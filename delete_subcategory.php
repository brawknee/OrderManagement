<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('admin_header.php');
if(!(isset($_SESSION['username']))){
	header("Location: admin.php");
}
$subcat_id = base64_decode($_REQUEST['as']);
$_SESSION['subcat_id']="$subcat_id";
?>
<!-- case studies -->
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">Delete Subcategory</h4>
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
echo "Are you sure you want to delete this subcategory record? 
<form action='' method='post'>
<input class='btn btn-success active' type='submit' value='Yes' name='yes' /> 
<input class='btn btn-danger active' type='submit' value='No' name='no' />
</form><br><br>";

if(isset($_POST['yes'])){
$sid = $_SESSION['subcat_id'];
$sql=mysqli_query($connection, "SELECT * FROM subcategory_tbl WHERE subcat_id='$sid'") or die (mysqli_error($connection));
$num=mysqli_num_rows($sql);
if(!empty($num)){
  $query=mysqli_query($connection, "DELETE FROM subcategory_tbl WHERE subcat_id='$sid'") or die (mysqli_error($connection));
  if($query){
    header('Location: view_subcategory.php?s='.urlencode("<b>Subcategory Record Successfully Deleted</b>")); 		
    exit;									        
  }
}else{
  header('Location: view_subcategory.php?s='.urlencode("<b>Problem deleting Subcategory record, please try again.</b>")); 		
  exit;
}
}

if(isset($_POST['no'])){
header('Location: view_subcategory.php');
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