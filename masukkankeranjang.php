<?php  
session_start();
	if ($_POST) {
			include "koneksi.php";

			$qry_get_buku=mysqli_query($conn,"select * from buku where id_buku = '".$GET['id_buku']."'");
			$dt_buku=mysqli_fetch_array($qry_get_buku);
			$_SESSION['cart'][]=array(
				'id_buku'=>$dt_buku['id_buku'],
				'judul_buku'=>$dt_buku['judul_buku'],
				'qty'=>$_POST['pinjam_buku']
			);
		}	
		header('location: keranjang.php');
?>