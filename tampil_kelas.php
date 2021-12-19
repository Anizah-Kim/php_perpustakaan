<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<h3>Data Jurusan</h3>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>NO</th><th>JURUSAN</th><th>ANGKATAN</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include "koneksi.php";
			$qry_jurusan=mysqli_query($conn,"select * from jurusan");
			$no=0;
			while ($data_jurusan=mysqli_fetch_array($qry_jurusan)) {
			$no++;?>
			<tr>
			<td><?=$no?></td><td><?=$data_jurusan['nama_jurusan']?></td> <td><?=$data_jurusan['angkatan']?></td>

			<td><a href="hapus_kelas.php?id_jurusan<?=$data_jurusan['id_jurusan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" 
			class="btn btn-danger">Hapus</a></td>

			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"crossorigin="anonymous"></script>
</body>
</html>