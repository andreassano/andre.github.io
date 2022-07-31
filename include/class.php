<?php 

include '../func/db.php';


$nis = $_GET['nis'];

function tes($nis)
{
	global $koneksi;
	$semua = mysqli_query($koneksi, "SELECT * FROM tels WHERE nis = '$nis'");
	if(mysqli_num_rows($semua) == 0){
		$data = array('status'=>'error');

	}else{
		$data2 = mysqli_fetch_assoc($semua);
		$data = array('status'=>'success','nama'=>$data2['nama'],'kelas'=>$data2['kelas'],'jurusan'=>$data2['jurusan']);

	}
	  return json_encode($data);


}

print tes($nis);


?>