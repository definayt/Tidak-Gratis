<?php
    session_start(); 

    if(isset($_SESSION['username'])){
      header("location: home.php");
    }

    if (isset($_POST['submit'])) {
      require("connect.php"); //connect db

      $username = $_POST['username'];
      $password = $_POST['password'];

      $query_login = "SELECT * FROM pegawai WHERE username='$username'AND password='$password'";
      $result = $con->query($query_login);

      if (!$result){
        die ("Could not query the database: <br />". $con->error);
      }
      $data = $result->fetch_array();

      if (!empty($data)){ 
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];
        setcookie("message","delete",time()-1);
        
        header("location: home.php");
      }
      else{
        setcookie("message","Maaf, Username atau Password salah",time()+3000);
      }
      $result->free();
      $con->close();
    } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log-in | TidakGratis </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
      .error {color: #FF0000;}
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" autocomplete="on">
              <h1>Login Form</h1>
              <br />
              <span class="error">
                <?php if(isset($_COOKIE['message'])) {echo $_COOKIE['message'];}?>
              </span>

              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required=""/>
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit" name="submit" value="Login">Login</button>
              </div>

              <div class="clearfix"></div>
              <br />

              <div class="separator">

                <div class="clearfix"></div>

                <div>
                  <h1><i class="fa fa-paw"></i> TidakGratis </h1>
                  <p>©2019</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
