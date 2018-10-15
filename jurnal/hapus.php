<?php 
include("koneksi.php");

$nim = $_GET['nim'];

 if (isset($_GET['delete_data'])) {
 	$nim = $_GET['delete_data'];

 	$query = $pdo -> prepare("DELETE FROM data_diri where nim='$nim'");
 	$query -> execute();
 	
 	if ($query) {
            ?>
            <script>
                alert("Data berhasil terhapus");
                location = "output.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data gagal dihapus");
            </script>
            <?php
        }
 }
 ?>