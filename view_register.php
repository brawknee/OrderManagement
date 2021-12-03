<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('admin_header.php');
if(!(isset($_SESSION['email']))){
	header("Location: admin.php");
}
?>
<!-- case studies -->
	<section class="case_w3ls  py-lg-5">
		<div class="container py-5">
			<div class="text-center wthree-title pb-sm-5 pb-3">
				<h3 class="w3l-sub">List Of Registered Users</h4>
			</div>
			<!-- case studies row -->
			<div class="row">
				<div class="col-lg-0 col-md-6">
				</div>
				<div class="col-lg-12 col-md-6 my-md-0 mt-4">
				<div class="thumbnail card" style="background-color: #fff; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); text-align: left;">
                            <div class="caption card-body p-lg-5 p-3">
                            <form action="#" method="post">
<?php  
// check for a successful form post  
if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
// check for a form error  
elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  
?>
							<div class="form-group">
								<label class="col-form-label" ><b>Select Subcategory Name</b></label>
								<select class="form-control" name="td" >
									<option>=Select=</option>
									<?php
										$sq1=mysqli_query($connection, "SELECT * FROM subcategory_tbl");
										$nsq1=mysqli_num_rows($sq1);
										$ni = 0;
										while($nirow = mysqli_fetch_array($sq1)){
                      $id = $nirow['subcat_id'];
                      $td = $nirow['subcategory_name'];
											echo "<option value='$id'>$td</option>";	
											$ni++;
										}
									?>    
								</select>
							</div>
						
              <div class="form-group">
                  <input type="submit" class="btn btn-info" name="submit" value="View" />
              </div>
              </form>

<?php
if(isset($_POST['submit'])){
  $td = $_POST['td'];
	 echo "<div class='row'>
     <div class='col-md-12'>
      <table class='table table-bordered' style='font-size:12'>
        <thead>
          <tr>
            <th>S/N</th>
            <th>Subcategory Name</th>
            <th>Fullname</th>
            <th>Phone Number</th>
            <th>Email</th>
           </tr>
        </thead>";
        $sql=mysqli_query($connection, "SELECT enroll_tbl.*, user_tbl.fullname, user_tbl.phone, user_tbl.email, training_class_tbl.training_description FROM enroll_tbl INNER JOIN training_class_tbl ON enroll_tbl.training_id=training_class_tbl.id INNER JOIN user_tbl ON enroll_tbl.user_id=user_tbl.id WHERE enroll_tbl.training_id='$td'") or die (mysqli_error($connection));
        $i=1;
        while($row=mysqli_fetch_array($sql)){
                $a=$row['id'];
                $b=$row['fullname'];
                $c=$row['phone'];
                $d=$row['email'];

                $first = base64_encode($a);
                           
                echo "<tbody>
                            <tr style='font-size:10'>
                                    <td>$i</td>
                                    <td>$b</td>
                                    <td>$c</td>
                                    <td>$d</td>				
                                  ";
                                ?>    
                      
                           <?php echo "
                                         
                            </tr>
                    </tbody>";	 
                $i++;
            }
echo "</table>
</div>		
</div>";
}
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