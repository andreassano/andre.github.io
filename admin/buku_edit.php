	<?php 
include_once '../inc/class.perpus.php';
$buku = new buku;

if (isset($_POST['btn-update'])) {
	$id = $_GET['id'];
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$thn_terbit = $_POST['thn_terbit'];
	$isbn = $_POST['isbn'];
	$jumlah_buku = $_POST['jumlah_buku'];
	$lokasi = $_POST['lokasi'];
	$ufoto = $_FILES['foto']['name'];	
	
	if (empty($_FILES['foto']['name'])) {	
		if ($buku->update($id,$judul,$pengarang,$penerbit,$thn_terbit,$isbn,$jumlah_buku,$lokasi,$ufoto)) {
			header('location:?page=buku&msg=edit');
		}
	}else{
		// Ambil data gambar dari form
		$nama_file = $_FILES['foto']['name'];
		$ukuran_file = $_FILES['foto']['size'];
		$tipe_file = $_FILES['foto']['type'];
		$tmp_file = $_FILES['foto']['tmp_name'];

		// set path folder tempat menyimpan gambar
		$imgExt = strtolower(pathinfo($nama_file,PATHINFO_EXTENSION));
		$bukupic = rand(1000,1000000).".".$imgExt;
		$path = "../imagess/".$bukupic;
		// Cek apakah tipe file yg di upload adalah JPG/JPEG/PNG
		if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
			# jika tipe file JPG/JPEG/PNG, maka lakukan:
			// Cek apakah ukuran file sama atau lebih kecil dari 1MB
			if ($ukuran_file <= 1000000) {
				# jika ukuran file kurang dari sama dengan 1MB, lakukan :
				// proses upload
				if (move_uploaded_file($tmp_file, $path)) { // cek apakah gambar berhasil di upload
					# jika gambar berhasil di upload, lakukan :
					//  proses simpan ke database
					if ($buku->update($id,$judul,$pengarang,$penerbit,$thn_terbit,$isbn,$jumlah_buku,$lokasi,$bukupic)) {
						header('location:?page=buku&msg=edit');
					}			
				}else{
					// jika gambar gagal di upload
					echo "<script> alert('Data Gagal Di Upload') </script>";
					echo "<meta http-equiv='refresh' content='0; url=?page=buku'>";
				}
			}else{
				// jika ukuran lebih dari 1MB
				echo "<script> alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB') </script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=buku'>";
			}
		}else{
			//jika tipe file yg diupload bukan JPG/JPEG.PNG, lakukan :
			echo "<script> alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.') </script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=buku'>";
		}

	}
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	extract($buku->getData($id,'tbl_buku','id'));
}
?>
<div class="col-sm-9">
	<h4>Edit Buku</h4>
  <hr>
</div>

<div class="col-md-9">

<?php 
if (isset($msg)) {
	echo $msg;
}
?>
	
	<form method="post" enctype="multipart/form-data" action="">
		<table class="table table-bordered">
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" name="judul" class="form-control" value="<?=$judul;?>" required></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td><input type="text" name="pengarang" class="form-control" value="<?=$pengarang;?>" required></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><input type="text" name="penerbit" class="form-control" value="<?=$penerbit;?>" required></td>
			</tr>
			<tr>
				<td>Tahun Terbit</td>
				<td>
					<select name="thn_terbit" class="form-control" style="width: 200px">
						<option>- Pilih Tahun -</option>
					<?php 
					for ($i=date(Y); $i >= 2000; $i--) { 
						if ($thn_terbit==$i) {
							echo "<option selected>$i</option>";
						}else{
						echo "<option>".$i."</option>";
						}
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kode ISBN</td>
				<td><input type="text" name="isbn" class="form-control" value="<?=$isbn;?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" name="jumlah_buku" class="form-control" value="<?=$jumlah_buku;?>"></td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td>
					<select name="lokasi" class="form-control" style="width: 200px">
						<option>Pilih Lokasi</option>
						<?php 
						for ($i=1; $i <= 3; $i++) { 
							if ($lokasi=='rak'.$i) {
							echo "<option selected value=rak$i>Rak $i</option>";
							}else{
								echo "<option value=rak$i>Rak $i</option>";
							}
						}
						?>
					</select>
				</td>
				<tr>
				<td>Foto</td>
				<td>
					<img src="../imagess/<?=$foto;?>" width="150" height="170" class="img-rounded"><br><br>
					<input type="file" name="foto">
				</td>
			</tr>
			</tr>

			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-primary" name="btn-update">
						<span class="glyphicon glyphicon-plus"></span> Update
					</button>
					<a href="?page=buku" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
				</td>
			</tr>
		</table>
	</form>

</div>