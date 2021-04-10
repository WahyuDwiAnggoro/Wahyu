<?php 
  session_start();
  //pemeriksaan session
  if (isset($_SESSION['nama'])) {
    } else {
      //session belum ada artinya belum login
      die ("<p style= text-align:center>Anda belum login! Anda tidak berhak masuk ke halaman
      ini.<br> Silahkan login <a href='login.php'>di sini</a></p>");
    }
	
	$koneksi = mysqli_connect("localhost", "root", "", "db_covid19");
?>

<html>
<head>
<title>Cetak pdf</title>
<style type="text/css">
    body {
      font-size: 15px;
      color: #343d44;
      font-family: "segoe-ui", "open-sans", tahoma, arial;
      padding: 0;
      margin: 0;
    }
    table {
      margin: auto;
      font-family: "segoe-ui", "open-sans", tahoma, arial;
      font-size: 12px;
    }

    h1 {
      margin: 25px auto 0;
      text-align: center;
      text-transform: uppercase;
      font-size: 17px;
    }

    table td {
      transition: all .5s;
    }
    
    /* Table */
    .data-table {
      
      font-size: 14px;
      min-width: 537px;
    }

    .data-table th, 
    .data-table td {
      border: 1px solid #000000;
      padding: 7px 17px;
    }
    .data-table caption {
      margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
      background-color: #FFFFFF;
      color: #000000;
      border-color: #000000 !important;
      
    }

    /* Table Body */
    .data-table tbody td {
      color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: left;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
      background-color: #ffffa2;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #e5f5ff;
      text-align: right;
    }
    .data-table tfoot th:first-child {
      text-align: left;
    }
    .data-table tbody td:empty
    {
      background-color: #ffcccc;
    }

    a {
      color: grey; 
    }
  </style>
</head>
<body style="text-align:center">

<?php 
$prov = $_GET['wilayah'];
?>

<?php 
      $sql=mysqli_query($koneksi,"SELECT * FROM data_pendaftar where wilayah='$prov'");
      while ($data=mysqli_fetch_array($sql)) {
		  $nfaskes = $data['nama_faskes'];
		  $nama = $data['nama_pendaftar'];
		  $nik = $data['nik'];
		  $kelamin = $data['kelamin'];
		  $umur = $data['umur'];
		  $no_hp = $data['no_hp'];
	  }
	  
	  
	
  ?>
  
<h1>DATA PESERTA VAKSINASI COVID-19 WILAYAH <?php echo $prov?></h1>

<?php
    date_default_timezone_set('Asia/Jakarta');
    echo "Per " . date("d F Y H:i:s") . "<br>";
    echo $_SESSION['nama'];?> / <?php echo $_SESSION['nim'];
	
  ?>

<tr><br></tr>
<tr><br></tr>  
<table  width = "50%" height = "15%" border = "1" cellspacing = "0" cellpadding = "10">
<tr align="center">
<td><b>No.</td>
<td><b>Nama Faskes</td>
<td><b>Nama</td>
<td><b>NIK</td>
<td><b>Kelamin</td>
<td><b>Umur</td>
<td><b>No. Hp</td>
</tr>

<?php if(mysqli_num_rows($sql)>0){ ?>
        <?php
            $no = 1;
        ?>

<tr>
<td align="center"><?php echo $no?></td>
<td><?php echo $nfaskes?></td>
<td><?php echo $nama?></td>
<td><?php echo $nik?></td>
<td><?php echo $kelamin?></td>
<td><?php echo $umur?></td>
<td><?php echo $no_hp?></td>
</tr>
<?php $no++; } ?>
</table>
<script>
		window.print()
	</script>
</body>
</html>