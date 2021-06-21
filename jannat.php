<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> PHP Form</title>
</head>
<body>
   <h1>PHP Form</h1>
   <?php
    
    echo "Start From Here : " . $_SERVER['REQUEST_METHOD'];
    echo "<br>";
    
    
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        
        if (empty ($_POST['name'])){
            echo "First Name : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['name']);
        }
        echo "<br>";
        if (empty ($_POST['lname'])){
            echo "Last Name : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['lname']);
        }    
        
        echo "<br>";
        if (empty ($_POST['gen'])){
            echo "Gender : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['gen']);
        }  
        
        echo "<br>";
        if (empty ($_POST['DoB'])){
            echo "Date of Birth : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['DoB']);
        }  
        
        echo "<br>";
        if (empty ($_POST['Religion'])){
            echo "Religion : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['Religion']);
        }  
        echo "<br>";
        if (empty ($_POST['p_add'])){
            echo "Present address : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['p_add']);
        }  
        echo "<br>";
        if (empty ($_POST['per_address'])){
            echo "Parmanent address : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['per_address']);
        }  
        echo "<br>";
        if (empty ($_POST['email'])){
            echo "Email : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['email']);
        }  
        
        echo "<br>";
        if (empty ($_POST['tel'])){
            echo "Phone : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['tel']);
        }  
        echo "<br>";
        if (empty ($_POST['url'])){
            echo "Personal website link : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['url']);
        }  
        echo "<br>";
        if (empty ($_POST['text'])){
            echo "User Name : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['text']);
        }  
        echo "<br>";
        if (empty ($_POST['password'])){
            echo "Password : The value can't be empty";
        }
        else {
            echo "<br>";
            echo test_input($_POST['password']);
        }  
        
       /*
        
        
        echo  $_POST['tel'];
        echo "<br>";
        echo  $_POST['url'];
        echo  $_POST['text'];
        echo "<br>";
        echo  $_POST['password'];
        
        */
          }
    function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars ($data);
    return $data;
    }
     
    ?>
    
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <fieldset>
          <legend>Basic Information</legend>
          
          <label for="name">First NAME:</label>
       <input type="text" name="name" id="name">
       
       <br>
       <label for="lname">Last NAME:</label>
       <input type="text" name="lname" id="lname">
       
       <br>
       
       <label for="gen">Gender:</label><br>
      <input type="radio" name="gen" id="gen" value="male">Male <br>
      <input type="radio" name="gen" id="gen" value="female">Female <br>
      
      <label for="dob">DoB</label>
      <input type="date" name="DoB" id="dob">
      
      <br>
      <label for="religion">Religion</label>
      <select name="Religion" id="religion">
      <option value="ISLAM">ISLAM</option>
      <option value="Hindu">Hindu</option>
          
      </select>
      
          
      </fieldset>
      
      
      <fieldset>
          <legend>Contact Information:</legend>
          <label for="p_add">Present Address :</label>
          <textarea name="p_add" id="p_add" cols="30" rows="4"></textarea>
          <br>
          <label for="per_address">Permanent Address :</label>
          <textarea name="per_address" id="per_address" cols="30" rows="4"></textarea>
          <br>
          
          <label for="email">Email :</label>
          <input type="email" name="email" id="email">
          <br>
          <label for="tel">Phone :</label>
          <input type="tel" name="tel" id="tel">
          <br>
          <label for="url">Personal Website Link :</label>
          <input type="url" name="url" id="url">
          
      </fieldset>
      
      <fieldset>
          <legend>Acount Information</legend>
          <label for="text">Username :</label>
          <input type="text" name="text" id="text">
          <br>
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
      </fieldset>
      
      
      <br>
      <input type="submit" name="submit" value="submit">
       </form>
    
</body>
</html>