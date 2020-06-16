<?php
  session_start(); 
  if(!isset($_SESSION['username'])){
      header("location: login.php");
    }
    elseif($_SESSION['level']=='admin'){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Edit Produk | TidakGratis</title>
    <script type="text/javascript">
      //buat nampilin image
      function preview_image1(event){
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('upload_image1');
          output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
      }
      function preview_image2(event){
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('upload_image2');
          output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
      }
    </script>
    <style>
      #upload_image1{
        max-width: 150px;
      }
      #upload_image2{
        max-width: 150px;
      }

    </style>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/ajax.js"></script>

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
                  <li><a href="pegawai.php"><i class="fa fa-gear"></i> Setting Pegawai </a>
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
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Edit Produk</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <?php 
                      //ambil id produk
                      $id = $_GET['id']; 

                      //connect db
                      require("connect.php");
                      //variabel buat inputan
                      $id_produk=$nama_produk=$kategori=$sub_kategori=$harga=$deskripsi=$gambar1=$gambar2=$last_update=$id_pegawai=$valid="";
                      //otomatis tanggalnya
                      $last_update= strval(date("Y-m-d"));

                      //buat masukan id_pegawai
                      $uname = $_SESSION['username'];
                      $querypegawai = "SELECT id_pegawai FROM pegawai WHERE username='$uname'";
                      $datapegawai = $con->query( $querypegawai );  
                        if (!$datapegawai){   
                          die ("Could not query the database: <br />". $con->error);  
                        }else{   
                            //masukin data dari database ke formnya
                            $rowpegawai = $datapegawai->fetch_object();    
                            $id_pegawai = $rowpegawai->id_pegawai;
                        }  
                      
                      //test input
                      function test_input($data) {    
                        $data = trim($data);    
                        $data = stripslashes($data);    
                        $data = htmlspecialchars($data);    
                        return $data; 
                      }

                      if (!isset($_POST["submit"])){ 
                        //ambil data dari database 
                        $queryproduk = " SELECT * FROM produk WHERE id_produk=".$id." ";  
                        // Execute the query  
                        $dataproduk = $con->query( $queryproduk );  
                        if (!$dataproduk){   
                          die ("Could not query the database: <br />". $con->error);  
                        }else{   
                            //masukin data dari database ke formnya
                            $rowproduk = $dataproduk->fetch_object();    
                            $id_produk = $rowproduk->id_produk;    
                            $nama_produk = $rowproduk->nama; 
                            $kategori = $rowproduk->id_kategori;
                            $sub_kategori = $rowproduk->id_subkategori;
                            $harga = $rowproduk->harga;
                            $deskripsi = $rowproduk->deskripsi;
                        }   
                      }else{
                        //ambil data dari form ketika tombol submit di klik
                          $id_produkbaru = test_input($_POST['id_produk']); 
                          $nama_produk = test_input($_POST['nama_produk']);  
                          $kategori = test_input($_POST['kategori']);
                          $sub_kategori = test_input($_POST['sub_kategori']);
                          $harga = test_input($_POST['harga']);
                          $deskripsi = test_input($_POST['deskripsi']);
                          $sizegambar1 = $_FILES['uploadgambar1']['size'];
                          $sizegambar2 = $_FILES['uploadgambar2']['size'];
                          $valid=true;

                          //update db
                          if($valid==true){
                            // escape input data   
                            $id_produkbaru = $con->real_escape_string($id_produkbaru);
                            $nama_produk = $con->real_escape_string($nama_produk);
                            $kategori = $con->real_escape_string($kategori);   
                            $sub_kategori = $con->real_escape_string($sub_kategori);   
                            $harga = $con->real_escape_string($harga);
                            $deskripsi = $con->real_escape_string($deskripsi);
                            $last_update = $con->real_escape_string($last_update);
                            $id_pegawai = $con->real_escape_string($id_pegawai);


                            //nentuin query
                            if(($sizegambar1 > 0) && ($sizegambar2 > 0)){
                            //jika 2 gambar diubah semua
                            $gambar1 = file_get_contents($_FILES['uploadgambar1']['tmp_name']);
                            $gambar2 = file_get_contents($_FILES['uploadgambar2']['tmp_name']);
                            $gambar1 = $con->real_escape_string($gambar1);
                            $gambar2 = $con->real_escape_string($gambar2);
                            $queryedit = "UPDATE produk SET id_produk='$id_produkbaru', nama='$nama_produk', id_kategori='$kategori', id_subkategori='$sub_kategori', harga='$harga', deskripsi='$deskripsi', gambar1='$gambar1', gambar2='$gambar2', last_update='$last_update', id_pegawai='$id_pegawai' WHERE id_produk=".$id." ";
                            }
                            elseif(($sizegambar1 > 0) && (!($sizegambar2 > 0))) {
                              //jika gambar 2 tidak diubah
                              $gambar1 = file_get_contents($_FILES['uploadgambar1']['tmp_name']);
                              $gambar1 = $con->real_escape_string($gambar1);
                              $queryedit = "UPDATE produk SET id_produk='$id_produkbaru', nama='$nama_produk', id_kategori='$kategori', id_subkategori='$sub_kategori', harga='$harga', deskripsi='$deskripsi', gambar1='$gambar1', last_update='$last_update', id_pegawai='$id_pegawai' WHERE id_produk=".$id." ";
                            }
                            elseif ((!($sizegambar1 > 0)) && ($sizegambar2 > 0)) {
                              //jika gambar 1 tidak diubah
                              $gambar2 = file_get_contents($_FILES['uploadgambar2']['tmp_name']);
                              $gambar2 = $con->real_escape_string($gambar2);
                              $queryedit = "UPDATE produk SET id_produk='$id_produkbaru', nama='$nama_produk', id_kategori='$kategori', id_subkategori='$sub_kategori', harga='$harga', deskripsi='$deskripsi', gambar2='$gambar2', last_update='$last_update', id_pegawai='$id_pegawai' WHERE id_produk=".$id." ";
                            }else{
                              //jika semua gambar tidak diubah
                              $queryedit = "UPDATE produk SET id_produk='$id_produkbaru', nama='$nama_produk', id_kategori='$kategori', id_subkategori='$sub_kategori', harga='$harga', deskripsi='$deskripsi', last_update='$last_update', id_pegawai='$id_pegawai' WHERE id_produk=".$id." ";
                            }

                            //eksekusi query
                            $resultedit = $con->query( $queryedit );   
                            if (!$resultedit){      
                              die ("Could not query the database: <br />". $con->error);   
                            }
                            else{    
                              echo '<script>alert("Data berhasil diedit")</script>';      
                              echo "<script type = 'text/javascript'>window.top.location='detail_produk.php?id=$id_produkbaru';</script>";
                              exit();   
                            }
                          }
                      }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>" enctype="multipart/form-data"/>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Produk <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="id_produk" name="id_produk" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id_produk;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_produk" name="nama_produk" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama_produk;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="kategori" name="kategori" class="form-control" onChange="set_sub_kategori(this.value)" required="required">
                            <option value="">--- Pilih Kategori ---</option>
                            <?php
                              $queryKategori = "SELECT * FROM kategori";
                              $datakategori = $con->query($queryKategori);
                              if (!$datakategori){    
                              die ("Could not query the database: <br />". $con->error); 
                              }

                              while ($rowkategori = $datakategori->fetch_object()) { ?>
                                <option value="<?php echo $rowkategori->id_kategori?>" <?php if (isset($kategori) && $kategori=="$rowkategori->id_kategori") echo 'selected="true"';?>><?php echo $rowkategori->nama?></option>';
                                <?php
                              }
                              // $result->free();
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group" id="subkat">
                        <!-- sub kategori muncul pakai ajax -->
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Kategori <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="sub_kategori" name="sub_kategori" class="form-control" required="required">
                            <option value="">--- Pilih Sub Kategori ---</option>
                            <?php 
                            $querySubKategori = "SELECT * FROM sub_kategori WHERE id_kategori = $kategori";
                              $datasubkategori = $con->query($querySubKategori);
                              if (!$datasubkategori){    
                              die ("Could not query the database: <br />". $con->error); 
                              }
                            while ($rowsub = $datasubkategori->fetch_object()) { 
                          ?>
                              <option value="<?php echo $rowsub->id_subkategori; ?>" <?php if (isset($sub_kategori) && $sub_kategori=="$rowsub->id_subkategori") echo 'selected="true"';?>><?php echo $rowsub->nama;?></option>
                          <?php 
                            } 
                          ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="harga" name="harga" class="form-control col-md-7 col-xs-12" type="number" required="required" value="<?php echo $harga; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="deskripsi" required="required" class="form-control col-md-7 col-xs-12" name="deskripsi" data-parsley-trigger="keyup" data-parsley-minlength="0" data-parsley-maxlength="65535" rows="6"><?php echo htmlspecialchars($deskripsi)?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar 1</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo '<img id="upload_image1" src="data:image/png;base64,'.base64_encode($rowproduk->gambar1).'"/>';?><br><br>
                          <input id="gambar1" name="uploadgambar1" class="form-control col-md-7 col-xs-12" type="file" accept="image/*" onchange="preview_image1(event)"><br>
                          <span class="required">*Pilih File untuk mengubah Gambar 1. Lewati langkah ini jika tidak ingin mengubah gambar 1</p></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar 2</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo '<img id="upload_image2" src="data:image/png;base64,'.base64_encode($rowproduk->gambar2).'"/>';?><br><br>
                          <input id="gambar2" name="uploadgambar2" class="form-control col-md-7 col-xs-12" type="file" accept="image/*" onchange="preview_image2(event)"><br>
                          <span class="required">*Pilih File untuk mengubah Gambar 2. Lewati langkah ini jika tidak ingin mengubah gambar 2</p></span>
                        </div>
                      </div>                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="view_produk.php" class="btn btn-primary" >Cancel</a>
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
<?php } 
else if($_SESSION['level']=='manager') {
      header("location: tidak_ada_akses.php");
   }?>