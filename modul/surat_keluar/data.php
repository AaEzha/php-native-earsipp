<div class="card mt-3">
	<div class="card-header bg-danger text-white ">
		Data Arsip Surat Keluar
	</div>
	<div class="card-body justify-content-between">
		<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
			<div class="btn-group" role="group" aria-label="First group">
				<a class="btn btn-primary" href="?halaman=surat_keluar&hal=tambahdata" role="button">Tambah Data</a>
			</div>
			<div class="input-group">
				<div class="input-group-text" id="btnGroupAddon2">?</div>
				<input type="search" class="form-control header-search" placeholder="Cari Nomor Surat&hellip;" tabindex="1">
			</div>
		</div>
	</div>
	<div class="container">
		<table class="table table-borderd table-hovered table-striped" cellspacing="0" width="100%">
			<tr>
				<th>No</th>
				<th>No Surat</th>
				<th>Tanggal Surat</th>
				<th>Kategori</th>
				<th>Perihal</th>
				<th>Kepada</th>
				<th>PIC</th>
				<th>Departemen</th>
				<th>File</th>
				<th>Aksi</th>
			</tr>
			<?php
			$tampil = mysqli_query($koneksi, "
    				  SELECT 
    				  	tbl_surat_keluar.*,
    				  	tbl_kategori.nama_kategori,
    				  	tbl_departemen.nama_departemen
    				  FROM 
    				  	tbl_surat_keluar, tbl_kategori, tbl_departemen
    				  WHERE 
    				  	tbl_surat_keluar.id_kategori = tbl_kategori.id_kategori
    				  	and tbl_surat_keluar.id_departemen = tbl_departemen.id_departemen
    				  ");
			$no = 1;
			while ($data = mysqli_fetch_array($tampil)) :

			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data['no_surat_keluar'] ?></td>
					<td><?= $data['tanggal_surat'] ?></td>
					<td><?= $data['nama_kategori'] ?></td>
					<td><?= $data['perihal'] ?></td>
					<td><?= $data['kepada_surat_keluar'] ?></td>
					<td><?= $data['pic_surat_keluar'] ?></td>
					<td><?= $data['nama_departemen'] ?></td>
					<td>
						<?php
						if (empty($data['file'])) {
							echo " - ";
						} else {
						?>
							<a href="file/<?= $data['file'] ?>" target="$_blank"> lihat file </a>
						<?php
						}
						?>
					</td>
					<td>
						<a href="?halaman=surat_keluar&hal=edit&id=<?= $data['id_surat_keluar'] ?>" class="btn btn-success">Edit </a>
						<a href="?halaman=surat_keluar&hal=hapus&id=<?= $data['id_surat_keluar'] ?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus </a>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
</div>
</div>