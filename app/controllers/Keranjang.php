<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Keranjang as KeranjangModels;
use App\Models\Produk as ProdukModels;
use App\Models\User as UserModels;

class Keranjang extends Controller
{
	private object $keranjang;
	private object $produk;
	private object $user;

	public function __construct()
	{
		$this->keranjang = new KeranjangModels;
		$this->produk = new ProdukModels;
		$this->user = new UserModels;
	}

	public function index()
	{
		$data['nav_aktif'] = "Keranjang";
		$data['dataKeranjang'] = $this->keranjang->getAll();

		$this->keranjang('keranjang/index', $data);
	}

	public function tambah()
	{
		$data['nav_aktif'] = "Keranjang";
		$data['dataProduk'] = $this->produk->getAll();
		$data['dataUser'] = $this->user->getAll();

		$this->keranjang('keranjang/tambah', $data);
	}

	public function edit()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "Keranjang";
		$data['dataProduk'] = $this->produk->getAll();
		$data['dataUser'] = $this->user->getAll();
		$data['dataKeranjang'] = $this->keranjang->getById($parameter);

		$this->keranjang('keranjang/edit', $data);
	}

	public function delete()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);

		$data['nav_aktif'] = "Keranjang";
		$data['dataKeranjang'] = $this->keranjang->getById($parameter);

		$this->keranjang('keranjang/delete', $data);
	}

	public function proses()
	{
		if (isset($_POST['btn_simpan'])) {
			$this->keranjang->tambah($_POST);
			echo "<script>alert('Data keranjang berhasil ditambahkan!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_edit'])) {
			$this->keranjang->ubah($_POST);
			echo "<script>alert('Data keranjang berhasil diubah!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_delete'])) {
			$this->keranjang->hapus($_POST);
			echo "<script>alert('Data keranjang berhasil hapus!');window.location = 'Index';</script>";
		}
		
	}

}
