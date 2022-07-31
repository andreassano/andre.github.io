<div class="col-sm-9">
<h1></h1>
<style>
.wrimagecard{	
	margin-top: 0;
    margin-bottom: 1.5rem;
    text-align: left;
    position: relative;
    background: #fff;
    box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
    border-radius: 4px;
    transition: all 0.3s ease;
    border-radius: 25px;
}
.wrimagecard .fa{
	position: relative;
    font-size: 90px;
}
.wrimagecard-topimage_header{
padding: 25px;
    border-radius: 20px;
}
a.wrimagecard:hover, .wrimagecard-topimage:hover {
    box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);
}
.wrimagecard-topimage a {
    width: 100%;
    height: 100%;
    display: block;
 }
.wrimagecard-topimage_title {
    padding: 20px 24px;
    height: 80px;
    padding-bottom: 0.75rem;
    position: relative;
}
.wrimagecard-topimage a {
    border-bottom: none;
    text-decoration: none;
    color: #525c65;
    transition: color 0.3s ease;
}
</style>
<?php 
				include_once '../inc/class.perpus.php';
				$buku = new buku;
				$anggota = new anggota;
				$transaksi = new transaksi;
				$query = "SELECT * FROM tbl_buku";
				$query2 = "SELECT * FROM tbl_anggota";
				$query3 = "SELECT * FROM tbl_transaksi";
?>
<div class="container-fluid">
	<div class="row">	
	<div class="col-md-4 col-sm-4">
	<div class="wrimagecard wrimagecard-topimage">
          <a href="?page=buku">
          <div class="wrimagecard-topimage_header" style="background-color:rgba(183,222,237,1) ">
            <center><h3> Jumlah Buku </h3></center><br>
            <center><h4><p><b><?php $buku->jumlah($query); ?> Buku</b></p></h4></center>
          </div>
         <div class="wrimagecard-topimage_title">
            <center><h4><u>Lihat Detail</u>
            <div class="pull-right badge" id="WrControls"></div></h4></center>
          </div>
        </a>
      </div>
</div>
<div class="col-md-4 col-sm-4">
	<div class="wrimagecard wrimagecard-topimage">
          <a href="?page=anggota">
          <div class="wrimagecard-topimage_header" style="background-color:rgba(241,231,103,1) ">
            <center><h3> Jumlah Anggota </h3></center><br>
            <center><h4><p><b><?php $anggota->jumlah($query2); ?> Anggota</b></p></h4></center>
          </div>
         <div class="wrimagecard-topimage_title">
            <center><h4><u>Lihat Detail</u>
            <div class="pull-right badge" id="WrControls"></div></h4></center>
          </div>
        </a>
      </div>
</div>
<div class="col-md-4 col-sm-4">
	<div class="wrimagecard wrimagecard-topimage">
          <a href="?page=transaksi">
          <div class="wrimagecard-topimage_header" style="background-color:rgba(241,111,92,0.72) ">
            <center><h3> Jumlah Transaksi </h3></center><br>
            <center><h4><p><b><?php $transaksi->jumlah($query3); ?> Transaksi</b></p></h4></center>
          </div>
         <div class="wrimagecard-topimage_title">
            <center><h4><u>Lihat Detail</u>
            <div class="pull-right badge" id="WrControls"></div></h4></center>
          </div>
        </a>
      </div>
</div>
</div>
</div>