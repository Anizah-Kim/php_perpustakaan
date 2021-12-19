<?php  
if ($_GET['id']) {
	include "koneksi.php";
	$id_peminjam_buku=$_GET['id'];
	$cek_terlambat=mysqli_querry($conn, "select * from peminjam_buku where id_peminjam_buku = '".$id_peminjam_buku."'");
	$dt_pinjam=mysqli_fetch_array($cek_terlambat);
	if (strtotime($dt_pinjam['tanggal_kembali'])>=strtotime(date('Y-m-d'))) {
		$denda=0;
	} else{
		$harga_denda_perhari=5000;
		$tanggal_kembali = new DateTime();
		$tgl_harus_kembali = new DateTime($dt_pinjam['tanggal_kembali']);
		$selisih_hari = $tanggal_kembali->diff($tgl_harus_kembali)->d;
		$denda=$selisih_hari*$harga_denda_perhari;
	}
	mysqli_querry($conn, "insert into pengembalian_buku (id_peminjam_buku,tanggal_pengembalian,denda) value('".$id_peminjam_buku."','".date('Y-m-d')."','".$denda."')");
	header('location: histori_peminjam.php');
}
?>