<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Produk as ProdukModels;
use App\Models\Kategori as KategoriModels;
use App\Models\User as UserModels;

class Produk extends Controller
{
	private object $produk;
	private object $kategori;
	private object $user;

	public function __construct()
	{
		$this->produk = new ProdukModels;
		$this->kategori = new KategoriModels;
		$this->user = new UserModels;
	}

	public function index()
	{
		$data['nav_aktif'] = "Produk";
		$data['dataProduk'] = $this->produk->getAll();

		$this->produk('produk/index', $data);
	}

	public function tambah()
	{
		$data['nav_aktif'] = "Produk";
		$data['dataKategori'] = $this->kategori->getAll();
		$data['dataUser'] = $this->user->getAll();

		$this->produk('produk/tambah', $data);
	}

	public function edit()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "Produk";
		$data['dataKategori'] = $this->kategori->getAll();
		$data['dataUser'] = $this->user->getAll();
		$data['dataProduk'] = $this->produk->getById($parameter);

		$this->produk('produk/edit', $data);
	}

	public function delete()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "Produk";
		$data['dataProduk'] = $this->produk->getById($parameter);

		$this->produk('produk/delete', $data);
	}

	public function proses()
	{
		if (isset($_POST['btn_simpan'])) {
			$this->produk->tambah($_POST);
			echo "<script>alert('Data produk berhasil ditambahkan!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_edit'])) {
			$this->produk->ubah($_POST);
			echo "<script>alert('Data produk berhasil diubah!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_delete'])) {
			$this->produk->hapus($_POST);
			echo "<script>alert('Data produk berhasil hapus!');window.location = 'Index';</script>";
		}
		
	}

}
