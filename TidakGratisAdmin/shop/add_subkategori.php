<?php
  session_start();
  
  if(!isset($_SESSION['username'])){
      header("location: login.php");
    }
    else if($_SESSION['level']=='admin'){
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sub Kategori | TidakGratis</title>

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
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="x_content">
            
            <div class="title_left">
                <h1>Sub Kategori</h1><br>
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
                <h2>Form Tambah Sub Kategori</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <?php 
                      //connect db
                      require("connect.php");
                      //variabel buat inputan                      
                      $id_subkategori=$nama=$id_kategori=$last_update=$valid="";

                      //kode untuk validasi field
                      function test_input($data) {    
                        $data = trim($data);    
                        $data = stripslashes($data);    
                        $data = htmlspecialchars($data);    
                        return $data; 
                      }

                      //mengambil inputan dari form
                      if (isset($_POST["submit"])){  
                          $id_subkategori = test_input($_POST['id_subkategori']); 
                          $nama = test_input($_POST['nama']);  
                          $id_kategori = test_input($_POST['id_kategori']);
                          $valid=true;
                      }
                       
                      //insert to db
                      if ($valid==true) {
                        // escape input data   
                        $id_subkategori = $con->real_escape_string($id_subkategori);
                        $nama = $con->real_escape_string($nama);
                        $id_kategori = $con->real_escape_string($id_kategori);

                        //Asign a query   
                        $query = " INSERT INTO sub_kategori (id_subkategori, id_kategori, nama) VALUES ('$id_subkategori', '$id_kategori', '$nama') ";   
                        // Execute the query   
                        $result = $con->query($query);   
                        if (!$result){      
                          die ("Could not query the database: <br />". $con->error);   
                        }
                        else{    
                          echo '<script>alert("input data berhasil")</script>';
                          echo "<script type = 'text/javascript'>window.top.location='sub_kategori.php';</script>";
                          exit();   
                        } 
                        // $result->free();
                       }   
                    ?>

                <!-- start form for validation -->
                <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                  <label for="idsub">Pilih Kategori :</label>
                  <select name="id_kategori" id="id_kategori" class="form-control" required="required">
                    <option value="">Pilihan..</option>
                    <?php
                      $query2 = " SELECT id_kategori, CONCAT(UCASE(LEFT(nama, 1)), SUBSTRING(nama, 2)) AS nama FROM kategori ";
                      // Execute the query
                      $result2 = mysqli_query($con,$query2);
                      if (!$result2){
                        die ("Could not query the database: <br />". mysqli_error($con));
                      }
                      while ($row = $result2->fetch_object()){?>
                        <option value="<?php echo $row->id_kategori; if (isset($id_kategori) && $id_kategori===$row->id_kategori) echo "selected";?>">
                          <?php echo $row->nama; ?></option>;
                          <?php
                      }
                    ?>
                  </select>
                  <br/>

                  <label for="idsub">Id Sub Kategori :</label>
                  <input type="number" id="idsub" class="form-control" name="id_subkategori" data-parsley-trigger="change" required value="<?php echo $id_subkategori;?>"/>
                  <br />

                  <label for="nama">Nama Sub Kategori :</label>
                  <input type="text" id="nama" class="form-control" name="nama" required value="<?php echo $nama;?>"/>
                  <br />

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
        return confirm('Yakin Ingin Hapus ?');
    }
    </script>
  </body>
</html>
<?php } 
else if($_SESSION['level']=='manager') {
      header("location: tidak_ada_akses.php");
   }
?>