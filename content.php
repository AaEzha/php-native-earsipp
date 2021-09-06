<?php

@$halaman = $_GET['halaman'];

if ($halaman == "departemen") {
	include "modul/departemen/departemen.php";
} elseif ($halaman == "kategori") {
	include "modul/kategori/kategori.php";
} elseif ($halaman == "surat_masuk") {
	if (@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus") {
		include "modul/surat_masuk/form.php";
	} else {
		include "modul/surat_masuk/data.php";
	}
} elseif ($halaman == "surat_keluar") {
	if (@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus") {
		include "modul/surat_keluar/form.php";
	} else {
		include "modul/surat_keluar/data.php";
	}
} else {
	include "modul/home.php";
}
