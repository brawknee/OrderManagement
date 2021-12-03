<?php
include_once('functions/connd.php');
if(isset($_GET["subcategories"])){
	$subcategories = $_GET["subcategories"];
}
if(isset($_GET["states"])){
	$states = $_GET["states"];
}

if (!empty($subcategories)){
	$sql = mysqli_query($connection, "SELECT * from subcategory_tbl WHERE cat_id = '$subcategories'");
	echo "<label class='col-form-label' ><b>Select Subcategory</b></label>";
	echo "<select class='form-control' name='subcat_id'>";
	echo "<option>=Select=</option>	";
	while($row = mysqli_fetch_array($sql)){
		$subcat_id = $row['subcat_id'];
		$subcategory_name = $row['subcategory_name'];
		echo "<option value ='$subcat_id'>"; echo $row['subcategory_name']; echo "</option>";
	}
	echo "</select>";		
}
if (!empty($states)){
	$sql = mysqli_query($connection, "SELECT * from sublocation_tbl WHERE location_id = '$states'");
	echo "<label class='col-form-label' ><b>Select sublocation</b></label>";
	echo "<select class='form-control' name='sublocation_id'>";
	echo "<option>=Select=</option>	";
	while($row = mysqli_fetch_array($sql)){
		$sublocation_id = $row['sublocation_id'];
		$sublocation_name = $row['sublocation_name'];
		echo "<option value ='$sublocation_id'>"; echo $row['sublocation_name']; echo "</option>";
	}
	echo "</select>";		
}


								
														
// $states = $_GET["states"];
// if (!empty($states)){
// 	$sql = mysqli_query($connection, "SELECT * from sublocation_tbl WHERE location_id = '$states'");
// 	echo "<select>";
// 	while($row = mysqli_fetch_array($sql)){
// 		$location_id = $row['location_id'];
// 		$sublocation_name = $row['sublocation_name'];
// 		echo "<option value ='$location_id'>"; echo $row['sublocation_name']; echo "</option>";
// 	}
// 		echo "</select>";		
// 	}
	?>



