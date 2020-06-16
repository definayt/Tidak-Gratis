<?php
  session_start();
  if(!isset($_SESSION['username'])){
      header("location: login.php");
    }
    else if($_SESSION['level']=='admin'){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah Pegawai | TidakGratis</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
              <a href="home.php" class="site_title"><i class="fa fa-paw"></i> <span>TidakGratis</span></a>
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
                  <li><a href="home.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Shop Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="kategori.php">Category</a></li>
                      <li><a href="sub_kategori.php">Sub Category</a></li>
                      <li><a href="view_produk.php">Product</a></li>
                      <!-- <li><a href="pegawai.php">Pegawai</a></li> -->
                    </ul>
                  </li>
                  <li><a href="pegawai.php"><i class="fa fa-gear"></i> Setting Pegawai</a>
                  </li>
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
                    <li><a href="profile.php"> Profile</a></li>
                    <!-- <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="x_content">
            
            <div class="title_left">
                <h1>Pegawai</h1><br>
            </div>
          </div>
          <div class="clearfix"></div>

          <style type="text/css">
            .x_panel {
              width: 80%;
              margin-left: 30px;
            }
          </style>
          <div class="x_panel">
              <div class="x_title">
                <h2>Form Tambah Pegawai</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <?php 
                      //connect db
                      require("connect.php");
                      //variabel buat inputan
                      if(!isset($_SESSION['username_pegawai'])){
                        $_SESSION['username_pegawai']="";
                      }
                      $id_pegawai=$username=$nama=$email=$password=$level=$valid="";
                      //kode untuk validasi field
                      function test_input($data) {    
                        $data = trim($data);    
                        $data = stripslashes($data);    
                        $data = htmlspecialchars($data);    
                        return $data; 
                      }
                      //mengambil inputan dari form
                      if (isset($_POST["submit"])){  
                          $id_pegawai = test_input($_POST['id_pegawai']); 
                          $username = test_input($_POST['username']);  
                          $nama = test_input($_POST['nama']);
                          $email = test_input($_POST['email']);
                          $password = test_input($_POST['password']);
                          $level = test_input($_POST['level']);
                          $valid=true;
                      }

                      //insert to db
                      if ($valid==true) {
                        // escape input data   
                        $id_pegawai = $con->real_escape_string($id_pegawai);
                        $username = $con->real_escape_string($username);
                        $nama = $con->real_escape_string($nama);
                        $email = $con->real_escape_string($email);
                        $password = $con->real_escape_string($password);
                        $level = $con->real_escape_string($level);

                        //Asign a query   
                        $query = " INSERT INTO pegawai (id_pegawai, username, nama, email, password, level) VALUES ('$id_pegawai', '$username', '$nama', '$email', '$password', '$level') ";   
                        // Execute the query   
                        $result = $con->query($query);   
                        if (!$result){      
                          die ("Could not query the database: <br />". $con->error);   
                        }
                        else{    
                          echo '<script>alert("input data berhasil")</script>';
                          echo "<script type = 'text/javascript'>window.top.location='pegawai.php';</script>";
                          exit();   
                        } 
                        // $result->free();
                       }   
                    ?>

                <!-- start form for validation -->
                <form id="demo-form" data-parsley-validate method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id_pegawai='.$id_pegawai;?>" enctype="multipart/form-data"/>

	                  <label for="id_pegawai">ID Pegawai :</label>
	                  <input type="number" id="id_pegawai" name="id_pegawai" data-parsley-trigger="change" required class="form-control" value="<?php echo $id_pegawai;?>"/>
	                  <br />

	                  <label for="nama">Username :</label>
	                  <input type="text" id="username" class="form-control" name="username" required value="<?php echo $username;?>"/>
	                  <br />

	                  <label for="nama">Name :</label>
	                  <input type="text" id="nama" class="form-control" name="nama" required value="<?php echo $nama;?>"/>
	                  <br />

	                  <label for="nama">Email :</label>
	                  <input type="email" id="email" class="form-control" name="email" required value="<?php echo $email;?>"/>
	                  <br />

	                  <label for="nama">Password :</label>
	                  <input type="password" id="password" class="form-control" name="password" required value="<?php echo $password;?>"/>
                    <input type="checkbox" onclick="show_password()"> Tampilkan Password
	                  <br /><br />

                    <label for="nama">Level :</label>
                    <input type="text" id="level" class="form-control" name="level" required value="<?php echo $level;?>"/>
                    <br />
		              </select>
		              <br/>

		              <object align="right">
		                <input type="submit" class="btn btn-primary" name="submit" value="Simpan">&nbsp;
		              </object>
                </form>
                <!-- end form for validations -->
                
          </div>
        </div>
      </div>
        <!-- /page content -->
			
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            TidakGratis ©2019
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
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Simpan Perubahan ?');
    }
    </script>
  </body>
</html>
<?php } 
else if($_SESSION['level']=='manager') {
      header("location: tidak_ada_akses.php");
   }
?>