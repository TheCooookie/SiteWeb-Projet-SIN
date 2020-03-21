<?php
 //login_success.php
 session_start();
 if(isset($_SESSION["username"]))
 {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PSS | Surveillance</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/c0b923d6df.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
  <body>
    <section id="sideMenu">
      <nav>
        <a href="#" class="active"><span><i class="fas fa-home"></i></span> Home</a>
        <a href="#"><i class="fas fa-sticky-note"></i> Note</a>
        <a href="#"><i class="fas fa-bookmark"></i> Notification</a>
        <a href="#"><i class="fas fa-calendar-alt"></i> Historique</a>
        <a href="#"><i class="fas fa-user"></i> Compte</a>
        <a href="logout.php"><i class="fas fa-cog"></i> Option</a>
      </nav>
    </section>

    <header>
      <div class="search-area">
        <i class="fas fa-search"></i>
        <input type="text" name="" value="">
      </div>
      <div class="user-area">
        <a href="#" class="add">+ Add</a>
        <a href="#" class="notification">
          <i class="fas fa-bell"></i>
          <span class="circle">3</span>
        </a>
        <a href="#">
          <div class="user-img"></div>
          <i class="fas fa-caret-down"></i>
        </a>
      </div>
    </header>

  </body>
</html>
<?php
}
else
{
     header("location:login.php");
}
?>
