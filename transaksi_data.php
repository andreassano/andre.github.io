<?php 
include_once 'inc/class.perpus.php';
$transaksi = new transaksi;
date_default_timezone_set('Asia/Jakarta');

if (isset($_GET['proses'])) {
	if ($_GET['proses']=="Kembali") {
		$id = $_GET['id'];
		$judul = $_GET['judul'];
		$proses = $_GET['proses'];
		$ut = $transaksi->u_transaksi($id,$proses);
		$utb = $transaksi->ut_buku(1,$judul);
		if ($ut || $utb) {
			echo "<script>alert('Berhasil Dikembalikan')</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
		} else {
			echo "<script>alert('Gagal Dikembalikan')</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
		}
	}elseif ($_GET['proses']=="perpanjang") {
		$id = $_GET['id'];
		$tgl_kembali = $_GET['tgl_kembali'];
		$lambat = $_GET['lambat'];
		if ($lambat > 7) {
			echo "<script>alert('Buku yang dipinjam tidak dapat diperpanjang, karena sudah terlambat lebih dari 7 hari. Kembalikan dahulu, kemudian pinjam kembali !');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
		}else{

			if ($transaksi->perpanjang($tgl_kembali,$id)) {
				echo "<script>alert('Berhasil Diperpanjang');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
			}else{
				echo "<script>alert('Gagal Diperpanjang');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
			}

		}
	}
}
?>
<div class="col-sm-9">
  <h4>Data Transaksi</h4>
  <hr>	
</div>
<div id="loginbox" style="margin-top: ;" class="mainbox col-md-9">
	<div class="panel panel-info">
		<div class="panel-heading">
			<a  class="btn btn-success" href="?page=transaksi_input"><span class="glyphicon glyphicon-save-file"></span> Input Transaksi</a>
			<div class="pull-right col-md-4">
				<form action="?page=transaksi_search" method="post">				
          <div class="input-group">
				  	<input type="text" name="cari" class="form-control" placeholder="Cari Nama Buku, uter..">
				    <span class="input-group-btn">
				    <button type="submit" class="btn btn-default" type="button">
				    	<span class="glyphicon glyphicon-search"></span>
				    </button>
				    </span>
				  </div>
				</form>
      </div>
			<!-- <div class="panel-title">Input uter</div> -->
		</div>
		<div style="padding-top: 10px" class="panel-body">
		<br>
    <?php 
		if (isset($_GET['msg'])) {
			if ($_GET['msg']=="success") {
				$msg="
				<div class='alert alert-success'>
    		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    		<strong>Success!</strong> Data berhasil di tambah.
  			</div>
				";
			}elseif ($_GET['msg']=="delete") {
				$msg="
				<div class=\"alert alert-danger\">
    		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    		<strong>Success!</strong> Data berhasil di hapus.
  			</div>
				";
			}elseif ($_GET['msg']=="edit") {
				$msg="
				<div class=\"alert alert-warning\">
    		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    		<strong>Success!</strong> Data berhasil di Edit.
  			</div>
				";
			}
		}

		if (isset($msg)) {
			echo $msg;
		}
		?>

			<table class="table table-bordered">
				<thead>
				<tr>
					<th style= "text-align: center;" width="5%">No</th>
					<th style= "text-align: center;">Judul Buku</th>
					<th style= "text-align: center;">Peminjam</th>
					<th style= "text-align: center;">Tgl Pinjam</th>
					<th style= "text-align: center;">Tgl Kembali</th>
					<th style= "text-align: center;">Status</th>
					<th style= "text-align: center;">Action</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				
				$records_per_page=5;
				$query = "SELECT * FROM tbl_transaksi";
				$newquery = $transaksi->paging($query,$records_per_page);
				// penomoran halaman data pada halaman
				if (isset($_GET['page_no'])) {
				$page = $_GET['page_no'];
				}
				if (empty($page)) {
					$posisi = 0;
					$halaman = 1;
				}else{
					$posisi = ($page - 1) * $records_per_page;
				}
				$no=1+$posisi;
				foreach ($transaksi->showData($newquery) as $value) {
					?>
					<tr style="text-align: center;">
					<td><?php echo $no; ?></td>
					<td><?=$value['judul']; ?></td>
					<td><?=$value['nama']; ?></td>
					<td><?=$value['tgl_pinjam']?></td>
					<td><?=$value['tgl_kembali']?></td>
					<td><?=$value['status']?></td>
					<td>
						<?php
						if($value['status'] == "Pinjam"){
						?>
								<a href="?page=transaksi&proses=Kembali&id=<?=$value['id'];?>&judul=<?=$value['judul'];?>">kembali</a>
						
						<?php
						}elseif($value['status'] == "Kembali"){
						?>
								<a  style="pointer-events:none;" href="?page=transaksi&proses=Kembali&id=<?=$value['id'];?>&judul=<?=$value['judul'];?>">Dikembalikan</a>
						<?php
						}
						?>
					</td>
					</tr>
					<?php
					$no++;
				}
				?>
				</tbody>
				<tr>
	        <td colspan="7" align="center">
			    <div class="pagination-wrap">
			      <?php $transaksi->paginglink($query,$records_per_page); ?>
			    </div>
		  	  </td>
		    </tr>
			</table>
			Jumlah : <b><?php $transaksi->jumlah($query); ?> transaksi</b>
		</div>
	</div>
</div>
