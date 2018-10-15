<?php 

include("koneksi.php");
    if (isset($_POST['simpan'])) {
        $nama       = $_POST['nama'];
		$nim        = $_POST['nim'];
		$jenkel  = $_POST['jenkel'];
		$prog  = $_POST['prog'];
		$fak  = $_POST['fak'];
		$asal  = $_POST['asal'];
		$modup  = $_POST['modup'];

        $query = $pdo -> prepare("INSERT INTO data_diri(nama, nim, jenkel, prog, fak, asal, modup) VALUE 

        	('$nama','$nim', '$jenkel', '$prog', '$fak', '$asal', '$modup')");

        $query -> execute();
        if ($query) {
            ?>
            <script>
                alert("Data berhasil tersimpan");
                location = "output.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data tidak tersimpan");
            </script>
            <?php
        }
    }

 ?>