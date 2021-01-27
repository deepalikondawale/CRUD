<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

<body>

    
<div>
<form action="add.php" method="post">

    <label for="firstname">First Name</label>
    <input type="text" id="firstname" name="firstname" placeholder="Your name..">

    <label for="lastname">Last Name</label>
    <input type="text" id="lastname" name="lastname" placeholder="Your last name..">

    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="Your address..">

    <label for="mobile">Mobile No</label>
    <input type="text" id="mobile" name="mobile" placeholder="Your mobile no..">

	<input type="submit" value="Submit" onclick="return confirm('Are you sure you want to submit this form?')">
	<a href="home.php">cancle</a>

</form>
</div>
</body>
</html>