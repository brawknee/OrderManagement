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
				<h3 class="w3l-sub">List of Product SubCategory</h4>
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
            <th>Category Name</th>
			      <th>SubCategory Name</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>View Products</th>
           </tr>
        </thead>";
        $sql=mysqli_query($connection, "SELECT * FROM subcategory_tbl ORDER BY cat_id") or die (mysqli_error($connection));
        $i=1;
        while($row=mysqli_fetch_array($sql)){
                $a=$row['subcat_id'];
                $b=$row['cat_id'];
			        	$c=$row['subcategory_name'];

                    $asq1=mysqli_query($connection, "SELECT * FROM category WHERE cat_id='$b'");
                    $nsq1=mysqli_num_rows($asq1);
                    $ni = 0;
                    while($nirow = mysqli_fetch_array($asq1)){
                      $id = $nirow['cat_id'];
                      $td = $nirow['category_name']; 
                      $ni++;
                    }            
			
                $first = base64_encode($a);
                $second = base64_encode($b);
                $third = base64_encode($c);
                $four = base64_encode($td);
              
                echo "<tbody>
                            <tr style='font-size:10'>
                                    <td>$i</td>
                                    <td>$td</td>
                                    <td>$c</td>				
                                  ";
                                ?>    
                                    <td><?php echo "<a href=\"delete_subcategory.php?as=$first\">Delete</a>"; ?></td>
                                    <td><?php echo "<a href=\"edit_subcategory.php?as=$first&bs=$second&cs=$third&ds=$four\">Edit</a>"; ?></td>
                                    <td><?php echo "<a href=\"view_ads.php?as=$first&bs=$second&cs=$third&ds=$four\">View Product</a>"; ?></td>
                           <?php echo "
                                         
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