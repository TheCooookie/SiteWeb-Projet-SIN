<?php
 session_start();
 $dbhost = "localhost";
 $dbusername = "root";
 $dbpassword = "";
 $database = "pss";
 $message = "";
 try
 {
      $connect = new PDO("mysql:host=$dbhost; dbname=$database", $dbusername, $dbpassword);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["login"]))
      {
           if(empty($_POST["username"]) || empty($_POST["password"]))
           {
                $message = '<label>All fields are required</label>';
           }
           else
           {
                $query = "SELECT * FROM users WHERE username = :username AND password = :password";
                $statement = $connect->prepare($query);
                $statement->execute(
                     array(
                          'username'     =>     $_POST["username"],
                          'password'     =>     $_POST["password"]
                     )
                );
                $count = $statement->rowCount();
                if($count > 0)
                {
                     $_SESSION["username"] = $_POST["username"];
                     header("location:dashboard.php");
                }
                else
                {
                     $message = '<label>Wrong Data</label>';
                }
           }
      }
 }
 catch(PDOException $error)
 {
      $message = $error->getMessage();
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
                   <a id="img" href="/index.html"><img src="img/icon.png"></a>
                 </div>
             <form id="input" class="input-group" method="post">
                 <input type="text" class="input-field" name="username" placeholder="User ID" required>
                 <input type="password" class="input-field" name="password" placeholder="Password" required>
                 <input type="checkbox" class="box"><span>Remember password</span>
                 <button type="submit" class="submit-btn" name="login">Log In</button>
             </form>
                 <p>Tu n'a pas de compte ? <a href="register.php">Register</a></p>
         </div>
     </div>
 </body>
 </html>
