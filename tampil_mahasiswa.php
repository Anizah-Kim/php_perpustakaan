<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 4px 4px 5px -4px;">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">PERPUSTAKAAN</a>
			<button class="navbar-toggler" type="button" data-bs-toggler="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="collapse navbar-toggler-collapse"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="home.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="tampil_mahasiswa.php">Data Mahasiswa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="buku.php">Buku</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="histori_peminjam.php">Transaksi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="logout.php">Logout</a>
						</li>	
				</ul>
			</div>
		</div>
	</nav>
	<div class="container bg-light rounded" style="margin-top: 10px"></div>
	<h3>Data Mahasiswa</h3>
	<a href="tambah_mahasiswa.php" class="btn btn-success">Tambah Mahasiswa</a>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>NO</th>
				<th>NAMA</th>
				<th>TANGGAL LAHIR</th>
				<th>JENIS KELAMIN</th>
				<th>ALAMAT</th>
				<th>USERNAME</th>
				<th>JURUSAN</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			include "koneksi.php";
			$qry_mahasiswa=mysqli_query($conn,"select * from mahasiswa join jurusan on jurusan.id_jurusan=mahasiswa.id_jurusan");
			$no=0;
			while ($data_mahasiswa=mysqli_fetch_array($qry_mahasiswa)) {
			$no++;?>
				<tr>
					<td><?=$no?></td><td><?=$data_mahasiswa['nama']?></td> <td><?=$data_mahasiswa['tanggal_lahir']?></td> <td><?=$data_mahasiswa['jenis_kelamin']?></td> <td><?=$data_mahasiswa['alamat']?></td> <td><?=$data_mahasiswa['username']?></td> <td><?=$data_mahasiswa['nama_jurusan']?></td>
					<td><a href="ubah_mahasiswa.php?id_mhs=<?=$data_mahasiswa['id_mhs']?>" class="btn btn-success">Ubah</a> | <a href="hapus_mhs.php?id_mhs=<?=$data_mahasiswa['id_mhs']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>