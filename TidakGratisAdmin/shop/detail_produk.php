<?php
  session_start();
  if(!isset($_SESSION['username'])){
      header("location: login.php");
    }
    else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail Data Produk | TidakGratis</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
      /*.resize{
        width: 100%;
      }*/
      .product-image::after{
        content: "";
        clear: both;
        display: table;
      }
      .coloum{
        float: left;
        width: 50%;
      }
      #deskripsi{
        position: relative;
        width: 100%;
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

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Detail Produk</h3>
              </div>

              <div class="title_right">
              </div>
            </div>
            
            <div class="clearfix"></div>

            <?php 
              //get id produk
              $id = $_GET['id']; 
              // connect database  
              require("connect.php");
              
              //Asign a query 
              $query = " SELECT id_produk, produk.nama as namapro, kategori.nama as namakat, sub_kategori.nama as namasub, harga, deskripsi, gambar1, gambar2, last_update, pegawai.nama as namapeg FROM produk JOIN kategori ON (produk.id_kategori=kategori.id_kategori) JOIN sub_kategori ON (produk.id_subkategori=sub_kategori.id_subkategori) JOIN pegawai ON (produk.id_pegawai=pegawai.id_pegawai) WHERE id_produk=$id"; 
              // Execute the query 
              $result = $con->query( $query ); 
              if (!$result){    
                die ("Could not query the database: <br />". $con->error); 
              }
              $row = $result->fetch_object();
            ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php echo '<h2>Detail Produk dengan ID '.$id.'</h2>';?>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div class="product-image">
                        <div class="coloum">
                          <?php 
                              // stripslashes($row->gambar1);
                          echo '<img src="data:image/png;base64,'.base64_encode($row->gambar1).'"/>';?>
                        </div>
                        <div class="coloum">
                          <?php echo '<img src="data:image/png;base64,'.base64_encode($row->gambar2).'"/>';?>
                        </div>
                      </div>
                      <br>
                      <?php if ($_SESSION['level']=='admin') { ?>
                      
                          <a href="view_produk.php" class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> Kembali ke List Produk</a>
                      <?php } else if ($_SESSION['level']=='manager') { ?>
                          <a href="list_produk.php" class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> Kembali ke List Produk</a>
                      <?php  
                          } ?>
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                      <?php echo '<h3 class="prod_title">'.$row->namapro.'</h3>';?>

                    <div class="col-md-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Deskripsi</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ketegori</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Last Update</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <textarea id="deskripsi" rows="10" class="form-control col-md-7 col-xs-12"><?php echo $row->deskripsi?></textarea>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <?php echo '<p>'.$row->namakat.' - '.$row->namasub.'</p>';?>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <?php echo '<p>'.$row->last_update.' oleh '.$row->namapeg.'</p>';?>
                          </div>
                        </div>
                      </div>
                      <hr />
                    </div>

 
                      <div class="col-xs-12">
                        <div class="product_price">
                          <h1 class="price">Rp <?php echo number_format($row->harga, 2, ",", ".");?></h1>
                          <br>
                        </div>
                      </div>


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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
<?php } ?>