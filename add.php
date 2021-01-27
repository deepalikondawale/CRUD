<?php

$link = mysqli_connect("localhost", "root", "", "student");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$firstname = mysqli_real_escape_string($link, $_REQUEST['firstname']);
$lastname = mysqli_real_escape_string($link, $_REQUEST['lastname']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$mobile = mysqli_real_escape_string($link, $_REQUEST['mobile']);
 
// Attempt insert query execution
$sql = "INSERT INTO student_detail (firstname, lastname, address, mobile) VALUES ('$firstname', '$lastname', '$address', '$mobile')";
if(mysqli_query($link, $sql)){
    echo "<script>alert('Record Added Successfully'); 
	window.location.assign('index.php');
	</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
