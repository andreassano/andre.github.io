<?php 
include_once '../inc/class.perpus.php';
$obj = new buku;
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['btn-save'])) {
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$thn_terbit = $_POST['thn_terbit'];
	$isbn = $_POST['isbn'];
	$jumlah_buku = $_POST['jumlah_buku'];
	$lokasi = $_POST['lokasi'];
	$tanggal = date('Y-m-d');
	$jam = date('H:i:s');
	$waktu = $tanggal.' '.$jam;

	
	$nama_file = $_FILES['foto']['name'];
	$ukuran_file = $_FILES['foto']['size'];
	$tipe_file = $_FILES['foto']['type'];
	$tmp_file = $_FILES['foto']['tmp_name'];

	
	$imgExt = strtolower(pathinfo($nama_file,PATHINFO_EXTENSION));
	$bukupic = rand(1000,1000000).".".$imgExt;
	$path = "../imagess/".$bukupic;
	
	if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {

		if ($ukuran_file <= 1000000) {
			
			if (move_uploaded_file($tmp_file, $path)) { 

				if ($obj->create($judul,$pengarang,$penerbit,$thn_terbit,$isbn,$jumlah_buku,$lokasi,$waktu,$bukupic)) {	
				header('location:?page=buku&msg=success');
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
?>

<div class="col-sm-9">
      <h4>Input Data Buku</h4>
      <hr>
</div>

<div class="col-md-9">
	
	<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered">
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" name="judul" class="form-control" required></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td><input type="text" name="pengarang" class="form-control" required></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><input type="text" name="penerbit" class="form-control" required></td>
			</tr>
			<tr>
				<td>Tahun Terbit</td>
				<td>
					<select name="thn_terbit" class="form-control" style="width: 200px">
						<option>- Pilih Tahun -</option>
					<?php 
					for ($i=date(Y); $i >= 2000; $i--) { 
						echo "<option>".$i."</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kode ISBN</td>
				<td><input type="text" name="isbn" class="form-control" required></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" name="jumlah_buku" class="form-control" required></td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td>
					<select name="lokasi" class="form-control" style="width: 200px">
						<option>Pilih Lokasi</option>
						<option value="rak1">Rak 1</option>
						<option value="rak2">Rak 2</option>
						<option value="rak3">Rak 3</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Foto</td>
				<td><input type="file" name="foto"></td>
			</tr>

			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-primary" name="btn-save">
						<span class="glyphicon glyphicon-plus"></span> Tambah Buku
					</button>
					<a href="?page=buku" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
				</td>
			</tr>
		</table>
	</form>

</div>