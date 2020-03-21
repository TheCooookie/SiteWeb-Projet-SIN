<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "pss";

      $conn = new PDO("mysql:host=$host; dbname=$database", $username, $password);

      if(isset($_POST["register"])){
        $username = ($_POST['username']);
        $cpassword = ($_POST['cpassword']);
        $password = ($_POST['password']);
        $email = ($_POST['email']);
        if($password == $cpassword){
          $password = md5($password);
          $sql = $conn->prepare("INSERT INTO users(username, password, email) VALUES (:username, :password, :email)");
          $conn->beginTransaction();
          $sql->execute (array(':username'=>$username,
                               ':password'=>$password,
                               ':email'=>$email,));
                               $conn->commit();
                               header("location:login.php");
        }else{
          header("location:register.php");
        }
      }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PSS | Surveillance</title>
    <link rel="stylesheet" href="css/log-reg.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
                <div class="icon">
                  <a id="img" href="index.html"><img src="img/icon.png"></a>
                </div>
            <form id="input" class="input-group" method="post">
                <input type="text" class="input-field" name="username" placeholder="User ID" required>
                <input type="email" class="input-field" name="email" placeholder="E-mail ID" required>
                <input type="password" class="input-field" name="password" placeholder="Password" required>
                <input type="password" class="input-field" name="cpassword" placeholder="Check Password" required>
                <input type="checkbox" class="box" required><span>I agree to the Terms and Conditions</span>
                <button type="submit" class="submit-btn" name="register">Register</button>
            </form>
                <p>Tu possèdes déjà un compte ? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
