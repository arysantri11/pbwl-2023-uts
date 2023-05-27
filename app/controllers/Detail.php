<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Detail as DetailModels;
use App\Models\Order as OrderModels;
use App\Models\Produk as ProdukModels;

class Detail extends Controller
{
	private object $detail;
	private object $order;
	private object $produk;

	public function __construct()
	{
		$this->detail = new DetailModels;
		$this->order = new OrderModels;
		$this->produk = new ProdukModels;
	}

	public function index()
	{
		$data['nav_aktif'] = "Detail";
		$data['dataDetail'] = $this->detail->getAll();

		$this->detail('detail/index', $data);
	}

	public function tambah()
	{
		$data['nav_aktif'] = "Detail";
		$data['dataOrder'] = $this->order->getAll();
		$data['dataProduk'] = $this->produk->getAll();

		$this->detail('detail/tambah', $data);
	}

	public function delete()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);
		// end = mengambil data array pada index terakhir
		$parameter = end($url);
		// explode = Membagi string diantara -
		$parameterAkhir = explode('-', $parameter);
		// menentukan parameter untuk id order & id produk
		$id_order = $parameterAkhir[0];
		$id_produk = end($parameterAkhir);

		$data['nav_aktif'] = "Detail";
		$data['dataDetail'] = $this->detail->getByIdOrderProduk($id_order, $id_produk);

		$this->detail('detail/delete', $data);
	}

	public function proses()
	{
		if (isset($_POST['btn_simpan'])) {
			echo $this->detail->tambah($_POST);
		} elseif (isset($_POST['btn_edit'])) {
			$this->detail->ubah($_POST);
			echo "<script>alert('Data detail berhasil diubah!');window.location = 'Index';</script>";
		} elseif (isset($_POST['btn_delete'])) {
			$this->detail->hapus($_POST);
			echo "<script>alert('Data detail berhasil hapus!');window.location = 'Index';</script>";
		}
		
	}


}
