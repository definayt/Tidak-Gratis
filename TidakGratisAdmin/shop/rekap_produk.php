<?php
  session_start(); 
  if(!isset($_SESSION['username'])){
      header("location: login.php");
    }
    elseif($_SESSION['level']=='manager'){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rekapitulasi Produk | TidakGratis</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
      table th, .ratatengah{
        text-align: center;
        font-size: 14px
      }
      #kanan{
        padding: 8px 0px;
        text-align: right;
      }
      .kategori, .subkategori{
        text-align: center;
        text-transform: capitalize;
        width: 200px;
      }
      .produk{
        text-indent: 30px;
      }
    </style>
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
                    <li><a href="list_produk.php"><i class="fa fa-qq"></i> Product</a></li>
                    <li><a href="rekap_produk.php"><i class="fa fa-list-ul"></i> Rekapitulasi Produk</a></li>
                    <li><a href="grafik_produk.php"><i class="fa fa-area-chart"></i> Grafik Produk</a></li>
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
                <h3>Category Table</h3>
                <p>Rekapitulasi data produk dalam bentuk tabel per kategori dan sub-kategori.</p>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Data Produk</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Kategori</th>
                          <th>Sub Kategori</th>
                          <th>Produk</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                          // connect database  
                          require("connect.php");

                          ///QUERY KOLOM KATEGORI
                          $query_kategori = " SELECT id_kategori, nama FROM kategori ORDER BY id_kategori ASC "; 
                          // Execute the query 
                          $result_kategori = $con->query( $query_kategori ); 
                          if (!$result_kategori){    
                            die ("Could not query the database1: <br />". $con->error); 
                          }

                          // Fetch and display the results 
                          while ($row1 = $result_kategori->fetch_object()){

                            $id_kategori = $row1->id_kategori;

                            //menghitung jumlah produk tiap kategori
                            $result_produk1 = $con->query("SELECT id_produk FROM produk WHERE id_kategori='$id_kategori'");
                            $jml_kategori=0;
                            while($result_produk1->fetch_object()){$jml_kategori++;}
                            
                            echo "<tr>";
                            echo "<td class='kategori' rowspan='$jml_kategori'>".$row1->nama."</td>";
                            
                            ///QUERY KOLOM SUB KATEGORI
                            $query_sub = "SELECT id_subkategori, nama FROM sub_kategori WHERE id_kategori='$id_kategori' ORDER BY id_subkategori ASC";
                            $result_sub = $con->query($query_sub);
                            if (!$result_sub){    
                              die ("Could not query the database2: <br />". $con->error); 
                            }

                            $i = 1;
                            // Fetch and display the results 
                            while ($row2 = $result_sub->fetch_object()) {

                              $id_subkategori = $row2->id_subkategori;

                              //menghitung jumlah produk tiap subkategori
                              $result_produk2 = $con->query("SELECT nama FROM produk WHERE id_subkategori='$id_subkategori'");
                              $jml_sub= 0;
                              while($result_produk2->fetch_object()){$jml_sub++;}

                              if($i > 1){
                                echo "<tr>";
                              }
                              echo "<td class='subkategori' rowspan='$jml_sub'>".$row2->nama."</td>";
                              
                              ///QUERY KOLOM PRODUK
                              $query_produk3 = "SELECT nama FROM produk WHERE id_kategori='$id_kategori' AND id_subkategori='$id_subkategori' ORDER BY id_produk ASC";
                              $result_produk3 = $con->query($query_produk3);
                              if (!$result_produk3){    
                                die ("Could not query the database3: <br />". $con->error); 
                              }

                              $j=1;
                              // Fetch and display the results
                              while ($row3 = $result_produk3->fetch_object()){
                                if ($j>1) {
                                  echo "<tr>";
                                }
                                echo "<td class='produk'>".$row3->nama."</td>";
                                echo "</tr>";
                                $j++;                           
                              }
                              $i++;
                            }
                          }
                          $con->close();
                        ?>
                      </tbody>
                    </table>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
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

  </body>
</html>

<?php } 
else if($_SESSION['level']=='admin') {
      header("location: tidak_ada_akses.php");
   }?>