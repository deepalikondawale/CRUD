<?php      
    include('connection.php');  
    $firstname = $_POST['firstname'];  
      
      
        //to prevent from mysqli injection  
        $firstname = stripcslashes($firstname);  
        
        $firstname = mysqli_real_escape_string($con, $firstname);  
        
      
        $sql = "select *from student_detail where firstname = '$firstname'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<script>alert('Login Successfully'); 
	window.location.assign('login_home_page.php');
	</script>";
        }  
        else{  
            echo "<script>alert('Login Failed Invalid Name'); 
	window.location.assign('login.php');
	</script>"; 
        }     
?> 