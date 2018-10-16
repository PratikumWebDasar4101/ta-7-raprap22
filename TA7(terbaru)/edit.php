<?php
   	require("koneksi.php");
    if (isset($_GET['edit'])) {
    	$nim = $_GET['edit'];
	    $sql = $pdo  -> prepare("SELECT * FROM data_diri WHERE nim = '$nim'");
	    $sql -> execute();
	    $data = $sql -> fetch(PDO::FETCH_ASSOC);
    }
?>

<table>
		<form method="POST">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo $data['nama'] ?>"></td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="number" name="nim" value="<?php echo $data['nim'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><input type="radio" name="jenkel" <?php if($data['jenkel'] == "Laki-laki") echo "checked" ?> value="Laki-laki">Laki-laki<br>
					<input type="radio" name="jenkel" <?php if($data['jenkel'] == "Perempuan") echo "checked" ?> value="Perempuan">Perempuan</td>
			</tr>
			<tr>
				<td>Program Studi</td>
				<td>:</td>
				<td>
					<select name="prog">
						<option <?php if($data['prog'] == "D3 Sistem Informasi" ) echo "selected" ?> value="D3 Sistem Informasi">D3 Sistem Informasi</option>
						<option <?php if($data['prog'] == "D4 Sistem Multimedia" ) echo "selected" ?> value="D4 Sistem Multimedia">D4 Sistem Multimedia</option>
						<option <?php if($data['prog'] == "D3 Sistem Informasi Akutansi" ) echo "selected" ?> value="D3 Sistem Informasi Akutansi">D3 Sistem Informasi Akutansi</option>
						<option <?php if($data['prog'] == "D3 RKPLA" ) echo "selected" ?> value="D3 RKPLA">D3 RKPLA</option>
						<option <?php if($data['prog'] == "D3 Teknologi Komputer" ) echo "selected" ?> value="D3 Teknologi Komputer">D3 Teknologi Komputer</option>
						<option <?php if($data['prog'] == "D3 Manajemen Pemasaran" ) echo "selected" ?> value="D3 Manajemen Pemasaran">D3 Manajemen Pemasaran</option>
						<option <?php if($data['prog'] == "D3 Perhotelan" ) echo "selected" ?> value="D3 Perhotelan">D3 Perhotelan</option>
						<option <?php if($data['prog'] == "D3 Teknik Telekomunikasi" ) echo "selected" ?> value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Fakultas</td>
				<td>:</td>
				<td>
					<select name="fak">
						<option <?php if($data['fak'] == "FIT" ) echo "selected" ?> value="FIT">FIT</option>
						<option <?php if($data['fak'] == "FIF" ) echo "selected" ?> value="FIF">FIF</option>
						<option <?php if($data['fak'] == "FTE" ) echo "selected" ?> value="FTE">FTE</option>
						<option <?php if($data['fak'] == "FRI" ) echo "selected" ?> value="FRI">FRI</option>
						<option <?php if($data['fak'] == "FKB" ) echo "selected" ?> value="FKB">FKB</option>
						<option <?php if($data['fak'] == "FEB" ) echo "selected" ?> value="FEB">FEB</option>
						<option <?php if($data['fak'] == "FIK" ) echo "selected" ?> value="FIK">FIK</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Asal</td>
				<td>:</td>
				<td><input type="text" name="asal" value="<?php echo $data['asal'] ?>"></td>
			</tr>
			<tr>
				<td>Moto Hidup</td>
				<td>:</td>
				<td><textarea name="modup"><?php echo $data['modup']?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="simpan" value="simpan"></td>
			</tr>
		</form>
	</table>
	<?php
    if (isset($_POST['nim'])) {
        $nama       = $_POST['nama'];
		$nim        = $_POST['nim'];
		$jenkel  = $_POST['jenkel'];
		$prog  = $_POST['prog'];
		$fak  = $_POST['fak'];
		$asal  = $_POST['asal'];
		$modup  = $_POST['modup'];
        $sql= $pdo -> prepare("UPDATE data_diri SET nama = '$nama', jenkel='$jenkel' ,prog='$prog', fak='$fak', asal='$asal', 
        	modup= '$modup' WHERE nim ='$nim'");
        $sql -> execute();
        if($sql){
            ?>
            <script>
            alert("data berhasil diubah");
            location = "output.php";
        </script>
        <?php
        }
    }
?>