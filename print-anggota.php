<html>
<body onLoad="window.print();">

   <style type="text/css">
body {
  font-size:12px;
  font-family:Arial, Helvetica, sans-serif;
}
.style1{
  font-size:14px;
  font-family:Times, Helvetica, sans-serif;
}
      .paragraf1{
        line-height: 0.5;
        font-size:14px;
        font-family:Times, Helvetica, sans-serif;
      }
      .paragraf2{
        line-height: 0.1;
        font-size:25px;
        font-family:Arial, Helvetica, sans-serif;
        font-weight: bold;
      }
      .paragraf3{
        font-size:14px;
        font-family:Times, Helvetica, sans-serif;       
        text-align: center;
      }
      .paragraf4{
        line-height: 0.1;
        font-size:16px;
        font-family:Times, Helvetica, sans-serif;       
        text-align:left;
        text-indent:690px;

      }
      .paragraf5{
        line-height: 8.8;
        font-weight: bold;
        font-size:16px;
        font-family:Times, Helvetica, sans-serif;       
        text-align:left;
        text-indent:690px;
        text-decoration: underline;
      }
       .paragraf6{
        line-height: 0.1;
        font-size:16px;
        font-family:Times, Helvetica, sans-serif;       
        text-align:left;
        text-indent:10px;
        bottom: 5px;
        position: absolute;
      }
      .hr1{
        position:absolute;
        bottom:30px;
        width: 890px;
        size: 1px;
      }
</style>
<br> <!-- Header report -->
<p><img src="img/baru.jpg" style="float:left" height="140px" widht="140px"><p class="paragraf2" align="center">Perpustakaan Andreas Novito Andi Sano</p><p class="paragraf1" align="center">Villa Bekasi Indah 2 Jl. Edelweis F Blok E7 No 34 - Tambun Selatan</p><p class="paragraf1" align="center">Kabupaten Bekasi Jawa Barat 17510</p><p class="paragraf1" align="center">Telepon(021)11111111,  Fax.(021)88888888</p><p class="paragraf1" align="center">Email : andreasnovitoandi17@gmail.com</p></p><br/>
<hr size='1px' color="black" width="auto">
<hr size='2px' color="black" width="auto"><br><br>   
<h2><p align="center">LAPORAN DATA ANGGOTA PERPUSTAKAAN</p></h2><br><br><br>
  <table width="100%" cellspacing="0" cellpadding="5" border="1px" class="style1">
          

          <!-- Isi Report -->
  <tr>
    <th width="5%" align="center" class="style1" bgcolor="#CCCCCC">NO</th>
    <th width="13%" align="center" class="style1" bgcolor="#CCCCCC">NIS</th>
    <th width="26%" align="center" class="style1" bgcolor="#CCCCCC">NAMA</th>
    <th width="14%" align="center" class="style1" bgcolor="#CCCCCC">TEMPAT LAHIR</th>
    <th width="11%" align="center" class="style1" bgcolor="#CCCCCC">TGL LAHIR</th>
    <th width="9%" align="center" class="style1" bgcolor="#CCCCCC">JENIS KELAMIN</th>
    <th width="14%" align="center" class="style1" bgcolor="#CCCCCC">JURUSAN</th>
    <th width="8%" align="center" class="style1" bgcolor="#CCCCCC">THN MASUK</th>
  </tr>
          
  <?php
  include_once 'inc/class.perpus.php';
  $anggota = new anggota;
  $query = "SELECT * FROM tbl_anggota ORDER by nim";  
  $no = 1;
        
        foreach ($anggota->showData($query) as $data) {
      ?>
            <tbody>
              <tr>
                <td class="paragraf3"><?php echo $no; ?></td>
                <td class="paragraf3"><?php echo $data['nim']; ?></td>
                <td class="paragraf3"><?php echo $data['nama']; ?></td>
                <td class="paragraf3"><?php echo $data['tempat_lahir']; ?></td>
                <td class="paragraf3"><?php echo $data['tgl_lahir']; ?></td>
                <td class="paragraf3"><?php echo $data['jk']; ?></td>                
                <td class="paragraf3"><?php echo $data['prodi']; ?></td>
                <td class="paragraf3"><?php echo $data['thn_masuk']; ?></td>
              </tr>
        
      <?php $no++; } ?>
               
    </tbody>
</table><br/><br/><br/>
<!-- Footer Report -->
<p  class="paragraf4">Hormat Kami,</p><p class="paragraf4">Kepala Perpustakaan</p><p class="paragraf5">Pius Arya Krisna Yudha</p>
<hr class="hr1" color="black">
<p  class="paragraf6">Bagian Pengelola Perpustakaan</p>   
</body>
</html>