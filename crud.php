<?php

$host = "localhost";
$user = "root";
$password ="";
$database = "student";

$id = "";
$firstname = "";
$lastname = "";
$address = "";
$mobile = "";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}



// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['firstname'];
    $posts[2] = $_POST['lastname'];
    $posts[3] = $_POST['address'];
    $posts[4] = $_POST['mobile'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM student_detail WHERE id = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $address = $row['address'];
                $mobile = $row['mobile'];
            }
        }else{
             echo "<script>alert('No data found'); </script>";
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO student_detail(firstname, lastname, address, mobile) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo "<script>alert('Record Added Successfully'); 
	window.location.assign('crud.php');
	</script>";
            }else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM student_detail WHERE `id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo "<script>alert('Record Deleted Successfully'); 
	window.location.assign('crud.php');
	</script>";
            }else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `student_detail` SET `firstname`='$data[1]',`lastname`='$data[2]',`address`='$data[3]',`mobile`=$data[4] WHERE `id` = $data[0]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo "<script>alert('Record Updated Successfully'); 
	window.location.assign('crud.php');
	</script>";
            }else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}




?>

<!DOCTYPE Html>
<html>
    <head>
        <title>INSERT UPDATE DELETE SEARCH</title>
    </head>
    <style>
@import url(https://fonts.googleapis.com/css?family=Lily+Script+One);
body {
	margin:0;
	font-family:arial,tahoma,sans-serif;
	font-size:12px;
	font-weight:normal;
	direction:ltr;
 
    
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center center;
    position: relative;
}

form {
	margin:3% auto 0 auto;
	padding:30px;
	width:600px;
	height:auto;
	overflow:hidden;
	background:white;
	border-radius:10px;
}

form label {
	font-size:14px;
	color:black;
	cursor:pointer;
}

form label,
form input {
	float:left;
	clear:both;
}

form input {
	margin:15px 0;
	padding:15px 10px;
	width:100%;
	outline:none;
	border:1px solid #bbb;
	border-radius:20px;
	display:inline-block;
	-webkit-box-sizing:border-box;
	   -moz-box-sizing:border-box;
	        box-sizing:border-box;
    -webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;
}

form input[type=text]:focus,
form input[type="password"]:focus {
	border-color:cornflowerblue;
}

input[type=submit] {
	padding:12px 35px;
	width:auto;
	background:#1abc9c;
	border:none;
	color:white;
	cursor:pointer;
	display:inline-block;
	float:nonet;
	clear:right;
	-webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;
}

input[type=submit]:hover {
	opacity:0.8;
}

input[type="submit"]:active {
	opacity:0.4;
}

.forgot,
.register {
	margin:10px;
	float:left;
	clear:left;
	display:inline-block;
	color:cornflowerblue;
	text-decoration:none;
}

.forgot:hover,
.register:hover {
	color:darkgray;
}

#logo {
	margin:0 auto;
	width:200px;
	font-family:'Lily Script One', cursive;
	font-size:40px;
	font-weight:bold;
	text-align:center;
	color:cornflowerblue;
	-webkit-transition:0.2s ease all;
	   -moz-transition:0.2s ease all;
	    -ms-transition:0.2s ease all;
	     -o-transition:0.2s ease all;
	        transition:0.2s ease all;
}


</style>
    <body>
        <form action="crud.php" method="post">
            <h3 id="logo">Registration</h3><br>
            <label for="id">ID</label><br>
            <input type="text" name="id" placeholder="id" value="<?php echo $id;?>"><br><br>
            
            <label for="firstname">First Name</label><br>
            <input type="text" id="firstname" name="firstname" placeholder="Your name.." value="<?php echo $firstname;?>"><br><br>
            
            <label for="lastname">Last Name</label><br>
            <input type="text" id="lastname" name="lastname" placeholder="Your last name.." value="<?php echo $lastname;?>"><br><br>
            
            <label for="address">Address</label><br>
            <input type="text" id="address" name="address" placeholder="Your address.." value="<?php echo $address;?>"><br><br>
            
            <label for="mobile">Mobile No</label><br>
            <input type="text" id="mobile" name="mobile" placeholder="Your mobile no.." value="<?php echo $mobile;?>"><br><br>
            
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Search">
                
                <input type="submit" formaction="home.php" value="Back To Home">
                
                
            </div>
        </form>
    </body>
</html>