<?php
session_start();
ob_start();
include_once('functions/connd.php');
include_once('admin_header.php');
if(!(isset($_SESSION['username']))){
	header("Location: admin.php");
}
?>
    <section class="case_w3ls  py-lg-5">
        <div class="container py-5">
            <div class="text-center wthree-title pb-sm-5 pb-3">
                <h3 class="w3l-sub">List Of Registered Members</h4>
            </div>
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
            <th>Full Name</th>
			<th>Email</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Password</th>
            <th>Registration Date</th>
            <th>Picture</th>
            <th>Action</th>
           </tr>
        </thead><tbody>";

        $sql=mysqli_query($connection, "SELECT * FROM registration_tbl") or die (mysqli_error($connection));
        $i=0;
        $j=1;
        $num = mysqli_num_rows($sql);
        while($row=mysqli_fetch_array($sql)){
            $email =$row['email'];
            $fullname=$row['fullname'];
            $image=$row['image'];
            $registration_id =$row['registration_id'];
            $address=$row['address'];
            $phone_no=$row['phone_no'];
            $password=$row['password'];
            $date=$row['date'];

            $first = base64_encode($registration_id);
              
            echo "
                    <tr style='font-size:10'>
                        <td>$j</td>
                        <td>$fullname</td>
                        <td>$email</td>				
                        <td>$address</td>
                        <td>$phone_no</td>
                        <td>$password</td>	 
                        <td>$date</td>
                        <td><img src=\"user_passports/$email/$image\" width='100px' height='100px' /></td>	
                        ";
            ?>    
                        <td><?php echo "<a href=\"delete_member.php?as=$first\">Delete</a>"; ?></td>
            <?php echo "</tr>
                   ";	 
                $i++;
                $j++;
        }
echo " </tbody></table>
</div>		
</div>";
?>      
    </section>
<?php
include_once("footer.php");
?>
