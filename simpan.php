<?php
//cek button    
    include 'koneksi.php';
    
    $nik               = $_POST['nik'];
    $nama                = $_POST['nama'];
    $jk                 = $_POST['jk'];
    $tgl_lahir           = $_POST['tgl_lahir'];
    $umur               = $_POST['umur'];   
    $alamat                = $_POST['alamat'];
    $no_hp               = $_POST['no_hp'];
    $wilayah                = $_POST['propinsi'];
    $nama_faskes            = $_POST['nfaskes'];
	
	switch ($wilayah) {
	case "11";
	$prov = "ACEH";
	break;
	
	case "12";
	$prov = "SUMATERA UTARA";
	break;
	
	case "13";
	$prov = "SUMATERA BARAT";
	break;
	
	case "14";
	$prov = "RIAU";
	break;
	
	case "15";
	$prov = "JAMBI";
	break;
	
	case "16";
	$prov = "SUMATERA SELATAN";
	break;
	
	case "17";
	$prov = "BENGKULU";
	break;
	
	case "18";
	$prov = "LAMPUNG";
	break;
	
	case "19";
	$prov = "KEPULAUAN BANGKA BELITUNG";
	break;
		
	case "21";
	$prov  = "KEPULAUAN RIAU";
	break;
	
	case "31";
	$prov = "DKI JAKARTA";
	break;
	
	case "32":
	$prov = "JAWA BARAT";
	break;
	
	case "33";
	$prov = "JAWA TENGAH";
	break;
	
	case "34";
	$prov = "DI YOGYAKARTA";
	break;
	
	case "35";
	$prov = "JAWA TIMUR";
	break;
	
	case "36";
	$prov = "BANTEN";
	break;
	
	case "51";
	$prov = "BALI";
	break;
	
	case "52";
	$prov = "NUSA TENGGARA BARAT";
	break;
	
	case "53";
	$prov = "NUSA TENGGARA TIMUR";
	break;
	
	case "61";
	$prov = "KALIMANTAN BARAT";
	break;
	
	case "62";
	$prov = "KALIMANTAN TENGAH";
	break;
	
	case "63";
	$prov = "KALIMANTAN SELATAN";
	break;
	
	case "64";
	$prov = "KALIMANTAN TIMUR";
	break;
	
	case "65";
	$prov = "KALIMANTAN UTARA";
	break;
	
	case "71";
	$prov = "SULAWESI UTARA";
	break;
	
	case "72";
	$prov = "SULAWESI TENGAH";
	break;
	
	case "73";
	$prov = "SULAWESI SELATAN";
	break;
	
	case "74";
	$prov = "SULAWESI TENGGARA";
	break;
	
	case "75";
	$prov = "GORONTALO";
	break;
	
	case "76";
	$prov = "SULAWESI BARAT";
	break;
	
	case "81";
	$prov = "MALUKU";
	break;
	
	case "82";
	$prov = "MALUKU UTARA";
	break;
	
	case "91";
	$prov = "PAPUA BARAT";
	break;
	
	case "94";
	$prov = "PAPUA";
	break;
}

switch ($nama_faskes) {
	case "1101";
	$nm_faskes = "Puskesmas Gondrong";
	break;
	
	case "1201";
	$nm_faskes = "RSUD Kota Tangerang";
	break;
	
}
    
    $input    ="INSERT INTO data_pendaftar(nik,nama_pendaftar,kelamin,tgl_lahir,umur,alamat,no_hp,wilayah,nama_faskes) 
                    VALUES ('$nik','$nama','$jk','$tgl_lahir','$umur','$alamat','$no_hp','$prov','$nm_faskes')";
    $query = mysqli_query($con, $input);
//Tutup koneksi engine MySQL

  if (!$query) {
    die ('SQL Error: ' . mysqli_error($con));
  }

    header("location:tampil.php");

?>