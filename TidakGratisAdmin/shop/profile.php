<?php 
    session_start(); 
    if(isset($_SESSION['username'])){
      
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile | TidakGratis</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script>
      function show_password(){
        var password = document.getElementById('password');
        if (password.type === "password") {
          password.type = "text"
        }
        else{
          password.type = "password";
        }
      }
    </script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home.php" class="site_title"><i class="fa fa-paw"></i> <span>Tidak Gratis</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['nama']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <?php if ($_SESSION['level']=='manager') {
                      echo '<li><a href="home.php"><i class="fa fa-home"></i> Home </a>';
                      echo '<li><a href="list_produk.php"><i class="fa fa-qq"></i> Product</a></li>';
                      echo '<li><a href="rekap_produk.php"><i class="fa fa-list-ul"></i> Rekapitulasi Produk</a></li>';
                      echo '<li><a href="grafik_produk.php"><i class="fa fa-area-chart"></i> Grafik Produk</a></li>';
                  }
                  elseif ($_SESSION['level']=='admin') {
                    
                  
                  ?>
                  <li><a href="home.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Shop Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="kategori.php">Category</a></li>
                      <li><a href="sub_kategori.php">Sub Category</a></li>
                      <li><a href="view_produk.php">Product</a></li>
                    </ul>
                  </li>
                  <li><a href="pegawai.php"><i class="fa fa-gear"></i> Setting Pegawai</a>
                  </li>
                <?php 
                } 
                ?>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['nama']?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="#"> Profile</a></li>
                   <!--  <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="logout.php"  onclick="return confirm('Anda yakin ingin Logout?')"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Personal Info</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <?php 
                      //ambil id produk
                      $uname = $_SESSION['username']; 

                      //connect db
                      require("connect.php");
                      //variabel buat inputan
                      $username=$name=$email=$password=$level="";

                      //test input
                      function test_input($data) {    
                        $data = trim($data);    
                        $data = stripslashes($data);    
                        $data = htmlspecialchars($data);    
                        return $data; 
                      }

                      if (!isset($_POST["submit"])){ 
                        //ambil data dari database 
                        $querypegawai = "SELECT * FROM pegawai WHERE username='$uname'";  
                        // Execute the query  
                        $datapegawai = $con->query( $querypegawai );  
                        if (!$datapegawai){   
                          die ("Could not query the database: <br />". $con->error);  
                        }else{   
                            //masukin data dari database ke formnya
                            $rowpegawai = $datapegawai->fetch_object();    
                            $username = $rowpegawai->username;    
                            $name = $rowpegawai->nama; 
                            $email = $rowpegawai->email;
                            $password = $rowpegawai->password;
                            $level = $rowpegawai->level;
                        }   
                      }
                      else{
                        //ambil data dari form ketika tombol submit di klik
                          $username = test_input($_POST['username']); 
                          $name = test_input($_POST['name']);  
                          $email = test_input($_POST['email']);
                          $password = test_input($_POST['password']);
                          $_SESSION['username'] = $username;
                          $_SESSION['nama'] = $name;
                          $valid=true;      

                          //update db
                          if($valid==true){
                            // escape input data   
                            $username = $con->real_escape_string($username);
                            $name = $con->real_escape_string($name);
                            $email = $con->real_escape_string($email);   
                            $password = $con->real_escape_string($password);   

                            $queryupdate = "UPDATE pegawai SET username='$username', nama='$name', email='$email', password='$password'WHERE username='$uname' ";
                            
                            //eksekusi query
                            $resultupdate = $con->query( $queryupdate );   
                            if (!$resultupdate){      
                              die ("Could not query the database: <br />". $con->error);   
                            }
                            else{    
                              echo '<script>alert("Profile berhasil diedit")</script>';      
                              echo "<script type = 'text/javascript'>window.top.location='profile.php';</script>";
                              exit();   
                            }
                          }
                      	}
                    ?>
                   
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                      <p>* Untuk mengubah data profile Anda, silakan ubah isi form dan tekan tombol Simpan </p>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $uname;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $name;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="email" class="form-control col-md-7 col-xs-12" type="email" required="required" value="<?php echo $email; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password"  name="password" class="form-control col-md-7 col-xs-12" type="password" required="required" value="<?php echo $password;?>">
                           <input type="checkbox" onclick="show_password()"> Tampilkan Password
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="level" class="form-control col-md-7 col-xs-12" type="text" disabled value="<?php echo $level;?>">
                        </div>
                      </div>                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            TidakGratis  ©2019
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
 <?php
  }
  else {
      header("location: login.php");
  }
?>