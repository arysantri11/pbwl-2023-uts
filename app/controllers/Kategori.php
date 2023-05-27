<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Kategori as KategoriModels;

class Kategori extends Controller
{
	private object $kategori;

	public function __construct()
	{
		$this->kategori = new KategoriModels;
	}

	public function index()
	{
		// $data['row_index'] = "Ini file app/controllers/Index.php - index()";
		$data['nav_aktif'] = "Kategori";
		$data['dataKategori'] = $this->kategori->getAll();

		$this->kategori('kategori/index', $data);
	}

	public function tambah()
	{
		$data['nav_aktif'] = "Kategori";
		$data['dataKategori'] = $this->kategori->getAll();

		$this->kategori('kategori/tambah', $data);
	}

	public function edit()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "Kategori";
		$data['dataKategori'] = $this->kategori->getById($parameter);

		$this->kategori('kategori/edit', $data);
	}

	public function delete()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "Kategori";
		$data['dataKategori'] = $this->kategori->getById($parameter);

		$this->kategori('kategori/delete', $data);
	}

	public function proses()
	{
		if (isset($_POST['btn_simpan'])) {
			$this->kategori->tambah($_POST);
			echo "<script>alert('Data kategori berhasil ditambahkan!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_edit'])) {
			$this->kategori->ubah($_POST);
			echo "<script>alert('Data kategori berhasil diubah!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_delete'])) {
			$this->kategori->hapus($_POST);
			echo "<script>alert('Data kategori berhasil hapus!');window.location = 'Index';</script>";
		}
		
	}
}
