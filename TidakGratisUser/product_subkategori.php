			<table id="produk" class="table table-striped projects">
			<div class="row isotope-grid">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
					<tbody>
					<?php 
					$i=0;
					$id_subkategori=$_GET['sub_kategori'];
					
						require("connect.php");
						if ($id_subkategori<=10) {
							$query1 = "SELECT id_produk, gambar1, nama, harga FROM produk WHERE id_kategori=$id_subkategori";
						}
						else{
							$query1 = "SELECT id_produk, gambar1, nama, harga FROM produk WHERE id_subkategori=$id_subkategori ";
						}
	                    $data1 = $con->query($query1);
	                      if (!$data1){    
	                      die ("Could not query the database: <br />". $con->error); 
	                      }
	                    while ($row1 = $data1->fetch_object()) { 
	                    	if($i%3==0){
	                    		echo"<tr>";
	                    	}
	                    	echo '<td>';
                  	?>
					<!-- Block2 -->
					<div class="block2">
						<div id="gambar" class="block2-pic hov-img0">
							<a href="product-detail.php?id_produk=<?php echo $row1->id_produk; ?>">
							<?php echo '<img class="center-cropped" src="data:image/png;base64,'.base64_encode($row1->gambar1).'"/>';?>
							</a>
							<!-- <img id="gambar1" name="upload_image1" onchange="preview_image1(event)"></img> -->

							<!-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a> -->
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a value="<?php echo $row1->nama; ?>" href="product-detail.php?id_produk=<?php echo $row1->id_produk; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6"><?php echo $row1->nama?></a>
								</a>
								<span  class="stext-105 cl3">
									<a value="<?php echo $row1->harga; ?>" href="product-detail.php?id_produk=<?php echo $row1->id_produk; ?>">Rp <?php echo number_format($row1->harga, 2, ",", ".")?></a><br><br><br><br>
								</span>
							</div>

							<!-- <div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div> -->
						</div>
						<?php
							echo "</td>";
							if ($i%3==2){
								echo "</tr>";
							}
							$i++;
						}
						$con->close();
						?>
					</div>
				</div>
				</tbody>
				</table>
			