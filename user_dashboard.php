<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('user_header.php');
if(!(isset($_SESSION['email']))){
	header("Location: user_login.php");
}

?>
<!-- case studies -->
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">User Dashboard</h4>
			</div>
			<!-- case studies row -->
			<div class="row">
				<div class="col-lg-1 col-md-6">
				</div>
				<div class="col-lg-10 col-md-6 my-md-0 mt-4">
				<div class="thumbnail card" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;">
                            <div class="caption card-body p-lg-5 p-3">
                               <form action="#" method="post">
<?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>
            <p style='color: #01cd74; font-size: 30px; text-align: center'>Login Successful! <br>Welcome <?php echo strtoupper($_SESSION['fullname']); ?></p>
    
                           </div>
                           </div>                         
                    </div>
				</div>
				<div class="col-lg-1 col-md-6 my-lg-0 mt-4">
				</div>
			</div>
			<!-- //case studies row -->
		</div>
	</section>
<?php
include_once("footer.php");
?>