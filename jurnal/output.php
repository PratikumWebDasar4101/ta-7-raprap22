<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="cari.php">
	Search:<input type="text" name="cari">
	<input type="submit" name="carii" value="Cari">
</form>
	<table border="4" rules="all" align="center">
		<tr>
			<td>Nama &nbsp&nbsp</td>
			<td>NIM &nbsp&nbsp&nbsp&nbsp</td>
			<td>Keterangan </td>
		</tr>
		<?php
		include("koneksi.php");	
            $query = $pdo -> prepare("SELECT nim, nama FROM data_diri");
            $query -> execute();
            $row = $query -> rowcount();
            if ($row != 0 ) {
                while($data = $query -> fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nim']; ?></td>  
                        <td><a href="hapus.php?delete_data= <?php echo $data['nim'] ?>"> Hapus</a></td>                                      
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4"><h2>Data tidak ada</h2></td>
                </tr>
                <?php
            }
            ?>
	</table>
<button><a href="form.html">Kembali</a></button>
</body>
</html>