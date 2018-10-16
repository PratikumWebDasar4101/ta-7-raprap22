<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="output.php" method="POST">
	Search:<input type="text" name="cari">
	<input type="submit" value="Search">
</form>
	<table border="4" rules="all" align="center">
		<tr>
			<td>Nama &nbsp&nbsp</td>
			<td>NIM &nbsp&nbsp&nbsp&nbsp</td>
			<td>Keterangan </td>
		</tr>
		<?php
		include("koneksi.php");	
            @$search = $_POST['cari'];
            $query = $pdo -> prepare("SELECT nim, nama FROM data_diri WHERE nim LIKE '%$search%'");
            $query -> execute();
            $row = $query -> rowcount();
            if ($row != 0 ) {
                while($data = $query -> fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nim']; ?></td>  
                        <td>
                            <a href="hapus.php?delete_data= <?php echo $data['nim'] ?>"> Hapus</a>  |
                            <a href="edit.php?edit= <?php echo $data['nim'];?>">Edit</a>
                        </td>                                      
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
<button><a href="form.html">Tambah Data</a></button>
</body>
</html>
