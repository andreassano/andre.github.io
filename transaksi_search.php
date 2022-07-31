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

			<table class="table table-bordered">
				<thead>
				<tr>
					<th style="text-align:center"width="5%">No</th>
					<th style="text-align:center">Judul Buku</th>
					<th style="text-align:center">Peminjam</th>
					<th style="text-align:center">Tgl Pinjam</th>
					<th style="text-align:center">Tgl Kembali</th>
					<th style= "text-align: center;">Status</th>
					<th style="text-align:center">Action</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				include_once 'inc/class.perpus.php';
				$transaksi = new transaksi;

				$cari = $_POST['cari'];
				$records_per_page=5;
				$query = "SELECT * FROM tbl_transaksi WHERE nama like '%$cari%' OR status like '%$cari%' OR judul like '%$cari%'";
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
