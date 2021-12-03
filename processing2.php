<?php		
session_start();
ob_start();
include_once('functions/connd.php');
if(!(isset($_SESSION['email']))){
	header('Location: user_login.php?e='.urlencode("Please login to register.")); exit;
}
$uid = $_SESSION['uid'];
			
	if(isset($_POST['submit'])){
		$tid=$_POST['tid'];
		$uid = $_SESSION['uid'];

		if(empty($tid)){
			$error = "No Subcategory Attached.";
		}

		if (isset($error)) {
			header('Location: uview_subcategory.php?e='.urlencode($error)); exit;
		}

		$query="SELECT * FROM subcategory_tbl WHERE subcat_id='$tid' and cat_id='$uid'";
		$result=mysqli_query($connection, $query) or die (mysqli_error($connection));
		$num=mysqli_num_rows($result);
		if($num > 0){	
            header('Location: uview_subcategory.php?e='.urlencode("Already Selected")); exit;
		}
		
		//check maximum registered
		$query1="SELECT * FROM subcategory_tbl WHERE subcat_id='$tid'";
		$result1=mysqli_query($connection, $query1) or die (mysqli_error($connection));
		$num1=mysqli_num_rows($result1);
		if($num1 > 0){	
			$j=0;
			while($row=mysqli_fetch_array($result1)){
				$mnop = $row['subcategory_name'];
				$j++;
			}
		}

		//check already registered number 
		$query2="SELECT * FROM subcategory_tbl WHERE subcat_id='$tid'";
		$result2=mysqli_query($connection, $query2) or die (mysqli_error($connection));
		$num2=mysqli_num_rows($result2);
		if($num2 == $mnop){
			header('Location: uview_subcategory.php?e='.urlencode("Maximum Number Of Selection")); exit;
		}

        $query=mysqli_query($connection, "INSERT INTO subcategory_tbl(`subcat_id`,`cat_id`) VALUES ('$tid','$uid')") or die (mysqli_error($connection));
        if($query){
            header('Location: uview_subcategory.php?s='.urlencode("<b>Subcategory Successfully Selected.</b>")); 		
            exit;
		}
}
?>	    