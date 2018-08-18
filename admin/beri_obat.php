
<?php 
	include "../koneksi.php";
?>
<!-- End -->
<div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label">Obat</label>
							  <input type="checkbox" name="item_index[]" />
                              <div class="col-sm-3">
                              <select name="nama_obat[]" class="form-control" required>
                              <option value="0"> -- Pilih Obat -- </option>
                              <?php
									$query1="select * from tb_obat";
									$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
									while($data=mysqli_fetch_array($tampil))
									{
								?>
							<option value="<?php echo $data['nama_obat']; $nama_obat=$data['nama_obat']?>"><?php echo $data['nama_obat'];?></option>
						    <?php } ?>
							
                              </select>
                              </div>
</div>