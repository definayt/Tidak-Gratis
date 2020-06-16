<?php
	session_start();
	if(!isset($_SESSION['username'])){
      header("location: login.php");
    }
    else{
?>
<?php 
	include_once "connect.php"; 
	$kategori=isset($_GET['kategori'])?$_GET['kategori']:""; 
	if($kategori!="") { 
		$query="SELECT * FROM sub_kategori WHERE id_kategori=$kategori"; 
		$result=$con->query($query); 
?>
  
<label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Kategori <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
  <select id="sub_kategori" name="sub_kategori" class="form-control" required="required">
    <option value="">--- Pilih Sub Kategori ---</option>
    <?php 
		while ($row = $result->fetch_object()) { 
	?>
			<option value="<?php echo $row->id_subkategori; ?>"><?php echo $row->nama;?></option>
	<?php 
		} 
	?>
  </select>
</div>
		
<?php 
	} 
}
?>