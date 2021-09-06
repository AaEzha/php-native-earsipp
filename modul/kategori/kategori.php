<?php

//uji jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {

	//pengujian apakah data akan diedit / simpan baru
	if (@$_GET['hal'] == "edit") {
		//perintah edit data
		//ubah data
		$ubah = mysqli_query($koneksi, "UPDATE tbl_kategori SET 
										nama_kategori = '$_POST[nama_kategori]' 
										where id_kategori = '$_GET[id]' ");
		if ($ubah) {
			echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=kategori';
					  </script>";
		}
	} else {
		//perintah simpan data baru
		//simpan data
		$simpan = mysqli_query($koneksi, "INSERT INTO tbl_kategori 
											  VALUES ('', '$_POST[nama_kategori]') ");
		if ($simpan) {
			echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=kategori';
					  </script>";
		}
	}
}

//Uji Jika klik tombol edit / hapus
if (isset($_GET['hal'])) {

	if ($_GET['hal'] == "edit") {

		//tampilkan data yang akan diedit
		$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_kategori where id_kategori='$_GET[id]'");
		$data = mysqli_fetch_array($tampil);
		if ($data) {
			//jika data ditemukan, maka data ditampung ke dalam variabel
			$vnama_kategori = $data['nama_kategori'];
		}
	} else {

		$hapus = mysqli_query($koneksi, "DELETE FROM tbl_kategori WHERE id_kategori='$_GET[id]'");
		if ($hapus) {
			echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=kategori';
					  </script>";
		}
	}
}

?>


<div class="card mt-3">
	<div class="card-header bg-danger text-white ">
		Form Data kategori
	</div>
	<div class="card-body">
		<form method="post" action="">
			<div class="form-group">
				<label for="nama_kategori">Nama Kategori</label>
				<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required="required" value="<?= @$vnama_kategori ?>">
			</div>
			<button type="submit" name="bsimpan" class="btn btn-success">Simpan</button>
			<button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
		</form>
	</div>
</div>

<div class="card mt-3">
	<div class="card-header bg-danger text-white ">
		Data Kategori
	</div>
	<div class="card-body">
		<table class="table table-borderd table-hovered table-striped">
			<tr>
				<th>No</th>
				<th>Nama kategori</th>
				<th>Aksi</th>
			</tr>
			<?php
			$tampil = mysqli_query($koneksi, "SELECT * from tbl_kategori order by id_kategori desc");
			$no = 1;
			while ($data = mysqli_fetch_array($tampil)) :

			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data['nama_kategori'] ?></td>
					<td>
						<a href="?halaman=kategori&hal=edit&id=<?= $data['id_kategori'] ?>" class="btn btn-success">Edit </a>
						<a href="?halaman=kategori&hal=hapus&id=<?= $data['id_kategori'] ?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus </a>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
</div>