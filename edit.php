<?php 
	session_start();
	//pemeriksaan session
	if (isset($_SESSION['nama'])) {
		//jika sudah login
		//menampilkan isi session
		
		} else {
			//session belum ada artinya belum login
			die ("<p style= text-align:center>Anda belum login! Anda tidak berhak masuk ke halaman
			ini.<br> Silahkan login <a href='login.php'>di sini</a></p>");
		}
?>	

<html>
<head>
<title>Pendaftaran Vaksinasi Covid-19</title>
  <script src="asset/jquery/jquery-3.3.1.min.js"></script>
  <script>
		$(document).ready(function(){
			$('#propinsi').change(function(){
				var propinsi_id = $(this).val();
				$.ajax({
					type : 'POST',//method
					url : 'wilayah.php', //action
					data : 'prop_id='+propinsi_id, //$_POST['prov_id']
					success : function(response){
						$('#kota').html(response);
					}
				});
			})
		});

		$(document).ready(function(){
			$('#kota').change(function(){
				var kabupatenkota_id = $(this).val();
				$.ajax({
					type : 'POST',//method
					url : 'wilayah.php', //action
					data : 'kabkota_id='+kabupatenkota_id, //$_POST['kabkot_id']
					success : function(response){
						$('#kecamatan').html(response);
					}
				});
			})
		});

		$(document).ready(function(){
			$('#jfaskes').change(function(){
				var jfaskes_id = $(this).val();
				$.ajax({
					type : 'POST',//method
					url : 'wilayah.php', //action
					data : 'jfaskes_id='+jfaskes_id, //$_POST['prov_id']
					success : function(response){
						$('#nfaskes').html(response);
					}
				});
			})
		});
	</script>

	<style type="text/css">
	    body { 
	        max-width: 500px; margin: auto; 
	    }

	    table {
	    font-family: arial, sans-serif;
	    border-collapse: collapse;
	    width: 100%;
	    }

	    td, th {
	    border: 1px solid #E0FFFF;
	    text-align: left;
	    padding: 8px;
	    }

	    tr{
	    background-color:#E0FFFF;
	    }

	    p {
	    	font-family: arial, sans-serif;
	    }

	    a {
	    	color: grey;
	    }

	</style>

</head>
<body>

	<?php
		include 'koneksi.php';
		$nik = $_GET['nik'];
		$data = mysqli_query($con,"select * from data_pendaftar where nik='$nik'");
		while($d = mysqli_fetch_array($data)){
	?>

	<h3><p align="center"><big>Edit Data Vaksinasi Covid-19</big><br/></p></h3>
	<p align="center">Operator <?php echo $_SESSION['nama'];?> / <?php echo $_SESSION['nim'];?></p>
	<form action="update.php" method="post" enctype="multipart/form-data" name="inputdata">
	<table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
	    <tr>
	        <td>Nama Wilayah</td>
	        <td>
	        	<input type="hidden" name="nik" value="<?php echo $d['nik']; ?>">
	        	 <?php 
					$sql_propinsi = mysqli_query($con, 'select * from propinsi order by name asc');
				 ?>
				 <select name="propinsi" id="propinsi" required="">
				 <option value="">--Pilih Wilayah--</option>
				 	<!-- <option value="">Pilih Propinsi</option> -->
				 	<?php 
				 		while($row_propinsi = mysqli_fetch_array($sql_propinsi)){
				 	?>
				 	<option value="<?php echo $row_propinsi['id'] ?>">
				 		<?php echo $row_propinsi['name'] ?>
				 	</option>	
				 	<?php } ?>
                  </select><br>
	        </td>
	    </tr>
	    <tr>
	        <td>Kab/Kota</td>
	        <td>
	        	<select name="kota" id="kota" required="">
			 		<!-- <option>Pilih Kota</option> -->
			 		<option>--Pilih Kota--</option>
		 		</select>
	        </td>
	    </tr>
	    <tr>
	    	<tr>
	        <td>Kecamatan</td>
	        <td>
	        	<select name="kecamatan" id="kecamatan" required="">
			 		<!-- <option>Pilih Kecamatan</option> -->
			 		<option>--Pilih Kecamatan--</option>
		 		</select>
	        </td>
	    </tr>
	    <tr>
	    	<tr>
	        <td>Jenis Faskes</td>
	        <td>
	        	<?php 
					$sql_jfaskes = mysqli_query($con, 'select * from jfaskes order by name asc');
				 ?>
				 <select name="jfaskes" id="jfaskes" required="">
				 	<option value="" required="required">--Pilih Jenis Faskes--</option>
				 	<?php 
				 		while($row_jfaskes = mysqli_fetch_array($sql_jfaskes)){
				 	?>
				 	<option value="<?php echo $row_jfaskes['id'] ?>">
				 		<?php echo $row_jfaskes['name'] ?>
				 	</option>	
				 	<?php } ?>
                  </select><br>
	        </td>
	    </tr>
	    <tr>
	    	<tr>
	        <td>Nama Faskes</td>
	        <td ><select name="nfaskes" id="nfaskes" required="">
			 		<option>--Pilih Nama Faskes--</option>
			 		<option></option>
		 		</select>
		 	</td>
	    </tr>
	    <tr>
	    <tr>
	        <td>Nama</td>
	        <td><input type="text" name="nama" size="20" required="" value="<?php echo $d['nama_pendaftar'] ?>"></td>
	    </tr>
	    <tr>
	        <td>Jenis Kelamin</td>
	        <td>
	        	<select name="jk" required="" value="<?php echo $d['kelamin'] ?>">
	        		<option>--Pilih Jenis Kelamin--</option>
	        		<option>Laki - Laki</option>
	        		<option>Perempuan</option>
	        	</select>
	        </td>
	    </tr>
	    <tr>
	        <td>Umur</td>
	        <td><input type="text" name="umur" size="20" required="" value="<?php echo $d['umur'] ?>"></td>
	    </tr>
	    <tr>
	        <td>Tanggal Lahir</td>
	        <td><input placeholder="yyyy/mm/dd" type="text" name="tgl_lahir" size="20" required="" value="<?php echo $d['tgl_lahir'] ?>"></td>
	    </tr>
	    <tr>
	        <td>Nomor HP</td>
	        <td><input type="text" name="no_hp" size="20" required="" value="<?php echo $d['no_hp'] ?>"></td>
	    </tr>
	    <tr>
	        <td>Alamat</td>
	        <td><input type="text" name="alamat" size="20" required="" value="<?php echo $d['alamat'] ?>"></td>
	    </tr>
	    <tr>
	        <td>&nbsp;</td>
	        <td><input type="submit" value="Update" name="submit">
	    </tr>
	</table>
	<p align="right">
	<a href="tampil.php" style="color : blue"><b>Lihat Data</b></a> &nbsp
	<a href='logout.php' style="color : blue"><b>Logout</b></a>
	</p>
	</form>
	<?php 
	}
	?>

	<p align="center"><br>
	<br>

</body>
</html>
