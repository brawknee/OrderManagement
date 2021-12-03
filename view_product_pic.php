<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('user_header.php');
if(!isset($_SESSION['registration_id'])){
	header("Location: index.php");
}
$registration_id=$_SESSION['registration_id'];
?>
    <section class="case_w3ls  py-lg-5">
        <div class="container py-5">
            <div class="text-center wthree-title pb-sm-5 pb-3">
                <h3 class="w3l-sub">My Ads</h4>
            </div>
            <?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>          
<?php
	$product_id = base64_decode($_GET['as']);
	 echo "<div class='row'>
     <div class='col-md-12'>
      <table class='table table-bordered' style='font-size:12'>
        <thead>
			<tr>           
				<th>Picture</th>
				<th colspan='2'>Action</th>
			</tr>
		</thead>
		<tbody>";
        $sql=mysqli_query($connection, "SELECT * FROM picture_tbl WHERE product_id='$product_id'") or die (mysqli_error($connection));
        $i=0;
        $num = mysqli_num_rows($sql);
        while($row=mysqli_fetch_array($sql)){
            $picture_id =$row['picture_id'];
			$picture_name =$row['picture_name'];

			$first = base64_encode($picture_id);
              
            echo "<tr style='font-size:10'>
                    <td><img src=\"user_products/$registration_id/$picture_name\" width='250px' height='200px' /></td>";
            ?>    
                    <td>
						<?php echo "<a href=\"edit_picture.php?as=$first\">Edit Picture</a>"; ?>
					</td>
					<td>
						<?php echo "<a href=\"delete_picture.php?as=$first\">Delete</a>"; ?>
					</td>
            <?php echo "</tr>
                   ";	 
                $i++;
        }
echo " </tbody></table>
</div>		
</div>";
?>      
    </section>
<?php
include_once("footer.php");
?>
