<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>jeson and php</title>
</head>
<body>
    <h1>jeson and php</h1>
    
    <?php
    
    define("filepath", "php io.txt");
    $firstName = $lastName = $Gender = $DoB = $Religion = $PresentAddress = $PermanentAddress = $Email = $Phone = $Url = $UserName = $Password ="";
    
$firstNameErr = $lastNameErr = $GenderErr = $dobErr = $religionErr =$PAddErr = $PerAddErr = $emailErr = $phoneErr = $urlErr = $uNameErr = $PasswordErr ="";
    $flag = false;
    $successfulMessage = $errorMessage = "";
    
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $Gender = $_POST['gen'];
$DoB = $_POST['DoB'];
$Religion = $_POST['Religion'];
$PresentAddress = $_POST['p_add'];
$PermanentAddress = $_POST['per_address'];
$Email = $_POST['email'];
$Phone = $_POST['tel'];
$Url = $_POST['url'];
$UserName = $_POST['text'];
$Password = $_POST['password'];
        
        if(empty($firstName)){
            $firstNameErr = "Field can not be empty";
            $flag=true;
        }
        if(empty($lastName)){
            $lastNameErr = "Field can not be empty";
            $flag=true;
        }
        if(empty($Gender)) {
$GenderErr = "Field can not be empty";
$flag = true;
}
if(empty($DoB)) {
$dobErr = "Field can not be empty";
$flag = true;
}
if(empty($Religion)) {
$religionErr = "Field can not be empty";
$flag = true;
}
     
if(empty($PresentAddress)) {
$PAddErr = "Field can not be empty";
$flag = true;
}
if(empty($PermanentAddress)) {
$PerAddErr = "Field can not be empty";
$flag = true;
}
if(empty($Email)) {
$emailErr = "Field can not be empty";
$flag = true;
}
if(empty($Phone)) {
$phoneErr = "Field can not be empty";
$flag = true;
}
if(empty($Url)) {
$urlErr = "Field can not be empty";
$flag = true;
}
if(empty($UserName)) {
$uNameErr = "Field can not be empty";
$flag = true;
}
if(empty($Password)) {
$PasswordErr = "Field can not be empty";
$flag = true;
}
        if(!$flag){
            
            $data = array ("firstname" => $firstName, "lastname" => $lastName, "gen" => $Gender, "DoB" => $DoB, "Religion" => $Religion,"p_add" => $PresentAddress, "per_address" => $PermanentAddress, "email" => $Email, "tel" => $Phone, "url" => $Url, "text" => $UserName, "password" => $Password);
            $data_encode = json_encode ($data);
            $res = write($data_encode);
            #echo test_input($firstName) ;
            if($res){
                $successfulMessage = "Successfully saved.";
            }
            else {
                $errorMessage = "Error while saving.";
            }
        
        }
    }
    function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars ($data);
    return $data;
    }
    
    function write($content){
        $file = fopen (filepath, "a");
        $fw = fwrite ($file,$content . "\n");
        fclose($file);
        return $fw;
    }
    
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <fieldset>
          <legend>Basic Information</legend>
          
          <label for="name">First NAME:</label>
       <input type="text" name="firstname" id="name">
       <span style="color: red"><?php echo $firstNameErr; ?></span>
       
       <br>
       <label for="lname">Last NAME:</label>
       <input type="text" name="lastname" id="lname">
       <span style="color: red"><?php echo $lastNameErr; ?></span>
       <br>
       
       <label for="gen">Gender:</label><br>
      <input type="radio" name="gen" id="gen" value="male">Male <br>
      <input type="radio" name="gen" id="gen" value="female">Female <br>
      <span style="color: red"><?php echo $GenderErr; ?></span>
      <label for="dob">DoB</label>
      <input type="date" name="DoB" id="dob">
      <span style="color: red"><?php echo $dobErr; ?></span>
      <br>
      <label for="religion">Religion</label>
      <select name="Religion" id="religion">
      <option value="ISLAM">ISLAM</option>
      <option value="Hindu">Hindu</option>
      </select>
      <span style="color: red"><?php echo $religionErr; ?></span>
      
          
      </fieldset>
      
      
      <fieldset>
          <legend>Contact Information:</legend>
          <label for="p_add">Present Address :</label>
          <textarea name="p_add" id="p_add" cols="30" rows="4"></textarea>
          <span style="color: red"><?php echo $PAddErr; ?></span>
          <br>
          <label for="per_address">Permanent Address :</label>
          <textarea name="per_address" id="per_address" cols="30" rows="4"></textarea>
          <br>
          <span style="color: red"><?php echo $PerAddErr; ?></span>
          <label for="email">Email :</label>
          <input type="email" name="email" id="email">
          <span style="color: red"><?php echo $emailErr; ?></span>
          <br>
          <label for="tel">Phone :</label>
          <input type="tel" name="tel" id="tel">
          <span style="color: red"><?php echo $phoneErr; ?></span>
          <br>
          <label for="url">Personal Website Link :</label>
          <input type="url" name="url" id="url">
          <span style="color: red"><?php echo $urlErr; ?></span>
          
      </fieldset>
      
      <fieldset>
          <legend>Acount Information</legend>
          <label for="text">Username :</label>
          <input type="text" name="text" id="text">
          <span style="color: red"><?php echo $uNameErr; ?></span>
          <br>
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
          <span style="color: red"><?php echo $PasswordErr; ?></span>
      </fieldset>
      
      
      <br>
      <input type="submit" name="submit" value="submit">
       </form>
    
    <br>
    <span style="color: green"><?php echo $successfulMessage; ?></span>
    <span style="color: red"><?php echo $errorMessage; ?></span>
    
    <?php
    $fileData = read();
    
    echo "<br><br>";
    $fileDataExplode = explode("\n", $fileData);
    
    echo "<ol>";
    for($i = 0; $i < count($fileDataExplode) - 1; $i++){
        $temp = json_decode($fileDataExplode[$i]);
        
        echo "<li>" . "First Name: " .$temp->firstname . " Last Name: " .$temp->lastname . "</li>";        
        
    }
    echo "</ol>";
    
    function read(){
        $file =fopen(filepath,"r");
        $fz = filesize (filepath);
        $fr ="";
        if($fz>0){
            $fr = fread ($file,$fz);
        }
          
        fclose($file);
        return $fr;
    }
    ?>
    
</body>
</html>