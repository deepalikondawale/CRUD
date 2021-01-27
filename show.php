<!Docktype html>
<html>
    <head>
        <title>Table</title>
        <style type="text/css">
           table , th{
               padding: 10px;
                border: 1px solid black;
                border-collapse: collapse;
            }
            td {
                padding: 10px;
                border: 1px solid black;
                border-collapse: collapse;
            }
            tr:nth-child(even) {background-color: #f2f2f2}
        </style>
            
        
    </head>
    <body>
        <a href="home.php">Close</a>
        <h3><center>Details</center></h3>
        
        <table border="1" width="70%" heighr="80" align="center">
            <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Address</th>
            <th>Mobile No</th>
            </tr>
            
            <?php
            $conn = mysqli_connect("localhost", "root", "", "student");
            if($conn-> connect_error)
            {
                die("Connetion failed:". $conn-> connect_error);
            }
            
            $sql = "select id , firstname, lastname, address, mobile from student_detail";
            $result = $conn-> query($sql);
            
            if($result-> num_rows > 0)
            {
                while ($row = $result-> fetch_assoc())
                {
                    echo "<tr><td>". $row["id"] ."</td><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["address"] ."</td><td>". $row["mobile"] ."</td></tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "0 result";
            }
            
            $conn-> close();
            
            ?>
            
        </table>   
        
    </body>
</html>
