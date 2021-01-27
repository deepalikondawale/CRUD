<html>  
<head>  
    <title>PHP login system</title>  
    <style>
        body{   
    background: #eee;  
}  
#frm{  
    border: solid gray 1px;  
    width:25%;  
    border-radius: 2px;  
    margin: 120px auto;  
    background: white;  
    padding: 50px;  
}  
#btn{  
    color: #fff;  
    background: #337ab7;  
    padding: 7px;  
    margin-left: 70%;  
} 
    </style>
</head>  
<body>  
    <div id = "frm">  
        <h1>Login</h1>  
        <form name="f1" action = "login_authentication.php" method = "POST">  
            <p>  
                <label> FirstName: </label>  
                <input type = "text" id ="firstname" name  = "firstname" />  
            </p>  
            
            <p>     
                <input type =  "submit" id = "btn" value = "Login" /> <br> 
                <a href="crud.php">Click here to Register</a>  
            </p>  
        </form>  
    </div>  
   
   
</body>     
</html>  
