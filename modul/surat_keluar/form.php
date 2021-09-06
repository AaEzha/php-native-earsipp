<?php
//panggil function.php untuk upload file
include "config/function.php";

//Uji Jika klik tombol edit / hapus
if (isset($_GET['hal'])) {

	if ($_GET['hal'] == "edit") {

		$tampil = mysqli_query($koneksi, "SELECT 
    				  	tbl_surat_keluar.*,
    				  	tbl_kategori.nama_kategori,
    				  	tbl_departemen.nama_departemen
    				  FROM 
    				  	tbl_surat_keluar, tbl_kategori, tbl_departemen
    				  WHERE 
    				  	tbl_surat_keluar.id_kategori = tbl_kategori.id_kategori
    				  	and tbl_surat_keluar.id_departemen = tbl_departemen.id_departemen
					    and tbl_surat_keluar.id_surat_keluar='$_GET[id]'");


		$data = mysqli_fetch_array($tampil);
		if ($data) {
			$vno_surat_keluar = $data['no_surat_keluar'];
			$vtanggal_surat = $data['tanggal_surat'];
			$vid_kategori = $data['id_kategori'];
			$vnama_kategori = $data['nama_kategori'];
			$vperihal = $data['perihal'];
			$vkepada_surat_keluar = $data['kepada_surat_keluar'];
			$vpic_surat_keluar = $data['pic_surat_keluar'];
			$vid_departemen = $data['id_departemen'];
			$vnama_departemen = $data['nama_departemen'];
			$vfile = $data['file'];
		}
	} elseif ($_GET['hal'] == 'hapus') {
		$hapus = mysqli_query($koneksi, "DELETE FROM tbl_surat_keluar WHERE id_surat_keluar='$_GET[id]'");
		if ($hapus) {
			echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=surat_keluar';
					  </script>";
		}
	}
}

//uji jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {

	//pengujian apakah data akan diedit / simpan baru
	if (@$_GET['hal'] == "edit") {
		//perintah edit data
		//ubah data

		// cek apakah user pilih file/gambar atau tidak 
		if ($_FILES['file']['error'] === 4) {
			$file = $vfile;
		} else {
			$file = upload();
		}

		$ubah = mysqli_query($koneksi, "UPDATE tbl_surat_keluar SET 
												no_surat_keluar		= '$_POST[no_surat_keluar]',
												tanggal_surat		= '$_POST[tanggal_surat]',
												id_kategori 		= '$_POST[id_kategori]',
												perihal 			= '$_POST[perihal]',
												kepada_surat_keluar = '$_POST[kepada_surat_keluar]',
												pic_surat_keluar 	= '$_POST[pic_surat_keluar]',
												id_departemen 		= '$_POST[id_departemen]',
												file 				= '$file'
											where id_surat_keluar 	= '$_GET[id]' ");

		if ($ubah) {
			echo "<script>
						alert('Ubah Data Sukses');
						document.location='?halaman=surat_keluar';
					  </script>";
		} else {
			echo "<script>
						alert('Ubah Data GAGAL!!');
						document.location='?halaman=surat_keluar';
					  </script>";
		}
	} else {
		//perintah simpan data baru
		//simpan data
		$file = upload();
		$simpan = mysqli_query($koneksi, "INSERT INTO tbl_surat_keluar
											  VALUES (	'', 
											  		  	'$_POST[no_surat_keluar]', 
											  		  	'$_POST[tanggal_surat]',
											  		  	'$_POST[id_kategori]',
											  		  	'$_POST[perihal]',
											  		  	'$_POST[kepada_surat_keluar]',
											  		  	'$_POST[pic_surat_keluar]',
											  		  	'$_POST[id_departemen]',
											  		  	'$file'
											  		  ) ");

		if ($simpan) {
			echo "<script>
						alert('Simpan Data Sukses');
						document.location='?halaman=surat_keluar';
					  </script>";
		} else {
			echo "<script>
						alert('Simpan Data GAGAL!!');
						document.location='?halaman=surat_keluar';
					  </script>";
		}
	}
}



?>


<div class="card mt-3">
	<div class="card-header bg-danger text-white ">
		Form Data Arsip Surat keluar
	</div>
	<div class="card-body">
		<form method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label for="no_surat_keluar">No. Surat</label>
				<input type="text" class="form-control" id="no_surat_keluar" name="no_surat_keluar" required="required" value="<?= @$vno_surat_keluar ?>">
			</div>
			<div class="form-group">
				<label for="tanggal_surat">Tanggal Surat</label>
				<input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required="required" value="<?= @$vtanggal_surat ?>">
			</div>
			<div class="form-group">
				<label for="id_kategori">Kategori</label>
				<select class="form-control" name="id_kategori">
					<option value="<?= @$vid_kategori ?>"><?= @$vnama_kategori ?></option>
					<?php
					$tampil = mysqli_query($koneksi, "SELECT * from tbl_kategori order by nama_kategori asc");
					while ($data = mysqli_fetch_array($tampil)) {
						echo "<option value = '$data[id_kategori]'> $data[nama_kategori] </option> ";
					}

					?>
				</select>
			</div>
			<div class="form-group">
				<label for="perihal">Perihal</label>
				<input type="text" class="form-control" id="perihal" name="perihal" required="required" value="<?= @$vperihal ?>">
			</div>
			<div class="form-group">
				<label for="kepada_surat_keluar">Kepada</label>
				<input type="text" class="form-control" id="kepada_surat_keluar" name="kepada_surat_keluar" required="required" value="<?= @$vkepada_surat_keluar ?>">
			</div>
			<div class="form-group">
				<label for="pic_surat_keluar">PIC</label>
				<input type="text" class="form-control" id="pic_surat_keluar" name="pic_surat_keluar" required="required" value="<?= @$vpic_surat_keluar ?>">
			</div>
			<div class="form-group">
				<label for="id_departemen">Departemen / Tujuan</label>
				<select class="form-control" name="id_departemen" required="required">
					<option value="<?= @$vid_departemen ?>"><?= @$vnama_departemen ?></option>
					<?php
					$tampil = mysqli_query($koneksi, "SELECT * from tbl_departemen order by nama_departemen asc");
					while ($data = mysqli_fetch_array($tampil)) {
						echo "<option value = '$data[id_departemen]'> $data[nama_departemen] </option> ";
					}

					?>
				</select>
			</div>

			<div class="form-group">
				<label for="file">Pilih File</label>
				<input type="file" class="form-control" id="file" name="file" required="required" value="<?= @$vfile ?>">
			</div>

			<button type="submit" name="bsimpan" class="btn btn-info">Simpan</button>
			<button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
		</form>
	</div>
</div>