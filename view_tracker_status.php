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
				<h3 class="w3l-sub">List of Tracker Status</h4>
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
	 echo "<div class='row'>
     <div class='col-md-12'>
      <table class='table table-bordered' style='font-size:12'>
        <thead>
          <tr >
            <th>S/N</th>
            <th>Tracker Status</th>
           </tr>
        </thead>";
        $sql=mysqli_query($connection, "SELECT * FROM tracker_status") or die (mysqli_error($connection));
        $i=1;
        while($row=mysqli_fetch_array($sql)){
                $a=$row['id'];
                $b=$row['status'];
		
                $first = base64_encode($a);
                $second = base64_encode($b);

                echo "<tbody>
                            <tr style='font-size:10'>
                                    <td>$i</td>
                                    <td>$b</td>		
                            </tr>
                    </tbody>";	 
                $i++;
            }
echo "</table>
</div>		
</div>";
?>                         
                           </div>
                           </div>                     
				</div>
				<div class="col-lg-0 col-md-6 my-lg-0 mt-4">
				</div>
			</div>
			<!-- //case studies row -->
		</div>
	</section>
<?php
include_once("footer.php");
?>